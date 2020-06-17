<?php


namespace App\Models;


class ELEMENTO
{
    private $idELEMENTO;
    private $nomELEMENTO;
    private $tipoELEMENTO;
    private $tamaño;
    private $material;


    /**
     * Usuarios constructor.
     * @param $idELEMENTO
     * @param $nomELEMENTO
     * @param $tipoELEMENTO
     * @param $tamaño
     * @param $material

     */
    public function __construct($idELEMENTO = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->idELEMENTO = $idELEMENTO['idELEMENTO'] ?? null;
        $this->nomELEMENTO = $idELEMENTO['nomELEMENTO'] ?? null;
        $this->tipoELEMENTO = $idELEMENTO['tipoELEMENTO'] ?? null;
        $this->tamaño = $idELEMENTO['tamaño'] ?? null;
        $this->material = $idELEMENTO['material'] ?? null;
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return int
     */
    public function getidELEMNETO() : int
    {
        return $this->idELEMENTO;
    }

    /**
     * @param int $idELEMNTO
     */
    public function setidELEMENTO(int $idELEMENTO): void
    {
        $this->idELEMENTO = $idELEMENTO;
    }

    /**
     * @return string
     */
    public function getnomELEMENTO() : string
    {
        return $this->nomELEMENTO;
    }

    /**
     * @param string $nomELEMENTO
     */
    public function setnomELEMENTO(string $nomELEMENTO): void
    {
        $this->nomELEMENTO = $nomELEMENTO;
    }

    /**
     * @return string
     */
    public function gettipoELEMENTO() : string
    {
        return $this->tipoELEMENTO;
    }

    /**
     * @param string $tipoELEMENTO
     */
    public function settipoELEMENTO(string $tipoELEMENTO): void
    {
        $this->tipoELEMENTO = $tipoELEMENTO;
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


    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO ProyectoTiendaDeMascotasMundoAnimal VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->nomELEMENTO,
                $this->tipoELEMENTO,
                $this->tamaño,
                $this->material


            )
        );
        $this->Disconnect();
        return $result;
    }
    public function update() : bool
    {
        $result = $this->updateRow("UPDATE ProyectoTiendaDeMascotasMundoAnimal.idELEMENTO SET nomELEMENTO = ?, tipoELEMENTO = ? tamaño = ?, material = ?, WHERE idELEMENTO = ?", array(
                $this->nomELEMENTO,
                $this->tipoELEMENTO,
                $this->tamaño,
                $this->material
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
        $arridELEMENTO = array();
        $tmp = new idELEMENTO();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $idELEMENTO = new idELEMENTO();
            $idELEMENTO->idELEMENTO = $valor['idELEMENTO'];
            $idELEMENTO->nomELEMENTO = $valor['nomELEMENTO'];
            $idELEMENTO->tipoELEMENTO = $valor['tipoELEMENTO'];
            $idELEMENTO->tamaño = $valor['tamaño'];
            $idELEMENTO->material = $valor['material'];
            $idELEMENTO->Disconnect();
            array_push($arridELEMENTO, $idELEMENTO);
        }
        $tmp->Disconnect();
        return $arridELEMENTO;
    }
    public static function searchForidELEMENTO($idELEMENTO) : idELEMENTO
    {
        $idELEMENTO = null;
        if ($idELEMENTO > 0){
            $idELEMENTO= new idELEMENTO();
            $getrow = $idELEMENTO->getRow("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.idELEMENTO WHERE idELEMENTO =?", array($idELEMENTO));
            $idELEMENTO->idELEMENTO = $getrow['idELEMENTO'];
            $idELEMENTO->nombre = $getrow['nomELEMENTO'];
            $idELEMENTO->tipoELEMENTO = $getrow['tipoELEMENTO'];
            $idELEMENTO->tamaño = $getrow['tamaño'];
            $idELEMENTO->material = $getrow['material'];

        }
        $idELEMENTO->Disconnect();
        return $idELEMENTO;
    }

    public static function getAll() : array
    {
        return idELEMENTO::search("SELECT * FROM ProyectoTiendaDeMascotasMundoAnimal.idELEMENTO");
    }

    public static function idELEMENTORegistrado($nomELEMENTO) : bool
    {
        $result = idELEMENTO::search("SELECT id FROM ProyectoTiendaDeMascotasMundoAnimal.idELEMENTO where nomELEMENTO = ".$nomELEMENTO);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}