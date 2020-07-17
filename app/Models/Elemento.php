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
    private $estado;


    public function __construct($Elemento = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Elemento['id'] ?? null;
        $this->nombre = $Elemento['nombre'] ?? null;
        $this->tipoElemento = $Elemento['tipoElemento'] ?? null;
        $this->tamaño = $Elemento['tamaño'] ?? null;
        $this->material = $Elemento['material'] ?? null;
        $this->color = $Elemento['color'] ?? null;
        $this->marca = $Elemento['marca'] ?? null;
        $this->estado = $Elemento['estado'] ?? null;
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
    public function setEstado(?mixed $estado): void
    {
        $this->estado = $estado;
    }



    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.elemento VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nombre,
                $this->tipoElemento,
                $this->tamaño,
                $this->material,
                $this->color,
                $this->marca,
                $this->estado
            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.elemento SET nombre = ?, tipoElemento = ? tamaño = ?, material = ?, color = ?, marca = ?, estado = ?, WHERE id = ?", array(
                $this->nombre,
                $this->tipoElemento,
                $this->tamaño,
                $this->material,
                $this->color,
                $this->marca,
                $this->estado

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
        $arrElemento = array();
        $tmp = new Elemento();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Elemento = new Elemento();
            $Elemento->id = $valor['id'];
            $Elemento->nombre = $valor['nombre'];
            $Elemento->tipoElemento = $valor['tipoElemento'];
            $Elemento->tamaño = $valor['tamaño'];
            $Elemento->material = $valor['material'];
            $Elemento->color = $valor['color'];
            $Elemento->marca = $valor['marca'];
            $Elemento->estado = $valor['estado'];
            $Elemento->Disconnect();
            array_push($arrElemento, $Elemento);
        }
        $tmp->Disconnect();
        return $arrElemento;
    }
    public static function searchForId($id) : Elemento
    {
        $Elemento = null;
        if ($id > 0){
            $Elemento= new Elemento();
            $getrow = $Elemento->getRow("SELECT * FROM proyecto.elemento WHERE id =?", array($id));
            $Elemento->id = $getrow['id'];
            $Elemento->nombre = $getrow['nombre'];
            $Elemento->tipoElemento = $getrow['tipoElemento'];
            $Elemento->tamaño = $getrow['tamaño'];
            $Elemento->material = $getrow['material'];
            $Elemento->color = $getrow['color'];
            $Elemento->marca = $getrow['marca'];
            $Elemento->estado = $getrow['estado'];

        }
        $Elemento->Disconnect();
        return $Elemento;
    }

    public static function getAll() : array
    {
        return Elemento::search("SELECT * FROM proyecto.elemento");
    }

    public static function ElementoRegistrado($nombre) : bool
    {
        $result = Elemento::search("SELECT nombre FROM proyecto.elemento where nombre = ' ".$nombre."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}