<?php


namespace App\Controllers;

require(__DIR__ . '/../Models/Servicio.php');
use App\Models\Servicio;

if(!empty($_GET['action'])){
    ServicioController::main($_GET['action']);
}
class ServicioController
{
    static function main($action)
    {
        if ($action == "create") {
            ServicioController::create();
        } else if ($action == "edit") {
            ServicioController::edit();
        } else if ($action == "searchForID") {
            ServicioController::searchForID($_REQUEST['idServicio']);
        } else if ($action == "searchAll") {
            ServicioController::getAll();
        } else if ($action == "activate") {
            ServicioController::activate();
        } else if ($action == "inactivate") {
            ServicioController::inactivate();
        }/*else if ($action == "login"){
            ServicioController::login();
        }else if($action == "cerrarSession"){
            ServicioController::cerrarSession();
        }*/

    }

    static public function create()
    {
        try {
            $arrayServicio = array();
            $arrayServicio['nombre'] = $_POST['nombre'];
            $arrayServicio['costo'] = $_POST['costo'];
            $arrayServicio['estado'] = $_POST['estado'];
            $arrayServicio['tipoServicio'] = $_POST['tipoServicio'];
            if(!Servicio::ServicioRegistrado($arrayServicio['nombre'])){
                $Servicio = new Servicio ($arrayServicio);
                if($Servicio->create()){
                    header("Location: ../../views/modules/servicio/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/servicio/create.php?respuesta=error&mensaje=servicio ya registrado");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/servicio/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }


    static public function edit (){
        try {
            $arrayServicio = array();
            $arrayServicio['nombre'] = $_POST['nombre'];
            $arrayServicio['costo'] = $_POST['costo'];
            $arrayServicio['estado'] = $_POST['estado'];
            $arrayServicio['tipoServicio'] = $_POST['tipoServicio'];
            $arrayServicio['id'] = $_POST['id'];

            $user = new Servicio($arrayServicio);
            $user->update();

            header("Location: ../../views/modules/servicio/show.php?id=".$user->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/servicio/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjServicio = Servicio::searchForId($_GET['Id']);
            $ObjServicio->setEstado("Disponible");
            if($ObjServicio->update()){
                header("Location: ../../views/modules/servicio/index.php");
            }else{
                header("Location: ../../views/modules/servicio/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/servicio/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $ObjServicio = Servicio::searchForId($_GET['Id']);
            $ObjServicio->setEstado("No Disponible");
            if($ObjServicio->update()){
                header("Location: ../../views/modules/servicio/index.php");
            }else{
                header("Location: ../../views/modules/servicio/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/servicio/index.php?respuesta=error");
        }
    }

    static public function searchForID ($id){
        try {
            return Servicio::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/servicio/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Servicio::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../Vista/modules/servicio/manager.php?respuesta=error");
        }
    }

}