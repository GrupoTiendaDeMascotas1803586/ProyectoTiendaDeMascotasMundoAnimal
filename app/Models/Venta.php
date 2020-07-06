<?php


namespace App\Models;


class Venta
{
    private $Id;
    private $fecha;
    private $subTotal;
    private $totalaPagar;


    /**
     * Usuarios constructor.
     * @param $Id
     * @param $fecha
     * @param $subTotal
     * @param $totalaPagar

     */
    public function __construct($Id = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->Id = $Id['Id'] ?? null;
        $this->fecha = $Id['fecha'] ?? null;
        $this->subTotal = $Id['subTotal'] ?? null;
        $this->totalaPagar = $Id['totalaPagar'] ?? null;
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
    public function getfecha() : string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setfecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getsubTotal() : string
    {
        return $this->subTotal;
    }

    /**
     * @param string $subTotal
     */
    public function setsubTotal(string $subTotal): void
    {
        $this->subTotal = $subTotal;
    }

    /**
     * @return string
     */
    public function gettotalaPagar() : string
    {
        return $this->totalaPagar;
    }

    /**
     * @param string $totalaPagar
     */
    public function settotalaPagar(string $totalaPagar): void
    {
        $this->totalaPagar = $totalaPagar;
    }


    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO ProyectoTiendaDeMascotasMundoAnimal VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->fecha,
                $this->subTotal,
                $this->totalaPagar,

            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE ProyectoTiendaDeMascotasMundoAnimal.Id SET fecha = ?, subTotal = ? totalaPagar = ?, WHERE Id = ?", array(
                $this->fecha,
                $this->subTotal,
                $this->totalaPagar,
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
            $Id->fecha = $valor['fecha'];
            $Id->subTotal = $valor['subTotal'];
            $Id->totalaPagar = $valor['totalaPagar'];

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
            $Id->fecha = $getrow['fecha'];
            $Id->subTotal = $getrow['subTotal'];
            $Id->totalaPagar = $getrow['totalaPagar'];
        }
        $Id->Disconnect();
        return $Id;
    }

    public static function getAll() : array
    {
        return Id::search("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.Id");
    }

    public static function IdRegistrado($fecha) : bool
    {
        $result = Id::search("SELECT id FROM ProyectoTiendaDeMascotasMundoAnimal.Id where fecha = ".$fecha);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}