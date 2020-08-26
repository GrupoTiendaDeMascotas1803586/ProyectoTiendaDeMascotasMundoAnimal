<?php

namespace App\Controllers;
require(__DIR__ . '/../Models/Venta.php');
use App\Models\Venta;

if(!empty($_GET['action'])){
    VentaController::main($_GET['action']);
}

class VentaController{

    static function main($action)
    {
        if ($action == "create") {
            VentaController::create();
        } else if ($action == "edit") {
            VentaController::edit();
        } else if ($action == "searchForID") {
            VentaController::searchForID($_REQUEST['id']);
        } else if ($action == "searchAll") {
            VentaController::getAll();
        } else if ($action == "activate") {
            VentaController::activate();
        } else if ($action == "inactivate") {
            VentaController::inactivate();
        }/*else if ($action == "login"){
            ElementoController::login();
        }else if($action == "cerrarSession"){
            ElementoController::cerrarSession();
        }*/

    }

    static public function create()
    {
        try {
            $arrayVENTA = array();
            $arrayVENTA['fecha'] = $_POST['fecha'];
            $arrayVENTA['subtotal'] = $_POST['subtotal'];
            $arrayVENTA['totalApagar'] = $_POST['totalApagar'];
            $arrayVENTA['PERSONA'] = $_POST['PERSONA'];

            if (!Venta::VentaRegistrado($arrayVENTA['fecha'])) {
                $VENTA = new Venta($arrayVENTA);
                if ($VENTA->create()) {
                    header("Location: ../../views/modules/venta/index.php?respuesta=correcto");
                }
            } else {
                header("Location: ../../views/modules/venta/create.php?respuesta=error&mensaje=Venta ya creada");
            }
        } catch (Exception $e) {
            header("Location: ../../views/modules/venta/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function edit()
    {
        try {
            $arrayVENTA = array();
            $arrayVENTA['fecha'] = $_POST['fecha'];
            $arrayVENTA['subtotal'] = $_POST['subtotal'];
            $arrayVENTA['totalApagar'] = $_POST['totalApagar'];
            $arrayVENTA['PERSONA'] = $_POST['PERSONA'];
            $arrayVENTA['id'] = $_POST['id'];

            $venta = new Venta($arrayVENTA);
            $venta->update();

            header("Location: ../../views/modules/venta/show.php?Id=" . $venta->getid() . "&respuesta=correcto");
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/venta/edit.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function activate()
    {
        try {
            $ObjVENTA = Venta::searchForId($_GET['id']);
            $ObjVENTA->setEstado("Activo");
            if ($ObjVENTA->update()) {
                header("Location: ../../views/modules/venta/index.php");
            } else {
                header("Location: ../../views/modules/venta/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/venta/index.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

    static public function inactivate()
    {
        try {
            $ObjVENTA = Venta::searchForId($_GET['id']);
            $ObjVENTA->setEstado("Inactivo");
            if ($ObjVENTA->update()) {
                header("Location: ../../views/modules/venta/index.php");
            } else {
                header("Location: ../../views/modules/venta/index.php?respuesta=error&mensaje=Error al guardar");
            }
        } catch (\Exception $e) {
            //var_dump($e);
            header("Location: ../../views/modules/venta/index.php?respuesta=error");
        }
    }

    static public function searchForID($id)
    {
        try {
            return Venta::searchForId($id);
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../../views/modules/usuarios/manager.php?respuesta=error");
        }
    }

    static public function getAll()
    {
        try {
            return Venta::getAll();
        } catch (\Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }
    static public function selectVenta($isMultiple = false,
                                         $isRequired = true,
                                         $id = "id",
                                         $fecha = "id",
                                         $defaultValue = "",
                                         $class = "",
                                         $where = "",
                                         $arrExcluir = array())
    {
        $arrVenta = array();
        if ($where != "") {
            $base = "SELECT * FROM Venta WHERE ";
            $arrVenta = Venta::search($base . $where);
        } else {
            $arrVenta = Venta:: getAll();
        }

        $htmlSelect = "<select " . (($isMultiple) ? "multiple" : "") . " " . (($isRequired) ? "required" : "") . " id= '" . $id . "' datetime='" . $fecha. "' class='" . $class . "'>";
        $htmlSelect .= "<option value='' >Seleccione</option>";
        if (count($arrVenta) > 0) {
            foreach ($arrVenta as $Venta)
                if (!VentaController::VentaIsInArray($Venta->getId(), $arrExcluir))
                    $htmlSelect .= "<option " . (($Venta != "") ? (($defaultValue == $Venta->getId()) ? "selected" : "") : "") . " value='" . $Venta->getId() . "'> - " . $Venta->getFecha() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
}