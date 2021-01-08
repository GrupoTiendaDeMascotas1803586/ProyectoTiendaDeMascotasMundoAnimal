<?php

namespace App\Models;

require('BasicModel.php');

class Servicio extends BasicModel{

    private $id;
    private $Nombre;
    private $Costo;
    private $Estado;
    private $TipoServicio;

    public function __construct($Servicio= array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Servicio['id'] ?? null;
        $this->Nombre = $Servicio['Nombre'] ?? null;
        $this->Costo= $Servicio['Costo'] ?? null;
        $this->Estado = $Servicio['Estado'] ?? null;
        $this->TipoServicio = $Servicio['TipoServicio'] ?? null;
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
    public function getNombre(): string
    {
        return $this->Nombre;
    }

    /**
     * @param mixed|null $Nombre
     */
    public function setNombre(string $Nombre): void
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed|null
     */
    public function getCosto(): string
    {
        return $this->Costo;
    }

    /**
     * @param mixed|null $Costo
     */
    public function setCosto(string $Costo): void
    {
        $this->Costo = $Costo;
    }
    /**
     * @return mixed|null
     */
    public function getEstado(): string
    {
        return $this->Estado;
    }

    /**
     * @param mixed|null $Estado
     */
    public function setEstado(string $Estado): void
    {
        $this->Estado = $Estado;
    }
    /**
     * @return mixed|null
     */
    public function getTipoServicio(): string
    {
        return $this->TipoServicio;
    }

    /**
     * @param mixed|null $TipoServicio
     */
    public function setTipoServicio(string $TipoServicio): void
    {
        $this->TipoServicio = $TipoServicio;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.servicio VALUES (NULL, ?, ?, ?, ?, ?)", array(
                $this->Nombre,
                $this->Costo,
                $this->Estado,
                $this->TipoServicio

            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.servicio SET Nombre = ?, Costo = ?, Estado = ?, TipoServicio = ? WHERE id = ?", array(
                $this->Nombre,
                $this->Costo,
                $this->Estado,
                $this->TipoServicio,
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
        $arrServicio = array();
        $tmp = new Servicio();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Servicio = new Servicio();
            $Servicio->id = $valor['id'];
            $Servicio->Nombre = $valor['Nombre'];
            $Servicio->Costo = $valor['Costo'];
            $Servicio->Estado = $valor['Estado'];
            $Servicio->TipoServicio = $valor['TipoServicio'];
            $Servicio->Disconnect();
            array_push($arrServicio, $Servicio);
        }
        $tmp->Disconnect();
        return $arrServicio;
    }

    public static function searchForId($id) : Servicio
    {
        $Servicio = null;
        if ($id > 0){
            $Servicio = new Servicio();
            $getrow = $Servicio->getRow("SELECT * FROM proyecto.servicio WHERE id =?", array($id));
            $Servicio->id = $getrow['id'];
            $Servicio->Nombre = $getrow['Nombre'];
            $Servicio->Costo = $getrow['Costo'];
            $Servicio->Estado = $getrow['Estado'];
            $Servicio->TipoServicio = $getrow['TipoServicio'];
        }
        $Servicio->Disconnect();
        return $Servicio;
    }

    public static function getAll() : array
    {
        return Servicio::search("SELECT * FROM proyecto.servicio");
    }

        public static function ServicioRegistrado ($id) : bool
    {
        $result = Servicio::search("SELECT id FROM proyecto.servicio where id = ".$id);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }

    }
}