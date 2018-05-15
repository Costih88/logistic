<?php
include '../functions/login_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Аудиозаписи</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .post p > img {
            max-width: 100%;
        }

        audio {
            width: 100%;
        }
    </style>
</head>
<body class="skin-blue-light" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="../main"><i class="fa fa-user-circle-o"></i> <span>Моя страница</span></a>
                    <li><a href="../news"><i class="fa fa-newspaper-o"></i> <span>Все новости</span></a>
                    <li><a href="../people"><i class="fa fa-address-book-o"></i> <span>Люди</span></a>
                    <li><a href="../messages"><i class="fa fa-envelope-o"></i> <span>Сообщения</span></a>
                    <li class="active"><a href="../audio"><i class="fa fa-music"></i> <span>Аудио</span></a>
                    <li><a href="../photo"><i class="fa fa-picture-o"></i> <span>Фото</span></a>
                </ul>


                <!-- Profile Image -->
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ваши аудио</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        /*$sql = "SELECT * FROM audio WHERE ownerId=" . $myId . "  ORDER BY id DESC;";
                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows==0) print("<h3>Пока что здесь пусто, потому что вы не загружали аудиозаписей</h3>");
                            while ($row = $result->fetch_assoc()) {
                                $src = $row["link"];
                                print "<p>" . $row["artist"] . " - " . $row["name"] . "</p>";
                                print "<audio controls=\"controls\" preload=\"metadata\" src=\"../" . $src . "\">Тег audio не поддерживается вашим браузером.</audio>";
                            }
                        }*/
                        print "<h3>Пока что это возможность недоступна ввиду ограниченных возможнестей сервера</h3>"
                        ?>
                        <input type="email" id="vk_email">
                        <input type="password" id="vk_pass">
                        <button class="bg-blue" id="signin">Sing in VK</button>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
</body>
</html>
