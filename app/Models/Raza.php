<?php


namespace App\Models;

require('BasicModel.php');

class Raza extends BasicModel
{
    private $id;
    private $nombre;
    private $especie;
    private $estado;

    public function __construct($Raza = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Raza['id'] ?? null;
        $this->nombre = $Raza['nombre'] ?? null;
        $this->especie= $Raza['especie'] ?? null;
        $this->estado = $Raza['estado'] ?? null;
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
    public function getEspecie(): string
    {
        return $this->especie;
    }

    /**
     * @param mixed|null $especie
     */
    public function setEspecie(string $especie): void
    {
        $this->especie = $especie;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.Raza VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nombre,
                $this->especie,
                $this->estado
            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.Raza SET nombre = ?, especie = ?, estado = ? WHERE id = ?", array(
                $this->nombre,
                $this->especie,
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
        $arrRaza = array();
        $tmp = new Raza();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Raza = new Raza();
            $Raza->id = $valor['id'];
            $Raza->nombre = $valor['nombre'];
            $Raza->especie = $valor['especie'];
            $Raza->estado = $valor['estado'];
            $Raza->Disconnect();
            array_push($arrRaza, $Raza);
        }
        $tmp->Disconnect();
        return $arrRaza;
    }

    public static function searchForId($id) : Raza
    {
        $Raza = null;
        if ($id > 0){
            $Raza = new Raza();
            $getrow = $Raza->getRow("SELECT * FROM proyecto.Raza WHERE id =?", array($id));
            $Raza->id = $getrow['id'];
            $Raza->nombre = $getrow['nombre'];
            $Raza->especie = $getrow['especie'];
            $Raza->estado = $getrow['estado'];
        }
        $Raza->Disconnect();
        return $Raza;
    }

    public static function getAll() : array
    {
        return Raza::search("SELECT * FROM proyecto.Raza");
    }

    public static function RazaRegistrada ($id) : bool
    {
        $result = Raza::search("SELECT id FROM proyecto.Raza where id = ".$id);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}