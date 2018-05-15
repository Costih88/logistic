<?php
//mySql vars
$username = "epiz_19165977";
$password = "123dolboeb";
$dbname = "epiz_19165977_center";
$servername = "sql212.epizy.com";

//cookie
$session = $_COOKIE["Session"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$result = $conn->query("SELECT * FROM users WHERE sessionId='" . $session . "'");
if ($row = $result->fetch_assoc()) {
    $myId = $row["users_id"];
    $role = $row["role"];
    $role_id = $row["role_id"];
    switch ($role) {
        case 0: $viewname = "Admin"; break;
        case 1: $viewname = $conn->query("SELECT name FROM reciever WHERE rec_id=" . $role_id . ";")->fetch_assoc()["name"];  break;
        case 2: $viewname = $conn->query("SELECT name FROM deliever WHERE del_id=" . $role_id . ";")->fetch_assoc()["name"];  break;
        case 3: $viewname = $conn->query("SELECT name FROM provider WHERE prov_id=" . $role_id . ";")->fetch_assoc()["name"];  break;
    }
}
if ($myId == null) header("Location: ../");