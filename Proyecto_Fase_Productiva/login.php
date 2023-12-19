<!-- Inicio de sesion y Validacion de datos -->
<br><br><br><br>

<!DOCTYPE>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" />
    <meta name="author" />
    <title>Login</title>
    <link href="admin/css/estilos.css" rel="stylesheet" />
    <link href="admin/css/normalize.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<br><br><br>

<body>
    <div id="layoutAutentication">
        <div id="layoutAuthenticacion_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div>
                            <div>
                                <div class="card-body">
                                    <div class="panel-heading">
                                        <center>
                                            <h1 class="panel">Iniciar Sesion</h1>
                                        </center>
                                    </div>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="id_usuario"># Usuario</label>
                                            <input class="form-control" name="user1_no" placeholder=""
                                                type="user1_number" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input class="form-control" name="user1_password" placeholder=""
                                                type="password" required="required" />
                                        </div>
                                        <?php include 'login_query.php'?>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary" name="login"
                                                style="background-color:#ffb307;"><span
                                                    class="glyphicon glyphicon-log-in"></span>
                                                Acceder
                                            </button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
</body>

</html>