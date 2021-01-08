<?php

namespace App\Models;

require_once ('Persona.php');

use App\Models\persona;




class Compra extends BasicModel
{
    private $id;
    private $fecha;
    private $total;
    private $estado;
    private $PERSONA_id;


    public function __construct($Compra = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Compra['id'] ?? null;
        $this->fecha = $Compra['fecha'] ?? null;
        $this->total = $Compra['total'] ?? null;
        $this->estado = $Compra['estado'] ?? null;
        $this->PERSONA_id = $Compra['PERSONA_id'] ?? null;


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
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }
    /**
     * @return string
     */
    public function getestado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setestado(?string $estado): void
    {
        $this->estado = $estado;
    }
    /**
     * @return Persona
     */
    public function getPersonaId(): ? Persona
    {
        return $this->PERSONA_id;
    }

    /**
     * @param Persona $personaId
     */
    public function setPersonaId (?Persona $personaId): void
    {
        $this-> PERSONA_id = $personaId;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.compra VALUES (NULL, ?, ?,?,?)", array(
                $this->fecha,
                $this->total,
                $this->estado,
                $this->PERSONA_id->getId(), 

            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.compra SET fecha = ?,total= ?, estado= ?, PERSONA_id=? WHERE id = ?", array(

                $this->fecha,
                $this->total,
                $this->estado,
                $this->PERSONA_id -> getId(),
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
            $Compra->estado = $valor['estado'];
            $Compra->PERSONA_id =  Persona::searchForId($valor['PERSONA_id']);



            $Compra->Disconnect();
            array_push($arrCompra, $Compra);
        }
        $tmp->Disconnect();
        return $arrCompra;
    }

    public static function searchForID($id) : Compra
    {
        $Compra = null;
        if ($id > 0){
            $Compra = new Compra();
            $getrow = $Compra->getRow("SELECT * FROM proyecto.compra WHERE id =?", array($id));
            $Compra->id = $getrow['id'];
            $Compra->fecha = $getrow['fecha'];
            $Compra->total = $getrow['total'];
            $Compra->estado = $getrow['estado'];
            $Compra->PERSONA_id = Persona::searchForId($getrow['PERSONA_id']);

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
        $result = Compra::search("SELECT id FROM proyecto.compra where fecha = '".$id."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}