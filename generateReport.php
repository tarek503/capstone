<?php
require('fpdf186/fpdf.php');

// Database connection and other logic
$host = "127.0.0.1";
$dbname = "fyp";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch questions from the `Q` table
$query = "SELECT * FROM Q ORDER BY Section";
$stmt = $conn->prepare($query);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch the latest report from the `reports` table (or filter by specific criteria)
$reportQuery = "SELECT * FROM reports ORDER BY ReportDate DESC LIMIT 1";
$reportStmt = $conn->prepare($reportQuery);
$reportStmt->execute();
$report = $reportStmt->fetch(PDO::FETCH_ASSOC);

if (!$report) {
    die("No reports found.");
}

// Initialize the report string
$reportString = "Safety Report\n";
$reportString .= "Warehouse Name: " . $report['WarehouseName'] . "\n";
$reportString .= "Engineer: " . $report['EngineerUsername'] . "\n";
$reportString .= "Report Date: " . $report['ReportDate'] . "\n\n";

// Add each question and its corresponding answer to the string
foreach ($questions as $q) {
    $sectionClass = str_replace(' ', '', htmlspecialchars($q['Section']));
    $sectionContent = "Section: " . $q['Section'] . "\n";

    $hasContent = false; // Flag to track if the section has any content

    // Check and add Question 1
    if (!empty($report["{$sectionClass}_A1"])) {
        $sectionContent .= "Question 1: " . $q['Q1'] . "\n";
        $sectionContent .= "Answer: " . $report["{$sectionClass}_A1"] . "\n";
        $hasContent = true;

        if (!empty($q['Q11']) && !empty($report["{$sectionClass}_A11"])) {
            $sectionContent .= "Follow-up: " . $q['Q11'] . "\n";
            $sectionContent .= "Answer: " . $report["{$sectionClass}_A11"] . "\n";
        }
    }

    // Check and add Question 2
    if (!empty($report["{$sectionClass}_A2"])) {
        $sectionContent .= "Question 2: " . $q['Q2'] . "\n";
        $sectionContent .= "Answer: " . $report["{$sectionClass}_A2"] . "\n";
        $hasContent = true;

        if (!empty($q['Q21']) && !empty($report["{$sectionClass}_A21"])) {
            $sectionContent .= "Follow-up: " . $q['Q21'] . "\n";
            $sectionContent .= "Answer: " . $report["{$sectionClass}_A21"] . "\n";
        }
    }

    // Only add the section to the report string if it has at least one answered question
    if ($hasContent) {
        $reportString .= $sectionContent . "\n";
    }
}

// Call the Python API
$apiUrl = "http://127.0.0.1:5000/ask-gpt"; 
$data = json_encode(["prompt" => "Write a very detailed safety report, including risk analysis according to the following questionnaire, write it as one connected paragraph with professional english:\n" . $reportString]);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("Error calling API: " . curl_error($ch));
}
curl_close($ch);

// Parse the API response
$responseData = json_decode($response, true);
if (!isset($responseData['response'])) {
    die("Invalid API response.");
}
$generatedReport = $responseData['response'];

// Generate the PDF
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Generated Safety Report', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, $generatedReport);
$pdfFile = "Safety_Report_" . date('Ymd_His') . ".pdf"; // Generates a filename with date and time
$pdf->Output($pdfFile, 'F');

// Return the PDF as a downloadable file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $pdfFile . '"');
error_log("Generated File Name: $pdfFile");
readfile($pdfFile);

// Delete the temporary PDF file
unlink($pdfFile);
?>