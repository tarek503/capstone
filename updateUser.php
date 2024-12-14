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

$id = "";
$name = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['engineer_id'], $_POST['engineer_name'], $_POST['engineer_email'])) {
        $id = $_POST['engineer_id'];
        $name = $_POST['engineer_name'];
        $email = $_POST['engineer_email'];
    }
    elseif(isset($_POST['manager_id'], $_POST['manager_name'], $_POST['manager_email'])) {
        $id = $_POST['manager_id'];
        $name = $_POST['manager_name'];
        $email = $_POST['manager_email'];
    }
    else {
        echo json_encode(['success' => false, 'error' => 'Invalid input data']);
    }

    // Update warehouse data
    $query = "UPDATE users 
              SET name = :name, email = :email
              WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update the user data']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
