<?php
header('Content-Type: application/json');

// Database connection
$host = "127.0.0.1";
$dbname = "fyp"; // Update with your database name
$user = "root"; // Update with your database user
$pass = ""; // Update with your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

// Get data from the AJAX request
$manager = $_POST['manager'] ?? null;
$warehouse = $_POST['warehouse'] ?? null;

if ($manager && $warehouse) {
    // Insert the request into the `requests` table
    $query = "INSERT INTO requests (warehouse_manager, warehouse_name, status) VALUES (:manager, :warehouse, 'Pending')";
    $statement = $conn->prepare($query);
    $statement->execute(['manager' => $manager, 'warehouse' => $warehouse]);

    echo json_encode(['status' => 'success', 'message' => 'Request sent successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
}
?>
