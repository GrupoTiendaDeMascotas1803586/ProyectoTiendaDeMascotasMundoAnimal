<?php

namespace App\Models;
require('BasicModel.php');

class Compra extends BasicModel
{
    private $id;
    private $fecha;
    private $total;


    public function __construct($Compra = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Compra['id'] ?? null;
        $this->fecha = $Compra['fecha'] ?? null;
        $this->total = $Compra['total'] ?? null;

    }
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getFecha(): ? string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(?string $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return double
     */
    public function getTotal(): ?double
    {
        return $this->total;
    }

    /**
     * @param double $total
     */
    public function setTotal(?double $total): void
    {
        $this->total = $total;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.compra VALUES (NULL, ?, ?, ?)", array(
                $this->fecha,
                $this->total,

            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.compra SET fecha = ?,total= ? WHERE id = ?", array(

                $this->fecha,
                $this->total,
                $this->id
            )
        );
        $this->Disconnect();
        return $result;
    }

    public function deleted($id) : void
    {
        // TODO: Implement deleted() method.
    }

    public static function search($query) : array
    {
        $arrCompra= array();
        $tmp = new Compra();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Compra = new Compra();
            $Compra->id = $valor['id'];
            $Compra->fecha = $valor['fecha'];
            $Compra->total = $valor['total'];


            $Compra->Disconnect();
            array_push($arrCompra, $Compra);
        }
        $tmp->Disconnect();
        return $arrCompra;
    }

    public static function searchForId($id) : Compra
    {
        $Compra = null;
        if ($id > 0){
            $Compra = new Compra();
            $getrow = $Compra->getRow("SELECT * FROM proyecto.compra WHERE id =?", array($id));
            $Compra->id = $getrow['id'];
            $Compra->fecha = $getrow['fecha'];
            $Compra->total = $getrow['total'];

        }
        $Compra->Disconnect();
        return $Compra;
    }

    public static function getAll() : array
    {
        return Compra::search("SELECT * FROM proyecto.compra");
    }

    public static function CompraRegistrada ($id) : bool
    {
        $result = Compra::search("SELECT id FROM proyecto.compra where id = '".$id."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}