<?php

include "../functions/logincheck.php"

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User cabinet</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="../css/style.css">


</head>

<body>
<div class="login-wrap">

    <div class="login-html">
        <div class="signout"><a href="../logout.php"><b>Sign out</b></a></div>
        <div class="header"><b>Welcome, <?php print $viewname ?>!</b></div>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">View
            order</label>
        <div class="login-form">
            <div class="sign-up-htm">
                <div class="group">
                    <label class="label">Your order list:</label>
                </div>

                <table class="table-fill">
                    <thead>
                    <tr>
                        <th class="text-left">Id</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Provider</th>
                        <th class="text-left">Deliever</th>
                        <th class="text-left">Reciever</th>
                        <th class=\"text-left\">Status</th>
                        <?php

                        switch ($role) {
                            case 0:
                            case 3:
                                print ("<th class=\"text-left\">Size</th>");
                                print ("<th class=\"text-left\">Wage</th>");
                                print ("<th class=\"text-left\">Storage</th>");
                                break;
                        }

                        ?>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                    <?php
                    switch ($role) {
                        case 0:
                            break;
                        case 1:
                            $sql = "SELECT cargo.cargo_id, cargo.name, provider.name as pname, deliever.name as dname, reciever.name as rname, cargo.status FROM cargo INNER JOIN provider ON cargo.prov_id=provider.prov_id INNER JOIN deliever ON cargo.del_id=deliever.del_id INNER JOIN reciever ON cargo.rec_id=reciever.rec_id WHERE cargo.rec_id=" . $role_id . ";";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<tr>";
                                    print "<td>" . $row["cargo_id"] . "</td>";
                                    print "<td>" . $row["name"] . "</td>";
                                    print "<td>" . $row["pname"] . "</td>";
                                    print "<td>" . $row["dname"] . "</td>";
                                    print "<td>" . $row["rname"] . "</td>";
                                    print "<td>" . $row["status"] . "</td>";
                                    print "</tr>";
                                }
                            break;
                        case 2:
                            $sql = "SELECT cargo.cargo_id, cargo.name, provider.name as pname, deliever.name as dname, reciever.name as rname, cargo.status FROM cargo INNER JOIN provider ON cargo.prov_id=provider.prov_id INNER JOIN deliever ON cargo.del_id=deliever.del_id INNER JOIN reciever ON cargo.rec_id=reciever.rec_id WHERE cargo.del_id=" . $role_id . ";";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<tr>";
                                    print "<td>" . $row["cargo_id"] . "</td>";
                                    print "<td>" . $row["name"] . "</td>";
                                    print "<td>" . $row["pname"] . "</td>";
                                    print "<td>" . $row["dname"] . "</td>";
                                    print "<td>" . $row["rname"] . "</td>";
                                    print "<td>" . $row["status"] . "</td>";
                                    print "</tr>";
                                }
                            break;
                        case 3:
                            $sql = "SELECT cargo.cargo_id, cargo.name, provider.name as pname, deliever.name as dname, reciever.name as rname, cargo.status, cargostatus.wage, cargostatus.length*cargostatus.width*cargostatus.heigth as size, storage.name as sname FROM cargo INNER JOIN provider ON cargo.prov_id=provider.prov_id INNER JOIN deliever ON cargo.del_id=deliever.del_id INNER JOIN reciever ON cargo.rec_id=reciever.rec_id INNER JOIN storage ON cargo.stor_id=storage.stor_id INNER JOIN cargostatus ON cargo.cargo_id=cargostatus.cargostat_id WHERE cargo.prov_id=" . $role_id . ";";
                            if ($result = $conn->query($sql))
                                while ($row = $result->fetch_assoc()) {
                                    print "<tr>";
                                    print "<td>" . $row["cargo_id"] . "</td>";
                                    print "<td>" . $row["name"] . "</td>";
                                    print "<td>" . $row["pname"] . "</td>";
                                    print "<td>" . $row["dname"] . "</td>";
                                    print "<td>" . $row["rname"] . "</td>";
                                    print "<td>" . $row["status"] . "</td>";
                                    print "<td>" . $row["size"] . "</td>";
                                    print "<td>" . $row["wage"] . "</td>";
                                    print "<td>" . $row["sname"] . "</td>";
                                    print "</tr>";
                                }
                            break;
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
