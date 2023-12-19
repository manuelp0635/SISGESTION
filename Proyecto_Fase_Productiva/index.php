<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/styles1.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#ead443;">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle"></button>
    </nav>

    <?php include 'login.php'?><center>
        <div id="footer">
            <label class="footer-title">&copy; Innovent Software
                <?php echo date("Y", strtotime("+8 HOURS"))?></label>
        </div>
    </center>
</body>

</html>