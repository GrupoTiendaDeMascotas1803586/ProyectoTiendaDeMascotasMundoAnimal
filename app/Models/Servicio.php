<?php

namespace App\Models;

require('BasicModel.php');

class Servicio extends BasicModel{

    private $id;
    private $nombre;
    private $costo;
    private $estado;
    private $tipoServicio;

    public function __construct($Servicio= array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Servicio['id'] ?? null;
        $this->nombre = $Servicio['nombre'] ?? null;
        $this->costo= $Servicio['costo'] ?? null;
        $this->estado = $Servicio['estado'] ?? null;
        $this->tipoServicio = $Servicio['tipoServicio'] ?? null;
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
        return $this->nombre;
    }

    /**
     * @param mixed|null $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|null
     */
    public function getCosto(): string
    {
        return $this->costo;
    }

    /**
     * @param mixed|null $costo
     */
    public function setCosto(string $costo): void
    {
        $this->costo = $costo;
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
    /**
     * @return mixed|null
     */
    public function getTipoServicio(): string
    {
        return $this->tipoServicio;
    }

    /**
     * @param mixed|null $tipoServicio
     */
    public function setTipoServicio(string $tipoServicio): void
    {
        $this->tipoServicio = $tipoServicio;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.servicio VALUES (NULL, ?, ?, ?, ?)", array(
                $this->nombre,
                $this->costo,
                $this->estado,
                $this->tipoServicio

            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.servicio SET nombre = ?, costo = ?, estado = ?, tipoServicio = ? WHERE id = ?", array(
                $this->nombre,
                $this->costo,
                $this->estado,
                $this->tipoServicio,
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
            $Servicio->nombre = $valor['nombre'];
            $Servicio->costo = $valor['costo'];
            $Servicio->estado = $valor['estado'];
            $Servicio->tipoServicio = $valor['tipoServicio'];
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
            $Servicio->nombre = $getrow['nombre'];
            $Servicio->costo = $getrow['costo'];
            $Servicio->estado = $getrow['estado'];
            $Servicio->tipoServicio = $getrow['tipoServicio'];
        }
        $Servicio->Disconnect();
        return $Servicio;
    }

    public static function getAll() : array
    {
        return Servicio::search("SELECT * FROM proyecto.servicio");
    }

        public static function ServicioRegistrado ($nombre) : bool
    {
        $result = Servicio::search("SELECT id FROM proyecto.servicio where nombre = '".$nombre ."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }

    }
}