<?php


namespace App\Controllers;
require(__DIR__.'/../Models/Persona.php');
use App\Models\Persona;
if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
}
class PersonaController
{
    static function main($action)
    {
        if ($action == "create") {
            PersonaController::create();
        } else if ($action == "edit") {
            PersonaController::edit();
        } else if ($action == "searchForID") {
            PersonaController::searchForID($_REQUEST['id']);
        } else if ($action == "searchAll") {
            PersonaController::getAll();
        } else if ($action == "activate") {
            PersonaController::activate();
        } else if ($action == "inactivate") {
            PersonaController::inactivate();
        }/*else if ($action == "login"){
            RazaController::login();
        }else if($action == "cerrarSession"){
            RazaController::cerrarSession();
        }*/
    }

    static public function create()
    {
        try {
            $arrayPersona = array();
            $arrayPersona['tipoDocumento'] = $_POST['tipoDocumento'];
            $arrayPersona['documento'] = $_POST['documento'];
            $arrayPersona['nombre'] = $_POST['nombre'];
            $arrayPersona['apellido'] = $_POST['apellido'];
            $arrayPersona['telefono'] = $_POST['telefono'];
            $arrayPersona['telefonoOpcional'] = $_POST['telefonoOpcional'];
            $arrayPersona['direccion'] = $_POST['direccion'];
            $arrayPersona['contraseña'] = $_POST['contraseña'];
            $arrayPersona['tipoPersona'] = $_POST['tipoPersona'];
            $arrayPersona['estado'] = $_POST ['estado'];
            if(!Persona::PersonaRegistrada($arrayPersona['documento'])){
                $Persona = new Persona ($arrayPersona);
                if($Persona->create()){
                    header("Location: ../../views/modules/persona/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/persona/create.php?respuesta=error&mensaje=Persona ya registrada");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/persona/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayPersona = array();
            $arrayPersona['tipoDocumento'] = $_POST['tipoDocumento'];
            $arrayPersona['documento'] = $_POST['documento'];
            $arrayPersona['nombre'] = $_POST['nombre'];
            $arrayPersona['apellido'] = $_POST['apellido'];
            $arrayPersona['telefono'] = $_POST['telefono'];
            $arrayPersona['telefonoOpcional'] = $_POST['telefonoOpcional'];
            $arrayPersona['direccion'] = $_POST['direccion'];
            $arrayPersona['contraseña'] = $_POST['contraseña'];
            $arrayPersona['tipoPersona'] = $_POST['tipoPersona'];
            $arrayPersona['estado'] = $_POST ['estado'];
            $arrayPersona['id'] = $_POST['id'];

            $persona = new persona($arrayPersona);
            $persona->update();

            header("Location: ../../views/modules/persona/show.php?id=".$persona->getId()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/persona/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }
    static public function activate (){
        try {
            $Objpersona = Persona::searchForId($_GET['id']);
            $Objpersona->setEstado("Activo");
            if($Objpersona->update()){
                header("Location: ../../views/modules/persona/index.php");
            }else{
                header("Location: ../../views/modules/persona/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/persona/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $Objpersona = persona::searchForId($_GET['id']);
            $Objpersona->setEstado("Inactivo");
            if($Objpersona->update()){
                header("Location: ../../views/modules/persona/index.php");
            }else{
                header("Location: ../../views/modules/persona/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/persona/index.php?respuesta=error");
        }
    }

    static public function searchForID ($id){
        try {
            return Persona::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../../views/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Persona::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            header("Location: ../views/modules/persona/manager.php?respuesta=error");
        }
    } 
}