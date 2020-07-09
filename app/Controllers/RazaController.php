<?php


namespace App\Controllers;

require(__DIR__.'/../Models/Raza.php');
use App\Models\Raza;

if(!empty($_GET['action'])){
    RazaController::main($_GET['action']);
}
class RazaController
{
    static function main($action)
    {
        if ($action == "create") {
            RazaController::create();
        } else if ($action == "edit") {
            RazaController::edit();
        } else if ($action == "searchForID") {
            RazaController::searchForID($_REQUEST['id']);
        } else if ($action == "searchAll") {
            RazaController::getAll();
        } else if ($action == "activate") {
            RazaController::activate();
        } else if ($action == "inactivate") {
            RazaController::inactivate();
        }/*else if ($action == "login"){
            RazaController::login();
        }else if($action == "cerrarSession"){
            RazaController::cerrarSession();
        }*/

    }

    static public function create()
    {
        try {
            $arrayRaza = array();
            $arrayRaza['nombre'] = $_POST['nombre'];
            $arrayRaza['especie'] = $_POST['especie'];
            $arrayRaza['estado'] = 'Activo';
            if(!Raza::RazaRegistrada($arrayRaza['documento'])){
                $Raza = new Raza ($arrayRaza);
                if($Raza->create()){
                    header("Location: ../../views/modules/raza/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/raza/create.php?respuesta=error&mensaje=Usuario ya registrado");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/raza/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayRaza = array();
            $arrayRaza['nombre'] = $_POST['nombre'];
            $arrayRaza['especie'] = $_POST['especie'];
            $arrayRaza['estado'] = $_POST['estado'];
            $arrayRaza['id'] = $_POST['id'];

            $user = new Raza($arrayRaza);
            $user->update();

            header("Location: ../../views/modules/raza/show.php?id=".$user->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/raza/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjRaza = Raza::searchForId($_GET['Id']);
            $ObjRaza->setEstado("Disponible");
            if($ObjRaza->update()){
                header("Location: ../../views/modules/raza/index.php");
            }else{
                header("Location: ../../views/modules/raza/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/raza/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $ObjRaza = Raza::searchForId($_GET['Id']);
            $ObjRaza->setEstado("No Disponible");
            if($ObjRaza->update()){
                header("Location: ../../views/modules/raza/index.php");
            }else{
                header("Location: ../../views/modules/raza/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/raza/index.php?respuesta=error");
        }
    }

    static public function searchForID ($id){
        try {
            return Raza::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/raza/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Raza::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/raza/manager.php?respuesta=error");
        }
    }

}