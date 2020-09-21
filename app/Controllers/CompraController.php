<?php
namespace App\Controllers;
require(__DIR__.'/../Models/Compra.php');
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

            if(!Compra::CompraRegistrada($arrayCompra['id'])){
                $Compra = new Compra(($arrayCompra));
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
            return Compra::searchForId($id);
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
}