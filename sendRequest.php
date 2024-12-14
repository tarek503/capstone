<?php
session_start();

// Database connection details
$host = "127.0.0.1";
$dbname = "fyp";
$user = "root";
$pass = "";

header('Content-Type: application/json'); // Set response format to JSON

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit();
}

try {
    // Establish database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check action type
    if ($_POST['action'] === 'request') {
        // Retrieve inputs from POST
        $warehouse_id = isset($_POST['warehouseID']) ? (int)$_POST['warehouseID'] : null;
        $warehouse_name = $_POST['warehouse_name'] ?? null;
        $engineer_name = $_POST['engineer_name'] ?? null;

        // Validate inputs
        if (empty($warehouse_id) || empty($warehouse_name) || empty($engineer_name)) {
            echo json_encode(["success" => false, "message" => "Invalid input. All fields are required."]);
            exit();
        }

        // Insert or update the request in the database
        $query = "INSERT INTO requests (warehouseID, warehouse_name, engineer_name, reqStatus)
                  VALUES (:warehouse_id, :warehouse_name, :engineer_name, 1)
                  ON DUPLICATE KEY UPDATE reqStatus = 1";
        $statement = $conn->prepare($query);
        $statement->execute([
            ':warehouse_id' => $warehouse_id,
            ':warehouse_name' => $warehouse_name,
            ':engineer_name' => $engineer_name
        ]);

        // Check if rows were affected
        if ($statement->rowCount() > 0) {
            echo json_encode(["success" => true, "message" => "Request sent successfully."]);
        } else {
            // In case no rows are affected (unlikely due to ON DUPLICATE KEY UPDATE)
            echo json_encode(["success" => true, "message" => "Request is already pending."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid action provided."]);
    }
} catch (PDOException $e) {
    // Handle database errors
    echo json_encode(["success" => false, "message" => "Database Error: " . $e->getMessage()]);
} catch (Exception $e) {
    // Handle general errors
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
