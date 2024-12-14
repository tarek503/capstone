<?php
header('Content-Type: application/json');

$managerId = $_GET['managerId'] ?? null;

if (!$managerId) {
    echo json_encode(['success' => false, 'message' => 'Manager ID is required']);
    exit;
}

try {
    $db = new PDO("mysql:host=127.0.0.1;dbname=fyp", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch manager's name
    $stmt = $db->prepare("SELECT name FROM users WHERE id = ?");
    $stmt->execute([$managerId]);
    $manager = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$manager) {
        echo json_encode(['success' => false, 'message' => 'Manager not found']);
        exit;
    }

    // Fetch warehouses for the manager
    $stmt = $db->prepare("SELECT id, manager_name, warehouse_name, location, capacity, status FROM warehouses WHERE manager_name = ?");
    $stmt->execute([$manager['name']]);
    $warehouses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'managerName' => $manager['name'],
        'warehouses' => $warehouses
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
