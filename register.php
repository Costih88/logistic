<?php

$username = "epiz_19165977";
$password = "123dolboeb";
$dbname = "epiz_19165977_center";
$servername = "sql212.epizy.com";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$username = $_POST["username"];
$password = $_POST["pass"];
if ($_POST["pass_confirm"]!=$password) header("Location: /");
$name = $_POST["name"];
$zip = $_POST["zip"];
$country = $_POST["country"];

$sql = "INSERT INTO `epiz_19165977_center`.`reciever` (`rec_id`, `name`, `zipcode`, `country_id`) VALUES (NULL, '"
    . $name . "', '" . $zip . "', '" . $country . "');";

//print $sql;

$conn->query($sql);
$roleid = $conn->insert_id;



$sql = "INSERT INTO `epiz_19165977_center`.`users` (`users_id`, `username`, `password`, `role`, `role_id`, `sessionId`) VALUES (NULL, '"
    . $username . "', '" . hash("sha256",$password,false) . "', 1, '"
    . $roleid . "', '" . hash("sha256",$username . $password, false) . "');";

//print $sql;

$conn->query($sql);
/*print "Debug: trying reg reciever with username " . $username . " and password " . $password . ", name " .
    $name . ", zip code " . $zip . " from country " . $country;*/
setcookie("Session", hash("sha256",$username . $password, false));
header("Location: /cabinet");