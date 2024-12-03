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
    $name = $input['name'];
    $email = $input['email'];
    $username = $input['username'];

    // Validate inputs
    if (!$id || !$name || !$email || !$username) {
        echo json_encode(["error" => "Invalid input data"]);
        exit();
    }

    // Update user in the database
    $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, username = :username WHERE id = :id");
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':username' => $username,
        ':id' => $id
    ]);

    echo json_encode(["success" => true]);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
