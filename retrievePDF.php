<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdfFile = $_POST['pdf_file'] ?? '';
    $warehouseName = $_POST['warehouse_name'] ?? '';

    if (empty($pdfFile) || empty($warehouseName)) {
        die("Error: PDF file path and warehouse name are required.");
    }

    // Path to Python and the Python script
    $pythonPath = 'C:\\Users\\gega\\AppData\\Local\\Programs\\Python\\Python313\\python.exe';
    $pythonScriptPath = 'C:\\wamp64\\www\\capstone\\retrievePDF.py'; // Adjust to the correct path of your Python script

    // Escape arguments to securely pass them to the Python script
    $escapedPdfFile = escapeshellarg($pdfFile);
    $escapedWarehouseName = escapeshellarg($warehouseName);

    // Execute the Python script and pass arguments
    $output = [];
    $returnVar = null;
    exec("$pythonPath $pythonScriptPath $escapedPdfFile $escapedWarehouseName 2>&1", $output, $returnVar);

    if ($returnVar !== 0) {
        // Handle errors from Python execution
        die("Error running Python script: " . implode("\n", $output));
    }

    // Python script outputs the path to the downloaded PDF
    $tempPdfPath = trim(implode("\n", $output));

    if (!file_exists($tempPdfPath)) {
        die("Error: PDF not found after Python script execution.");
    }

    // Serve the PDF as a download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($tempPdfPath) . '"');
    header('Content-Length: ' . filesize($tempPdfPath));
    readfile($tempPdfPath);

    // Clean up temporary file
    unlink($tempPdfPath);
}
?>
