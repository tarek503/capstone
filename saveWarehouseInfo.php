<?php
session_start();

// Enable output buffering
ob_start();

// Set the content type to JSON
header('Content-Type: application/json');

// Check if the manager's name is set in the session
if (!isset($_SESSION['manager_name'])) {
    echo json_encode(['success' => false, 'message' => 'Manager not logged in.']);
    exit();
}

$manager_name = $_SESSION['manager_name'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warehouse_name = $_POST['warehouseName'];
    $warehouse_location = $_POST['warehouseLocation'];
    $warehouse_capacity = $_POST['warehouseCapacity'];
    $warehouse_status = $_POST['warehouseStatus'];
    $last_update = date('Y-m-d');

    function DBConnect()
    {
        $dbhost = "127.0.0.1";
        $dbname = "fyp";
        $dbuser = "root";
        $dbpass = "";
        try {
            $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database connection error: ' . $e->getMessage()]);
            exit();
        }
    }

    function saveWarehouseInfo($db, $manager_name, $warehouse_name, $warehouse_location, $warehouse_capacity, $warehouse_status, $last_update)
    {
        try {
            $query = "INSERT INTO warehouses (manager_name, warehouse_name, location, capacity, status, last_updated)
                      VALUES (:manager_name, :warehouse_name, :location, :capacity, :status, :last_updated)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':manager_name', $manager_name);
            $stmt->bindParam(':warehouse_name', $warehouse_name);
            $stmt->bindParam(':location', $warehouse_location);
            $stmt->bindParam(':capacity', $warehouse_capacity, PDO::PARAM_INT);
            $stmt->bindParam(':status', $warehouse_status);
            $stmt->bindParam(':last_updated', $last_update);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            exit();
        }
    }

    $db = DBConnect();

    if (saveWarehouseInfo($db, $manager_name, $warehouse_name, $warehouse_location, $warehouse_capacity, $warehouse_status, $last_update)) {
        $response = ['success' => true, 'message' => 'Warehouse information saved successfully.'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to save warehouse information.'];
    }

    // Ensure JSON encoding success
    $json = json_encode($response);
    if ($json === false) {
        echo json_encode(['success' => false, 'message' => 'JSON encoding error: ' . json_last_error_msg()]);
        exit();
    }

    ob_end_clean(); // Clear any output buffer
    echo $json;
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}
