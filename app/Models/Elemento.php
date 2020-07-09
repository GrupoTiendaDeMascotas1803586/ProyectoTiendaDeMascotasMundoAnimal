<?php


namespace App\Models;


class Elemento
{
    private $Id;
    private $nombre;
    private $tipoElemento;
    private $tamaño;
    private $material;
    private $color;
    private $marca;

    /**
     * Usuarios constructor.
     * @param $Id
     * @param $nombre
     * @param $tipoElemento
     * @param $tamaño
     * @param $material
     * @param $color
     * @param $marca

     */
    public function __construct($Id = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->Id = $Id['Id'] ?? null;
        $this->nombre = $Id['nombre'] ?? null;
        $this->tipoElemento = $Id['tipoElemento'] ?? null;
        $this->tamaño = $Id['tamaño'] ?? null;
        $this->material = $Id['material'] ?? null;
        $this->color = $Id['color'] ?? null;
        $this->marca = $Id['marca'] ?? null;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     */
    public function setId(int $Id): void
    {
        $this->Id = $Id;
    }

    /**
     * @return string
     */
    public function getnombre() : string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setnombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function gettipoElemento() : string
    {
        return $this->tipoElemento;
    }

    /**
     * @param string $tipoElemento
     */
    public function settipoElemento(string $tipoElemento): void
    {
        $this->tipoElemento = $tipoElemento;
    }

    /**
     * @return string
     */
    public function gettamaño() : string
    {
        return $this->tamaño;
    }

    /**
     * @param string $tamaño
     */
    public function settamaño(string $tamaño): void
    {
        $this->tamaño = $tamaño;
    }


    /**
     * @return string
     */
    public function getmaterial() : string
    {
        return $this->material;
    }

    /**
     * @param string $material
     */
    public function setmaterial(string $material): void
    {
        $this->material = $material;
    }

    /**
     * @return string
     */
    public function getcolor() : string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setcolor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getmarca() : string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setmarca(string $marca): void
    {
        $this->marca = $marca;
    }


    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO ProyectoTiendaDeMascotasMundoAnimal VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nombre,
                $this->tipoElemento,
                $this->tamaño,
                $this->material,
                $this->color,
                $this->marca
            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE ProyectoTiendaDeMascotasMundoAnimal.Id SET nombre = ?, tipoElemento = ? tamaño = ?, material = ?, color = ?, marca = ?, WHERE Id = ?", array(
                $this->nombre,
                $this->tipoElemento,
                $this->tamaño,
                $this->material,
                $this->color,
                $this->marca
            )
        );
        $this->Disconnect();
        return $result;
    }
    public function deleted($Id) : void
    {
        // TODO: Implement deleted() method.
    }
    public static function search($query) : array
    {
        $arrId = array();
        $tmp = new Id();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Id = new Id();
            $Id->Id = $valor['Id'];
            $Id->nombre = $valor['nombre'];
            $Id->tipoElemento = $valor['tipoElemento'];
            $Id->tamaño = $valor['tamaño'];
            $Id->material = $valor['material'];
            $Id->color = $valor['color'];
            $Id->marca = $valor['marca'];
            $Id->Disconnect();
            array_push($arrId, $Id);
        }
        $tmp->Disconnect();
        return $arrId;
    }
    public static function searchForId($Id) : Id
    {
        $Id = null;
        if ($Id > 0){
            $Id= new Id();
            $getrow = $Id->getRow("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.Id WHERE Id =?", array($Id));
            $Id->Id = $getrow['Id'];
            $Id->nombre = $getrow['nombre'];
            $Id->tipoElemento = $getrow['tipoElemento'];
            $Id->tamaño = $getrow['tamaño'];
            $Id->material = $getrow['material'];
            $Id->color = $getrow['color'];
            $Id->marca = $getrow['marca'];

        }
        $Id->Disconnect();
        return $Id;
    }

    public static function getAll() : array
    {
        return Id::search("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.Id");
    }

    public static function IdRegistrado($nombre) : bool
    {
        $result = Id::search("SELECT id FROM ProyectoTiendaDeMascotasMundoAnimal.Id where nombre = ".$nombre);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}