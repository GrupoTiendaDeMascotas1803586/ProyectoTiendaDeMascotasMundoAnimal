<?php
namespace App\Controllers;

require(__DIR__ . '/../Models/Cita.php');
use App\Models\Cita;

if(!empty($_GET['action'])){
    CitaController::main($_GET['action']);
}
class CitaController
{
    static function main($action)
    {
        if ($action == "create") {
            CitaController::create();
        } else if ($action == "edit") {
            CitaController::edit();
        } else if ($action == "searchForID") {
            CitaController::searchForID($_REQUEST['idCita']);
        } else if ($action == "searchAll") {
            CitaController::getAll();
        } else if ($action == "activate") {
            CitaController::activate();
        } else if ($action == "inactivate") {
            CitaController::inactivate();
        }/*else if ($action == "login"){
            CitaController::login();
        }else if($action == "cerrarSession"){
            CitaController::cerrarSession();
        }*/

    }

    static public function create()
    {
        try {
            $arrayCita = array();
            $arrayCita['horaInicio'] = $_POST['horaInicio'];
            $arrayCita['fechaInicio'] = $_POST['fechaInicio'];
            $arrayCita['estado'] = $_POST['estado'];
            if(!Cita::CitaRegistrada($arrayCita['horaInicio'])){
                $Cita = new Cita ($arrayCita);
                if($Cita->create()){
                    header("Location: ../../views/modules/cita/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/cita/create.php?respuesta=error&mensaje=Cita ya registrada");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/cita/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }


    static public function edit (){
        try {
            $arrayCita = array();
            $arrayCita['horaInicio'] = $_POST['horaInicio'];
            $arrayCita['fechaInicio'] = $_POST['fechaInicio'];
            $arrayCita['estado'] = $_POST['estado'];
            $arrayCita['id'] = $_POST['id'];

            $user = new Cita($arrayCita);
            $user->update();

            header("Location: ../../views/modules/Cita/show.php?id=".$user->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/Cita/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjCita = Cita::searchForId($_GET['Id']);
            $ObjCita->setEstado("Disponible");
            if($ObjCita->update()){
                header("Location: ../../views/modules/Cita/index.php");
            }else{
                header("Location: ../../views/modules/Cita/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/Cita/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $ObjCita = Cita::searchForId($_GET['Id']);
            $ObjCita->setEstado("No Disponible");
            if($ObjCita->update()){
                header("Location: ../../views/modules/Cita/index.php");
            }else{
                header("Location: ../../views/modules/Cita/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/Cita/index.php?respuesta=error");
        }
    }

    static public function searchForID ($id){
        try {
            return Cita::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/Cita/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Cita::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../Vista/modules/Cita/manager.php?respuesta=error");
        }
    }

}