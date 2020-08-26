<?php

namespace App\Controllers;
require(__DIR__ . '/../Models/Elemento.php');
use App\Models\Elemento;

if(!empty($_GET['action'])){
    ElementoController::main($_GET['action']);
}

class ElementoController{

    static function main($action)
    {
        if ($action == "create") {
            ElementoController::create();
        } else if ($action == "edit") {
            ElementoController::edit();
        } else if ($action == "searchForID") {
            ElementoController::searchForID($_REQUEST['id']);
        } else if ($action == "searchAll") {
            ElementoController::getAll();
        } else if ($action == "activate") {
            ElementoController::activate();
        } else if ($action == "inactivate") {
            ElementoController::inactivate();
        }/*else if ($action == "login"){
            ElementoController::login();
        }else if($action == "cerrarSession"){
            ElementoController::cerrarSession();
        }*/

    }

    static public function create()
    {
        try {
            $arrayELEMENTO = array();
            $arrayELEMENTO['nombre'] = $_POST['nombre'];
            $arrayELEMENTO['tipoElemento'] = $_POST['tipoElemento'];
            $arrayELEMENTO['tamaño'] = $_POST['tamaño'];
            $arrayELEMENTO['material'] = $_POST['material'];
            $arrayELEMENTO['color'] = $_POST['color'];
            $arrayELEMENTO['marca'] = $_POST['marca'];
            $arrayELEMENTO['estado'] = $_POST['estado'];

            if(!Elemento::ElementoRegistrado($arrayELEMENTO['nombre'])){
                $ELEMENTO = new Elemento($arrayELEMENTO);
                if($ELEMENTO->create()){
                    header("Location: ../../views/modules/elemento/index.php?respuesta=correcto");
                }
            }else{
                header("Location: ../../views/modules/elemento/create.php?respuesta=error&mensaje=Elemento ya creado");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/elemento/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit (){
        try {
            $arrayELEMENTO = array();
            $arrayELEMENTO['nombre'] = $_POST['nombre'];
            $arrayELEMENTO['tipoElemento'] = $_POST['tipoElemento'];
            $arrayELEMENTO['tamaño'] = $_POST['tamaño'];
            $arrayELEMENTO['material'] = $_POST['material'];
            $arrayELEMENTO['color'] = $_POST['color'];
            $arrayELEMENTO['marca'] = $_POST['marca'];
            $arrayELEMENTO['estado'] = $_POST['estado'];
            $arrayELEMENTO['id'] = $_POST['id'];

            $elemento = new Elemento($arrayELEMENTO);
            $elemento->update();

            header("Location: ../../views/modules/elemento/show.php?Id=".$elemento->getid()."&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/elemento/edit.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function activate (){
        try {
            $ObjELEMENTO = Elemento::searchForId($_GET['id']);
            $ObjELEMENTO->setEstado("Activo");
            if($ObjELEMENTO->update()){
                header("Location: ../../views/modules/elemento/index.php");
            }else{
                header("Location: ../../views/modules/elemento/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/elemento/index.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function inactivate (){
        try {
            $ObjELEMENTO = Elemento::searchForId($_GET['id']);
            $ObjELEMENTO->setEstado("Inactivo");
            if($ObjELEMENTO->update()){
                header("Location: ../../views/modules/elemento/index.php");
            }else{
                header("Location: ../../views/modules/elemento/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/elemento/index.php?respuesta=error");
        }
    }

    static public function searchForID ($id){
        try {
            return Elemento::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../../views/modules/usuarios/manager.php?respuesta=error");
        }
    }

    static public function getAll (){
        try {
            return Elemento::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }


}