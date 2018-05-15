<?php
unset($_COOKIE["Session"]);
setcookie("Session", null, -1, "/");
header("Location: ../");
