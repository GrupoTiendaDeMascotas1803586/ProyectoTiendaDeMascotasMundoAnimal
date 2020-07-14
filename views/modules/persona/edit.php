<?php
require("../../partials/routes.php");
require("../../../app/Controllers/PersonaController.php");

use App\Controllers\PersonaController; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Editar Persona</title>
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
                        <h1>Editar Persona</h1>
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
                <?php if ($_GET['respuesta'] == "error"){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            Error al editar Persona: <?= ($_GET['mensaje']) ?? "" ?>
                    </div>
                <?php } ?>
            <?php } else if (empty($_GET['id'])) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    Faltan criterios de busqueda <?= ($_GET['mensaje']) ?? "" ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Horizontal Form</h3>
                </div>
                <!-- /.card-header -->
                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                    <p>
                    <?php
                    $DataPersona = PersonaController::searchForID($_GET["id"]);
                        if(!empty($DataPersona)){
                    ?>
                            <!-- form start -->
                            <form class="form-horizontal" method="post" id="frmEditPersona" name="frmEditPersona" action="../../../app/Controllers/PersonaController.php?action=edit">
                                <input id="id" name="id" value="<?php echo $DataPersona->getId(); ?>" hidden required="required" type="text">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="tipoDocumento" class="col-sm-2 col-form-label">Tipo Documento</label>
                                        <div class="col-sm-10">
                                            <select id="tipoDocumento" name="tipoDocumento" class="custom-select">
                                                <option <?= ($DataPersona->getTipoDocumento() == "C.C") ? "selected":""; ?> value="C.C">Cedula de Ciudadania</option>
                                                <option <?= ($DataPersona->getTipoDocumento() == "T.I") ? "selected":""; ?> value="T.I">Tarjeta de Identidad</option>
                                                <option <?= ($DataPersona->getTipoDocumento() == "R.C") ? "selected":""; ?> value="R.C">Registro Civil</option>
                                                <option <?= ($DataPersona->getTipoDocumento() == "Pasaporte") ? "selected":""; ?> value="Pasaporte">Pasaporte</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="documento" class="col-sm-2 col-form-label">Documento</label>
                                        <div class="col-sm-10">
                                            <input required type="number" minlength="6" class="form-control" id="documento" name="documento" value="<?= $DataPersona->getDocumento(); ?>" placeholder="Ingrese su documento">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="nombre" name="nombre" value="<?= $DataPersona->getNombres(); ?>" placeholder="Ingrese sus nombres">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="apellido" name="apellido" value="<?= $DataPersona->getApellidos(); ?>" placeholder="Ingrese sus apellidos">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-10">
                                            <input required type="number" minlength="6" class="form-control" id="telefono" name="telefono" value="<?= $DataPersona->getTelefono(); ?>" placeholder="Ingrese su telefono">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefonoOpcinal" class="col-sm-2 col-form-label">Telefono Opcinal</label>
                                        <div class="col-sm-10">
                                            <input required type="number" minlength="6" class="form-control" id="telefonoOpcinal" name="telefonoOpcinal" value="<?= $DataPersona->getTelefonoOpcional(); ?>" placeholder="Ingrese su telefono opcional">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="direccion" name="direccion" value="<?= $DataPersona->getDireccion(); ?>" placeholder="Ingrese su direccion">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contraseña" class="col-sm-2 col-form-label">Contraseña</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="contraseña" name="contraseña" value="<?= $DataPersona->getContraseña(); ?>" placeholder="Ingrese su contraseña">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="TIPOPERSONA" class="col-sm-2 col-form-label">Tipo persona</label>
                                        <div class="col-sm-10">
                                            <select id="rol" name="rol" class="custom-select">
                                                <option <?= ($DataPersona->getTIPOPERSONA() == "Gerente") ? "selected":""; ?> value="Gerente">Gerente</option>
                                                <option <?= ($DataPersona->getTIPOPERSONA() == "Proveedor") ? "selected":""; ?> value="Proveedor">Proveedor</option>
                                                <option <?= ($DataPersona->getTIPOPERSONA() == "Auxiliar") ? "selected":""; ?> value="Auxiliar">Auxiliar</option>
                                                <option <?= ($DataPersona->getTIPOPERSONA() == "Cliente") ? "selected":""; ?> value="Cliente">Cliente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select id="estado" name="estado" class="custom-select">
                                                <option <?= ($DataPersona->getEstado() == "Activo") ? "selected":""; ?> value="Activo">Activo</option>
                                                <option <?= ($DataPersona->getEstado() == "Inactivo") ? "selected":""; ?> value="Inactivo">Inactivo</option>
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
                    <?php }else{ ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                No se encontro ningun registro con estos parametros de busqueda <?= ($_GET['mensaje']) ?? "" ?>
                            </div>
                    <?php } ?>
                    </p>
                <?php } ?>
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
