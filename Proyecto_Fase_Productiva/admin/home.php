<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#ead443;">
        <div class="container-fluid">
            <a class="navbar-brand" id="title" href="index.php" style="background-color:#ead443;">Regresar</a>
            <a class="navbar-brand" id="title" href="../index.php" style="background-color:#ead443;">Iniciar
                Sesion</a>
            <?php 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
            <ul class="nav navbar-right">
                <li class="dropdown">
                    <a class="user dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php 
							echo $fetch['firstname']." ".$fetch['lastname'];
						?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <?php include 'sidebar.php'?>
    <div id="content">
        <br /><br /><br />
        <br><br><br>
        <div class="alert alert-info" style="background-color:#f8f8f8;">
            <img src="../admin/images/Logo Empresa.jpg" width=45%;><br><br>
            <p>Para crear lo fantastico primero debemos entender lo <b>Real.</b></p>

            <!-- Informacion Developer System Information -->
            <br>
            <h3>Redes Sociales</h3>
            <a href="https://github.com/manuelp0635"><img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAAAXNSR0IArs4c6QAAATtJREFUOE+1lNFxAjEMRJdOQiWESoBKgEpCJ0Al0AnM85yYPZ1952Qm+mKQ72lXlrzSP8TqF8wvSc+e83NQIHtJG0nfBgN8k3SXdKkVaUGB/EgCPBfAD9lBDYo6gL2BcsAUKJGhKLwOOayh1K17oYCQB7xuQR9mmYIB9QuKCwOaRaB4pPQk6ThUG1We6UNu1ZY2uH36yCEC66XqQqCadsWFTqBuvSSXiEPexZwlnVzpyyA0vWvQgVjbELINKPJRGvFXpaVtrtTt9/YUEf7dxD4Nj5nEOgeqa2iO/Bv+5nIvrjRmLkBMAr/zjsebsEtr/BnDvFExHqjkY+a2NN/U5f5HqqisrWnMHTkmoPXc+aRwdlS49qA4uPXEOTQ7mTwoYSX6hv3aJABtXubSyx/rlxeBS21u3BK0c1PHx95rYE0W8rc+/wAAAABJRU5ErkJggg==" />
            </a>
        </div>
    </div>
    </div>
    <div id="footer">
        <center>
            <label class="footer-title">&copy; Innovent Software
                <?php echo date("Y", strtotime("+8 HOURS"))?></label>
    </div>
    </center>
    <?php include 'script.php'?>
</body>

</html>