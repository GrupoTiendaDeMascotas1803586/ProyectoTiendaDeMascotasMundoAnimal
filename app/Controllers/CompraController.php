<?php


namespace App\Controllers;
require(__DIR__.'/../Models/Compra.php');
use App\Models\Persona;
use App\Models\Compra;


if(!empty($_GET['action'])){
    CompraController::main($_GET['action']);
}

class CompraController
{
    static function main($action)
    {
        if ($action == "create") {
            CompraController::create();
        } else if ($action == "edit") {
            CompraController::edit();
        } else if ($action == "searchForID") {
            CompraController::searchForID($_REQUEST['id']);
        } else if ($action == "searchAll") {
            CompraController::getAll();
        } else if ($action == "activate") {
            CompraController::activate();
        } else if ($action == "inactivate") {
            CompraController::inactivate();
        }/*else if ($action == "login"){
            CompraController::login();
        }else if($action == "cerrarSession"){
            CompraController::cerrarSession();
        }*/
    }

    static public function create()
    {
        try {
            $arrayCompra = array();
            $arrayCompra['fecha'] = $_POST['fecha'];
            $arrayCompra['total'] = $_POST['total'];
            $arrayCompra['estado'] = $_POST['estado'];
            $arrayCompra['PERSONA_id'] = Persona::searchForID($_POST['PERSONA_id']);


            if(!Compra::CompraRegistrada($arrayCompra['fecha'])){
                $Compra = new Compra ($arrayCompra);
                if($Compra->create()){
                    header("Location: ../../views/modules/compra/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/compra/create.php?respuesta=error&mensaje=Compra registrada");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/compra/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayCompra = array();
            $arrayCompra['fecha'] = $_POST['fecha'];
            $arrayCompra['total'] = $_POST['total'];
            $arrayCompra['estado'] = $_POST['estado'];
            $arrayCompra['PERSONA_id'] = Persona:: searchForId($_POST['PERSONA_id']);
            $arrayCompra['id'] = $_POST['id'];

            $Compra = new Compra($arrayCompra);
            $Compra->update();

            header("Location: ../../views/modules/compra/show.php?id=".$Compra->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/compra/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function searchForID ($id){
        try {
            return Compra::searchForID($id);
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/compra/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Compra::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../views/modules/compra/manager.php?respuesta=error");
        }
    }
    static public function activate()
    {
        try {
            $ObjUsuario = Compra::searchForId($_GET['Id']);
            $ObjUsuario->setEstado("activo");
            if ($ObjUsuario->update()) {
                header("Location: ../../views/modules/Compra/index.php");
            } else {
                header("Location: ../../views/modules/Compra/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            // GeneralFunctions::console( $e, 'error', 'errorStack');
            //var_dump($e);
            header("Location: ../../views/modules/Compra/index.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }
//funcion inactiva de la producto
    static public function inactivate ()
    {
        try {
            $ObjProducto = Compra::searchForId($_GET['Id']);
            $ObjProducto->setEstado("inactivo");
            if($ObjProducto->update()){
                header("Location: ../../views/modules/Compra/index.php?respuesta=correcto");
            }else{
                header("Location: ../../views/modules/Compra/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/Compra/index.php?respuesta=error&mensaje" . $e-> getMessage());
        }
    }
}