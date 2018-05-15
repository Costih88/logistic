<?php
include "../functions/logincheck.php";
$prov = $_POST["prov"];
$rec = $_POST["rec"];
$del = $_POST["del"];
$stor = $_POST["stor"];
$name = $_POST["name"];
$stat = $_POST["stat"];
$wage = $_POST["wage"];
$len = $_POST["l"];
$wid = $_POST["w"];
$hei = $_POST["h"];

$sql = "INSERT INTO `epiz_19165977_center`.`cargo` (`cargo_id`, `prov_id`, `del_id`, `stor_id`, `rec_id`, `name`, `status`) VALUES (NULL, '"
    . $prov . "', '" . $del . "', '" . $stor . "', '" . $rec . "', '" . $name . "', '" . $stat . "');";
$conn->query($sql);
$sql = "INSERT INTO `epiz_19165977_center`.`cargostatus` (`cargostat_id`, `wage`, `length`, `width`, `heigth`) VALUES (NULL, '"
    . $wage . "', '" . $len . "', '" . $wid . "', '" . $hei . "');";
$conn->query($sql);

header("Location: /operator");

/*print "Debug: adding cargo " . $name . ", prov = " . $prov .
    ", del = " . $del . ", rec = " . $rec . ", stor = " . $stor . ", stat = " . $stat .
    ", w = " . $wid . ", l = " . $len . ", h = " . $hei;*/