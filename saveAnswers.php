<?php
// Database connection
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warehouseName = $_POST['warehouseName'];
    $username = $_POST['username'];
    $reportDate = date('Y-m-d H:i:s');

    // Collect all answers dynamically
    $answers = [];
    foreach ($_POST as $key => $value) {
        if (!in_array($key, ['warehouseName', 'username'])) {
            $answers[$key] = $value;
        }
    }

    // Validate that all answers match database columns
    $columns = array_keys($answers);
    $placeholders = array_map(fn($col) => ":$col", $columns);

    // Construct the SQL query
    $query = "INSERT INTO reports (WarehouseName, EngineerUsername, ReportDate, " . implode(", ", $columns) . ")
              VALUES (:warehouseName, :username, :reportDate, " . implode(", ", $placeholders) . ")";
    
    $stmt = $conn->prepare($query);

    // Bind the parameters
    $params = array_merge(
        [
            ':warehouseName' => $warehouseName,
            ':username' => $username,
            ':reportDate' => $reportDate,
        ],
        array_combine($placeholders, array_values($answers))
    );

    try {
        $stmt->execute($params);
        echo "Report saved successfully!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
