<?php
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
        die("Error!: " . $e->getMessage());
    }
}

$db = DBConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['warehouse_id'], $_POST['warehouse_name'], $_POST['location'], $_POST['capacity'], $_POST['status'])) {
        echo json_encode(['success' => false, 'error' => 'Invalid input data']);
        exit();
    }

    $id = $_POST['warehouse_id'];
    $warehouse_name = $_POST['warehouse_name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];

    // Update warehouse data
    $query = "UPDATE warehouses 
              SET warehouse_name = :warehouse_name, location = :location, capacity = :capacity, status = :status, last_updated = NOW() 
              WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':warehouse_name', $warehouse_name);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update the warehouse']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
