<?php
require("../../partials/routes.php");
require("../../../app/Controllers/RazaController.php");

use App\Controllers\RazaController; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Editar Raza</title>
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
                        <h1>Editar Nueva Raza</h1>
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
                            Error al crear la raza: <?= ($_GET['mensaje']) ?? "" ?>
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
                    $DataRaza = RazaController::searchForID($_GET["id"]);
                        if(!empty($DataRaza)){
                    ?>
                            <!-- form start -->
                            <form class="form-horizontal" method="post" id="frmEditRaza" name="frmEditRaza" action="../../../app/Controllers/RazaController.php?action=edit">
                                <input id="id" name="id" value="<?php echo $DataRaza->getId(); ?>" hidden required="required" type="text">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="nombre" name="nombre" value="<?= $DataRaza->getNombre(); ?>" placeholder="Ingrese nombre de la raza">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="especie" class="col-sm-2 col-form-label">Especie</label>
                                        <div class="col-sm-10">
                                            <select id="especie" name="especie" class="custom-select">
                                                <option <?= ($DataRaza->getEspecie() == "1") ? "selected":""; ?> value="1">Acuatico</option>
                                                <option <?= ($DataRaza->getEspecie() == "2") ? "selected":""; ?> value="2">Canino</option>
                                                <option <?= ($DataRaza->getEspecie() == "3") ? "selected":""; ?> value="3">Felino</option>
                                                <option <?= ($DataRaza->getEspecie() == "4") ? "selected":""; ?> value="4">Avicola</option>
                                                <option <?= ($DataRaza->getEspecie() == "5") ? "selected":""; ?> value="5">Roedor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select id="estado" name="estado" class="custom-select">
                                                <option <?= ($DataRaza->getEstado() == "Activo") ? "selected":""; ?> value="Activo">Disponible</option>
                                                <option <?= ($DataRaza->getEstado() == "Inactivo") ? "selected":""; ?> value="Inactivo">No Disponible</option>
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
