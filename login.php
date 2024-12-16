<?php
session_start();

function VarExist($var)
{
    if (isset($var) && !empty($var)) {
        return htmlspecialchars($var); 
    } else {
        header("location: index.html");
        exit();
    }
}

// Function to connect to the database
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

// Connect to the database
$db = DBConnect();

// Get and sanitize user input
$email = VarExist($_POST["email"]);
$password = VarExist($_POST["password"]);

// Query to fetch user information
$query = "SELECT id, email, password, is_engineer, name FROM users WHERE email = :email AND password = :password";
$stmt = $db->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Fetch user details
$user = $stmt->fetch(PDO::FETCH_OBJ);

if ($user) {
    session_start();
    if($email == "admin@admin.com") {
        $_SESSION['admin'] = $user->name;
        header("location: admin.php");
    }
    else if ($user->is_engineer == 0) { 
        $_SESSION['engineer_name'] = $user->name;
        header("location: mainEng.php");
    } else { // Warehouse manager
        $_SESSION['manager_name'] = $user->name;
        header("location: warehousev2.php");
    }
    exit();
} else {
    echo '<script> alert("User not found or incorrect password!"); </script>';
    echo '<script> window.location.replace("index.html"); </script>';
    exit();
}
?>
