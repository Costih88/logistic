<?php
//mySql vars
$username = "epiz_19165977";
$password = "123dolboeb";
$dbname = "epiz_19165977_center";
$servername = "sql212.epizy.com";
//form data
$login = $_POST['username'];
$pass = hash("sha256", $_POST['password'], false);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//cheking
$sql = "SELECT * FROM users WHERE username='" . $login . "' AND password='" . $pass . "'";
if ($result = $conn->query($sql)) {
    if ($row = $result->fetch_assoc()) {
        //logged
        $session = $row["sessionId"];
        //in case we need to update; will be later
        //$session = generateRandomString() . $login . $pass;
        //$session = hash("md5", $session, false);
        //$conn->query("UPDATE Accounts SET SessionKey='" . $session . "' WHERE Login='" . $login . "' AND Password='" . $pass . "'");

        $role = $row["role"];
        setcookie("Session", $session);

        switch ($role) {
            case 0: header("Location: /operator/"); break;
            case 1: header("Location: /cabinet"); break;
            case 2: header("Location: /cabinet"); break;
            case 3: header("Location: /cabinet"); break;
            default: header("Location: /?msg=error"); break;
        }
        die();


    } else {
        header("Location: /?msg=wrong");
    }
}

$conn->close();