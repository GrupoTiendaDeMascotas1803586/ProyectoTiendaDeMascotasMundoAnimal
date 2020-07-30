<?php require("../../partials/routes.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Crear Persona</title>
    <?php require("../../partials/head_imports.php"); ?>
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
    <?php require("../../partials/navbar_customization.php"); ?>

    <?php require("../../partials/sliderbar_main_menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Crear una Nueva Persona</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseURL; ?>/Views/">ProyectoTiendaDeMascotasMundoAnimal</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] != "correcto"){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            Error al crear la Persona: <?= $_GET['mensaje'] ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" id="frmCreatePersona" name="frmCreatePersona" action="../../../app/Controllers/PersonaController.php?action=create">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="tipoDocumento" class="col-sm-2 col-form-label">Tipo Documento</label>
                            <div class="col-sm-10">
                                <select id="tipoDocumento" name="tipoDocumento" class="custom-select">
                                    <option value="C.C">Cedula de Ciudadania</option>
                                    <option value="T.I">Tarjeta de Identidad</option>
                                    <option value="R.C">Registro Civil</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10">
                                <input required type="number" minlength="6" class="form-control" id="documento" name="documento" placeholder="Ingrese su documento">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese sus nombres">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese sus apellidos">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input required type="number" minlength="6" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefonoOpcional" class="col-sm-2 col-form-label">TelefonoOpcinal</label>
                            <div class="col-sm-10">
                                <input required type="number" minlength="6" class="form-control" id="telefonoOpcional" name="telefonoOpcional" placeholder="Ingrese un telefonoOpcional">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su direccion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contraseña" class="col-sm-2 col-form-label">contraseña</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipoPersona" class="col-sm-2 col-form-label">Tipo Persona</label>
                            <div class="col-sm-10">
                                <select id="tipoPersona" name="tipoPersona" class="custom-select">
                                    <option value="Gerente">Gerente</option>
                                    <option value="Proveedor">Proveedor</option>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Cliente">Cliente</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="custom-select">
                                    <option value="1">activo</option>
                                    <option value="2">inactivo</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Enviar</button>
                        <a href="index.php" role="button" class="btn btn-default float-right">Cancelar</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require ('../../partials/footer.php');?>
</div>
<!-- ./wrapper -->
<?php require ('../../partials/scripts.php');?>
</body>
</html>
