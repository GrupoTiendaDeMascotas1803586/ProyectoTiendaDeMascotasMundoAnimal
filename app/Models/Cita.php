<?php

namespace App\Models;

use Cassandra\Time;

require('BasicModel.php');

class Cita extends BasicModel{

    private $id;
    private $horaInicio;
    private $fechaInicio;
    private $estado;

    public function __construct($Cita= array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Cita['id'] ?? null;
        $this->horaInicio = $Cita['horaInicio'] ?? null;
        $this->fechaInicio= $Cita['fechainicio'] ?? null;
        $this->estado = $Cita['estado'] ?? null;
    }
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed|null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getHoraInicio(): Time
    {
        return $this->horaInicio;
    }

    /**
     * @param mixed|null $horaInicio
     */
    public function setHoraInicio(string $horaInicio): void
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return mixed|null
     */
    public function getFechaInicio(): DataTime
    {
        return $this->FechaInicio;
    }

    /**
     * @param mixed|null $fechaInicio
     */
    public function setFechaInicio(string $fechaInicio): void
    {
        $this->fechaInicio = $fechaInicio;
    }
    /**
     * @return mixed|null
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param mixed|null $estado
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.cita VALUES (NULL, ?, ?, ?)", array(
                $this->horaInicio,
                $this->fechaInicio,
                $this->estado


            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.cita SET horaInicio = ?, fechaInicio = ?, estado = ? WHERE id = ?", array(
                $this->horaInicio,
                $this->fechaInicio,
                $this->estado,
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
        $arrCita = array();
        $tmp = new Cita();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Cita = new Cita();
            $Cita->id = $valor['id'];
            $Cita->horaInicio = $valor['horaInicio'];
            $Cita->fechaInicio = $valor['fechaInicio'];
            $Cita->estado = $valor['estado'];
            $Cita->Disconnect();
            array_push($arrCita, $Cita);
        }
        $tmp->Disconnect();
        return $arrCita;
    }

    public static function searchForId($id) : Cita
    {
        $Cita = null;
        if ($id > 0){
            $Cita = new Cita();
            $getrow = $Cita->getRow("SELECT * FROM proyecto.cita WHERE id =?", array($id));
            $Cita->id = $getrow['id'];
            $Cita->horaInicio = $getrow['horaInicio'];
            $Cita->fechaInicio = $getrow['fechaInicio'];
            $Cita->estado = $getrow['estado'];
        }
        $Cita->Disconnect();
        return $Cita;
    }

    public static function getAll() : array
    {
        return Cita::search("SELECT * FROM proyecto.cita");
    }

    public static function CitaRegistrada ($horaInicio) : bool
    {
        $result = Cita::search("SELECT id FROM proyecto.cita where horaInicio = '".$horaInicio ."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }

    }
}