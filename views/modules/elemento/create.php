<?php require("../../partials/routes.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Crear ELEMENTO</title>
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
                        <h1>Crear un Nuevo ELEMENTO</h1>
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

            <?php if (!empty($_GET['respuesta'])) { ?>
                <?php if ($_GET['respuesta'] != "correcto") { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        Error al crear el ELEMENTO: <?= $_GET['mensaje'] ?>
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
                <form class="form-horizontal" method="post" id="frmCreateELEMENTO" name="frmCreateELEMENTO"
                      action="../../../app/Controllers/ElementoController.php?action=create">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="nombre" name=" nombre"
                                placeholder="Ingrese el nombre">
                            </div>
                        </div>

                                <div class="form-group row">
                                    <label for="tipoElemento" class="col-sm-2 col-form-label">tipoElemento</label>
                                    <div class="col-sm-10">
                                        <select id="tipoElemento" name="tipoElemento" class="custom-select">
                                            <option value="1">Accesorios</option>
                                            <option value="2">Alimentos</option>
                                            <option value="3">Medicamentos</option>
                                        </select>
                                    </div>
                                </div>

                        <div class="form-group row">
                            <label for="tamaño" class="col-sm-2 col-form-label">tamaño</label>
                            <div class="col-sm-10">
                                <input required type="text" minlength="6" class="form-control" id="tamaño" name="tamaño"
                                       placeholder="Ingrese el tamaño">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="material" class="col-sm-2 col-form-label">material</label>
                            <div class="col-sm-10">
                                <input required type="text" minlength="6" class="form-control" id="material"
                                       name="material" placeholder="Ingrese el material">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-sm-2 col-form-label">color</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="color" name="color"
                                       placeholder="Ingrese el color">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marca" class="col-sm-2 col-form-label">marca</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="marca" name="marca"
                                   placeholder="Ingrese la marca">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select id="estado" name="estado" class="custom-select">
                                <option value="1">Disponible</option>
                                <option value="2">No Disponible</option>
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
        </section>
    </div>
    <!-- /.card -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require('../../partials/footer.php'); ?>
</div>
<!-- ./wrapper -->
<?php require('../../partials/scripts.php'); ?>
</body>
</html>
