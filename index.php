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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main page</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form role="form" action="login.php" method="post">
                    <div class="group">
                        <label for="user_l" class="label">Username</label>
                        <input id="user_l" name="username" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass_l" class="label">Password</label>
                        <input id="pass_l" name="password" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
                </div>
            </div>
            <div class="sign-up-htm">
                <form role="form" action="register.php" method="post">
                    <div class="group">
                        <label for="user_r" class="label">Username</label>
                        <input id="user_r" name="username" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass_r" class="label">Password</label>
                        <input id="pass_r" name="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass2" class="label">Repeat Password</label>
                        <input id="pass2" name="pass_confirm" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="name" class="label">Name</label>
                        <input id="name" name="name" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="zip" class="label">ZIP Code</label>
                        <input id="zip" name="zip" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="country" class="label">Select your country</label>
                        <select id="country" name="country" class="input">
                            <?php
                            $sql = "SELECT country_id AS id, name FROM country";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
