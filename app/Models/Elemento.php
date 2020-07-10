<?php


namespace App\Models;

require('BasicModel.php');

class Elemento extends BasicModel
{
    private $id;
    private $nombre;
    private $tipoElemento;
    private $tamaño;
    private $material;
    private $color;
    private $marca;

    /**
     * Usuarios constructor.
     * @param $id
     * @param $nombre
     * @param $tipoElemento
     * @param $tamaño
     * @param $material
     * @param $color
     * @param $marca

     */
    public function __construct($id = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $id['id'] ?? null;
        $this->nombre = $id['nombre'] ?? null;
        $this->tipoElemento = $id['tipoElemento'] ?? null;
        $this->tamaño = $id['tamaño'] ?? null;
        $this->material = $id['material'] ?? null;
        $this->color = $id['color'] ?? null;
        $this->marca = $id['marca'] ?? null;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId(?mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param mixed|null $nombre
     */
    public function setNombre(?mixed $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|null
     */
    public function getTipoElemento(): ?string
    {
        return $this->tipoElemento;
    }

    /**
     * @param mixed|null $tipoElemento
     */
    public function setTipoElemento(?mixed $tipoElemento): void
    {
        $this->tipoElemento = $tipoElemento;
    }

    /**
     * @return mixed|null
     */
    public function getTamaño(): ?double
    {
        return $this->tamaño;
    }

    /**
     * @param mixed|null $tamaño
     */
    public function setTamaño(?mixed $tamaño): void
    {
        $this->tamaño = $tamaño;
    }

    /**
     * @return mixed|null
     */
    public function getMaterial(): ?string
    {
        return $this->material;
    }

    /**
     * @param mixed|null $material
     */
    public function setMaterial(?mixed $material): void
    {
        $this->material = $material;
    }

    /**
     * @return mixed|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param mixed|null $color
     */
    public function setColor(?mixed $color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed|null
     */
    public function getMarca(): ?string
    {
        return $this->marca;
    }

    /**
     * @param mixed|null $marca
     */
    public function setMarca(?mixed $marca): void
    {
        $this->marca = $marca;
    }



    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
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
        $result = $this->updateRow("UPDATE proyecto.elemento SET nombre = ?, tipoElemento = ? tamaño = ?, material = ?, color = ?, marca = ?, WHERE id = ?", array(
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
    public function deleted($id) : void
    {
        // TODO: Implement deleted() method.
    }
    public static function search($query) : array
    {
        $arrid = array();
        $tmp = new Elemento();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $id = new id();
            $id->id = $valor['id'];
            $id->nombre = $valor['nombre'];
            $id->tipoElemento = $valor['tipoElemento'];
            $id->tamaño = $valor['tamaño'];
            $id->material = $valor['material'];
            $id->color = $valor['color'];
            $id->marca = $valor['marca'];
            $id->Disconnect();
            array_push($arrid, $id);
        }
        $tmp->Disconnect();
        return $arrid;
    }
    public static function searchForId($id) : id
    {
        $id = null;
        if ($id > 0){
            $id= new Id();
            $getrow = $id->getRow("SELECT * FROM proyecto.elemento WHERE id =?", array($id));
            $id->id = $getrow['id'];
            $id->nombre = $getrow['nombre'];
            $id->tipoElemento = $getrow['tipoElemento'];
            $id->tamaño = $getrow['tamaño'];
            $id->material = $getrow['material'];
            $id->color = $getrow['color'];
            $id->marca = $getrow['marca'];

        }
        $id->Disconnect();
        return $id;
    }

    public static function getAll() : array
    {
        return Elemento::search("SELECT * FROM proyecto.elemento");
    }

    public static function idRegistrado($nombre) : bool
    {
        $result = Elemento::search("SELECT id FROM proyecto.elemento where nombre = ".$nombre);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}