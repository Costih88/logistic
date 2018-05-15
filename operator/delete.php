<?php
include "../functions/logincheck.php";
$id = $_POST["id"];
$sql = "DELETE FROM cargo WHERE cargo_id=" . $id . ";";
if ($conn->query($sql)) {
    $sql = "DELETE FROM cargostatus WHERE cargostat_id=" . $id . ";";
    if ($conn->query($sql)) {
        print $id;
    }
} else print "error";