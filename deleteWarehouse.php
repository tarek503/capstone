<?php
header('Content-Type: application/json');
session_start();

// Check if the manager is logged in
if (!isset($_SESSION['manager_name'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warehouseId = $_POST['id'] ?? '';

    if (empty($warehouseId)) {
        echo json_encode(['success' => false, 'message' => 'Warehouse ID is required.']);
        exit();
    }

    // Database connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
        exit();
    }

    // Delete warehouse
    $sql = "DELETE FROM warehouses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $warehouseId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete warehouse.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
