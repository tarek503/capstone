<?php
session_start();

// Set the content type to JSON
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager_name = $_POST['managerName'];
    $manager_email = $_POST['managerEmail'];
    $manager_password = $_POST['managerPassword'];

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

    function saveWarehouseInfo($db, $manager_name, $manager_email, $manager_password)
    {
        try {
            $query = "INSERT INTO users (name, email, password, is_engineer)
                      VALUES (:managerName, :managerEmail, :managerPassword, 1)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':managerName', $manager_name);
            $stmt->bindParam(':managerEmail', $manager_email);
            $stmt->bindParam(':managerPassword', $manager_password);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            exit();
        }
    }

    $db = DBConnect();

    if (saveWarehouseInfo($db, $manager_name, $manager_email, $manager_password)) {
        $response = ['success' => true, 'message' => 'Manager information saved successfully.'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to save manager information.'];
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
