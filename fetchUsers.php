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

    // Fetch engineers and managers separately
    $stmtEngineers = $pdo->prepare("SELECT * FROM users WHERE is_engineer = 0");
    $stmtManagers = $pdo->prepare("SELECT * FROM users WHERE is_engineer = 1");

    $stmtEngineers->execute();
    $stmtManagers->execute();

    $engineers = $stmtEngineers->fetchAll(PDO::FETCH_ASSOC);
    $managers = $stmtManagers->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "engineers" => $engineers,
        "managers" => $managers
    ]);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
