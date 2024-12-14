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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch warehouse data
    $query = "SELECT id, name, email FROM users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $warehouse = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($warehouse) {
        echo json_encode($warehouse);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'Missing user ID']);
}
?>
