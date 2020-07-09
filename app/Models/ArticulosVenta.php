<?php


namespace App\Models;


class ArticulosVenta
{
    private $Id;
    private $cantidad;

    /**
     * Usuarios constructor.
     * @param $Id
     * @param $cantidad


     */
    public function __construct($Id = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->Id = $Id['Id'] ?? null;
        $this->cantidad = $Id['cantidad'] ?? null;
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
    public function getcantidad() : string
    {
        return $this->cantidad;
    }

    /**
     * @param string $cantidad
     */
    public function setcantidad(string $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO ProyectoTiendaDeMascotasMundoAnimal VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->cantidad,

            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE ProyectoTiendaDeMascotasMundoAnimal.Id SET cantidad = ?, WHERE Id = ?", array(
                $this->cantidad,

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
            $Id->cantidad = $valor['cantidad'];

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
            $Id->cantidad = $getrow['cantidad'];
        }
        $Id->Disconnect();
        return $Id;
    }

    public static function getAll() : array
    {
        return Id::search("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.Id");
    }

    public static function IdRegistrado($cantidad) : bool
    {
        $result = Id::search("SELECT id FROM ProyectoTiendaDeMascotasMundoAnimal.Id where cantidad = ".$cantidad);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}