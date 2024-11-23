<?php
function VarExist($var)
{
    if (isset($var) && !empty($var)) {
        return htmlspecialchars($var);
    } else {
        header("location: signup.html");
        exit(); 
    }
}

function DBConnect()
{
    $dbhost = "127.0.0.1";
    $dbname = "fyp";
    $dbuser = "root";
    $dbpass = "";
    $db = null;
    try {
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        error_log("Error!: " . $e->getMessage()); // Log error instead of echoing
        die();
    }
    return $db;
}

$user = new stdClass();
$user->name = VarExist($_POST["name"]);
$user->email = VarExist($_POST["email"]);
$user->pass = VarExist($_POST["password"]); 
$user->un = substr($user->email, 0, strpos($user->email, "@"));

function addUser($user)
{
    $db = DBConnect();
    $query = "INSERT INTO users (name, password, email, username) VALUES ('$user->name', '$user->pass', '$user->email', '$user->un')";
    $stmt = $db->query($query);
    if ($stmt && $stmt->rowCount() > 0) {
        session_start();
        $_SESSION["id"] = $db->lastInsertId();
        $_SESSION["name"] = $user->un;
        return 1;
    } else {
        return 0;
    }
}

if (addUser($user) == 1) {
    header("location: signup.html");
}

?>