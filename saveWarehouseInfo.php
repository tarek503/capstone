<?php
session_start();

// Check if the manager's name is set in the session
if (!isset($_SESSION['manager_name'])) {
    die("<script>alert('Error: Warehouse manager not logged in.'); window.location.href = 'index.html';</script>");
}

// Retrieve manager's name from session
$manager_name = $_SESSION['manager_name'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $warehouse_name = $_POST['warehouseName'];
    $warehouse_location = $_POST['warehouseLocation'];
    $warehouse_capacity = $_POST['warehouseCapacity'];
    $warehouse_status = $_POST['warehouseStatus'];
    $last_update = $_POST['lastUpdate'];

    // Database connection function
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
            die("<script>alert('Database connection error: " . $e->getMessage() . "');</script>");
        }
    }

    // Insert warehouse information into the database
    function saveWarehouseInfo($db, $manager_name, $warehouse_name, $warehouse_location, $warehouse_capacity, $warehouse_status, $last_update)
    {
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
    }

    // Connect to the database
    $db = DBConnect();

    // Save the warehouse information
    if (saveWarehouseInfo($db, $manager_name, $warehouse_name, $warehouse_location, $warehouse_capacity, $warehouse_status, $last_update)) {
        echo "<script>
                alert('Warehouse information saved successfully.');
                window.location.href = 'warehousev2.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: Failed to save warehouse information.');
                window.location.href = 'warehousev2.html';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request.');
            window.location.href = 'warehousev2.html';
          </script>";
}
?>
