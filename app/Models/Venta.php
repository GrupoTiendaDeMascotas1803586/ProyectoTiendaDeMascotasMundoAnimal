<?php


namespace App\Models;

require('BasicModel.php');

class Venta extends BasicModel
{
    private $id;
    private $fecha;
    private $subtotal;
    private $totalApagar;

    public function __construct($Venta = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Venta['id'] ?? null;
        $this->fecha = $Venta['fecha'] ?? null;
        $this->subtotal = $Venta['subtotal'] ?? null;
        $this->totalApagar = $Venta['totalApagar'] ?? null;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed|null
     */
    public function getId(): ?Int
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
    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    /**
     * @param mixed|null $fecha
     */
    public function setFecha(?mixed $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed|null
     */
    public function getSubtotal(): ?Double
    {
        return $this->subtotal;
    }

    /**
     * @param mixed|null $subtotal
     */
    public function setSubtotal(?mixed $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed|null
     */
    public function getTotalApagar(): ?Double
    {
        return $this->totalApagar;
    }

    /**
     * @param mixed|null $totalApagar
     */
    public function setTotalApagar(?mixed $totalApagar): void
    {
        $this->totalApagar = $totalApagar;
    }


    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.venta VALUES (NULL, ?, ?, ?)", array(
                $this->fecha,
                $this->subtotal,
                $this->totalApagar

            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.venta SET fecha = ?, subtotal = ?, totalApagar = ? WHERE id = ?", array(
                $this->fecha,
                $this->subtotal,
                $this->totalApagar,
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
        $arrVenta = array();
        $tmp = new Venta();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Venta = new Venta();
            $Venta->id = $valor['id'];
            $Venta->fecha = $valor['fecha'];
            $Venta->subtotal = $valor['subtotal'];
            $Venta->totalApagar = $valor['totalApagar'];
            $Venta->Disconnect();
            array_push($arrVenta, $Venta);
        }
        $tmp->Disconnect();
        return $arrVenta;
    }
    public static function searchForId($id) : Venta
    {
        $Venta = null;
        if ($id > 0){
            $Venta= new Venta();
            $getrow = $Venta->getRow("SELECT * FROM proyecto.venta WHERE id =?", array($id));
            $Venta->id = $getrow['id'];
            $Venta->fecha = $getrow['fecha'];
            $Venta->subtotal = $getrow['subtotal'];
            $Venta->totalApagar = $getrow['totalApagar'];

        }
        $Venta->Disconnect();
        return $Venta;
    }

    public static function getAll() : array
    {
        return Venta::search("SELECT * FROM proyecto.venta");
    }

    public static function VentaRegistrado($fecha) : bool
    {
        $result = Venta::search("SELECT fecha FROM proyecto.venta where fecha = ' ".$fecha."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}