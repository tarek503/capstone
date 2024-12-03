<?php
header("Content-Type: application/json");

// Database connection
$host = '127.0.0.1';
$dbname = 'fyp';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from POST request
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'];

    // Delete user from the database
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);

    echo json_encode(["success" => true]);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
    