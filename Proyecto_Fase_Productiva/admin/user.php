<!-- Agregar Nuevo Usuario-->

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
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body><br><br>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#ead443;">
        <div class="container-fluid">
            <label class="navbar-brand" id="title"></label>
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
        <div class="alert alert-info">
            <p>Administrador</p>
        </div>
        <button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span
                class="glyphicon glyphicon-plus"></span> Agregar Administrador</button>
        <br /><br />
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
					$query = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
                <?php 
					if($fetch['status'] != "administrador" || $_SESSION['status'] == $fetch['status']){
				?>
                <tr class="del_user<?php echo $fetch['user_id']?>">
                    <td><?php echo $fetch['firstname']?></td>
                    <td><?php echo $fetch['username']?></td>
                    <td>********</td>
                    <td><?php echo $fetch['status']?></td>
                    <td>
                        <center><button class="btn btn-warning" data-toggle="modal"
                                data-target="#edit_modal<?php echo $fetch['user_id']?>"><span
                                    class="glyphicon glyphicon-edit"></span> Editar</button>
                            <?php
							if($fetch['status'] != "administrator"){
						?>
                            | <button class="btn btn-danger btn-delete" id="<?php echo $fetch['user_id']?>"
                                type="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></center>
                    </td>
                    <?php
							}
						?>
                </tr>

                <div class="modal fade" id="edit_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="update_user.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Administrador</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="hidden" name="user_id"
                                                value="<?php echo $fetch['user_id']?>" />
                                            <input type="text" name="firstname" value="<?php echo $fetch['firstname']?>"
                                                class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input type="text" name="lastname" value="<?php echo $fetch['lastname']?>"
                                                class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="username" value="<?php echo $fetch['username']?>"
                                                class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="password" class="form-control"
                                                required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> Cerrar</button>
                                    <button name="edit" class="btn btn-warning"><span
                                            class="glyphicon glyphicon-save"></span> Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <?php
					}
				?>
                <?php
					}
				?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal_confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <h4 class="text-danger">¿Está seguro de que desea eliminar estos datos?</h4>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="btn_yes">Continuar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="save_user.php">
                    <div class="modal-header" style="background-color:#ead443;">
                        <h4 class="modal-title">Agregar administrador</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="firstname" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" name="username" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control" required="required" />
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cerrar</button>
                        <button name="save" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                            Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <center>
        <div id="footer">
            <label class="footer-title">&copy; Innovent Sofware
                <?php echo date("Y", strtotime("+8 HOURS"))?></label>
        </div>
    </center>
    <?php include 'script.php'?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-delete').on('click', function() {
            var user_id = $(this).attr('id');
            $("#modal_confirm").modal('show');
            $('#btn_yes').attr('name', user_id);
        });
        $('#btn_yes').on('click', function() {
            var id = $(this).attr('name');
            $.ajax({
                type: "POST",
                url: "delete_user.php",
                data: {
                    user_id: id
                },
                success: function() {
                    $("#modal_confirm").modal('hide');
                    $(".del_user" + id).empty();
                    $(".del_user" + id).html(
                        "<td colspan='6'><center class='text-danger'>Eliminando...</center></td>"
                    );
                    setTimeout(function() {
                        $(".del_user" + id).fadeOut('slow');
                    }, 1000);
                }
            });
        });
    });
    </script>
</body>

</html>