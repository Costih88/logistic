<?php

include "../functions/logincheck.php";

if ($role != 0) header("Location: /msg?=wrong");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
        function del(id) {
            $.ajax({
                url: "delete.php",
                method: "post",
                data: {
                    "id": id
                },
                success: function (data) {
                    if (data=="error") alert("An error occured");
                    else {
                        $.each($('#orders').find('tr'), function (id, value) {
                            if ($(value).find('td:nth-child(1)').text()===data) this.remove();
                        })
                    }

                }
            })
        }
    </script>


</head>

<body>
<div class="login-wrap">

    <div class="login-html">
        <div class="signout"><a href="../logout.php"><b>Sign out</b></a></div>
        <div class="header"><b>Welcome, <?php print $viewname ?>!</b></div>
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Add
            order</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">View order</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form role="form" action="add.php" method="post">
                    <div class="group">
                        <label for="prov" class="label">Provider</label>
                        <select id="prov" name="prov" class="input">
                            <?php
                            $sql = "SELECT prov_id AS id, name FROM provider";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group">
                        <label for="del" class="label">Deliever</label>
                        <select id="del" name="del" class="input">
                            <?php
                            $sql = "SELECT del_id AS id, name FROM deliever";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group">
                        <label for="stor" class="label">Storage</label>
                        <select name="stor" id="stor" class="input">
                            <?php
                            $sql = "SELECT stor_id AS id, name FROM storage";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group3">
                        <label for="rec" class="label">Reciever</label>
                        <label for="name" class="label">Name</label>
                        <select id="rec" name="rec" class="input">
                            <?php
                            $sql = "SELECT rec_id AS id, name FROM reciever";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                                }
                            ?>
                        </select>


                        <input id="name" name="name" type="text" class="input">
                    </div>
                    <div class="group3">
                        <label for="stat" class="label">Status</label>
                        <label for="wage" class="label">Wage</label>
                        <select name="stat" id="stat" class="input">
                            <option>Order received</option>
                            <option>Sent</option>
                            <option>Delayed</option>
                            <option>Cancelled</option>
                            <option>Arrived</option>
                        </select>
                        <input id="wage" name="wage" type="text" class="input">
                    </div>
                    <div class="group"><label class="label">Size</label></div>
                    <div class="group2">

                        <input id="l" name="l" type="text" class="input">
                        <label for="l" class="label">mm</label>
                        <input id="w" name="w" type="text" class="input">
                        <label for="w" class="label">mm</label>
                        <input id="h" name="h" type="text" class="input">
                        <label for="h" class="label">mm</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Add order">
                    </div>
                </form>
            </div>
            <div class="sign-up-htm">
                <div class="group">
                    <label class="label">All orders</label>
                </div>
                <table style="margin-left: -66px;" class="table-fill">
                    <thead>
                    <tr>
                        <th class="text-left">Id</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Provider</th>
                        <th class="text-left">Deliever</th>
                        <th class="text-left">Storage</th>
                        <th class="text-left">Reciever</th>
                        <th class="text-left">Size</th>
                        <th class="text-left">Wage</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="orders" class="table-hover">
                    <?php
                    $sql = "SELECT cargo.cargo_id, cargo.name, provider.name AS pname, deliever.name AS dname, reciever.name AS rname, cargo.status, cargostatus.wage, cargostatus.length*cargostatus.width*cargostatus.heigth AS size, storage.name AS sname FROM cargo INNER JOIN provider ON cargo.prov_id=provider.prov_id INNER JOIN deliever ON cargo.del_id=deliever.del_id INNER JOIN reciever ON cargo.rec_id=reciever.rec_id INNER JOIN storage ON cargo.stor_id=storage.stor_id INNER JOIN cargostatus ON cargo.cargo_id=cargostatus.cargostat_id;";
                    if ($result = $conn->query($sql))
                        while ($row = $result->fetch_assoc()) {
                            print "<tr>";
                            print "<td>" . $row["cargo_id"] . "</td>";
                            print "<td>" . $row["name"] . "</td>";
                            print "<td>" . $row["pname"] . "</td>";
                            print "<td>" . $row["dname"] . "</td>";
                            print "<td>" . $row["sname"] . "</td>";
                            print "<td>" . $row["rname"] . "</td>";
                            print "<td>" . $row["size"] . "</td>";
                            print "<td>" . $row["wage"] . "</td>";
                            print "<td>" . $row["status"] . "</td>";
                            print "<td><button class='button' onclick='del(" . $row["cargo_id"] . ")'>Delete</button></td>";
                            print "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
