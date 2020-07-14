<?php


namespace App\Models;
require('BasicModel.php');

class Persona
{
private $id;
private $tipoDocumento;
private $documento;
private $nombre;
private $apellido;
private $telefono;
private $telefonoOpcional;
private $direccion;
private $contraseña;
private $TIPOPERSONA;
private $estado;

    public function __construct($Persona = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        $this->id = $Persona['id'] ?? null;
        $this->tipoDocumento = $Persona['tipoDocumento'] ?? null;
        $this->documento = $Persona['documento'] ?? null;
        $this->nombre = $Persona['nombre'] ?? null;
        $this->apellido= $Persona['apellido'] ?? null;
        $this->telefono = $Persona['telefono'] ?? null;
        $this->telefonoOpcional = $Persona['telefonoOpcional'] ?? null;
        $this->direccion = $Persona['direccion'] ?? null;
        $this->contraseña = $Persona['contraseña'] ?? null;
        $this->TIPOPERSONA = $Persona['TIPOPERSONA'] ?? null;
        $this->estado = $Persona['estado'] ?? null;
    }
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
    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    /**
     * @param mixed|null $tipoDocumento
     */
    public function setTipoDocumento(?mixed $tipoDocumento): void
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return mixed|null
     */
    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    /**
     * @param mixed|null $documento
     */
    public function setDocumento(?mixed $documento): void
    {
        $this->documento = $documento;
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
    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    /**
     * @param mixed|null $apellido
     */
    public function setApellido(?mixed $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed|null
     */
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    /**
     * @param mixed|null $telefono
     */
    public function setTelefono(?mixed $telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed|null
     */
    public function getTelefonoOpcional(): ?string
    {
        return $this->telefonoOpcional;
    }

    /**
     * @param mixed|null $telefonoOpcional
     */
    public function setTelefonoOpcional(?mixed $telefonoOpcional): void
    {
        $this->telefonoOpcional = $telefonoOpcional;
    }

    /**
     * @return mixed|null
     */
    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    /**
     * @param mixed|null $direccion
     */
    public function setDireccion(?mixed $direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed|null
     */
    public function getContraseña(): ?string
    {
        return $this->contraseña;
    }

    /**
     * @param mixed|null $contraseña
     */
    public function setContraseña(?mixed $contraseña): void
    {
        $this->contraseña = $contraseña;
    }

    /**
     * @return mixed|null
     */
    public function getTIPOPERSONA(): ?string
    {
        return $this->TIPOPERSONA;
    }

    /**
     * @param mixed|null $TIPOPERSONA
     */
    public function setTIPOPERSONA(?mixed $TIPOPERSONA): void
    {
        $this->TIPOPERSONA = $TIPOPERSONA;
    }

    /**
     * @return mixed|null
     */
    public function getEstado(): ?string
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
        $result = $this->insertRow("INSERT INTO proyecto.Persona VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->documento,
                $this->tipoDocumento,
                $this->nombre,
                $this->apellido,
                $this->telefono,
                $this->telefonoOpcional,
                $this->direccion,
                $this->contraseña,
                $this->TIPOPERSONA,
                $this->estado,


            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.Persona SET documento = ?, tipoDocumento = ?, nombre = ?, apellido = ?, telefono = ?, telefonoOpcinal = ?, direccion = ?, contraseña = ?, TIPOPERSONA = ?, estado = ? WHERE id = ?", array(
                $this->documento,
                $this->tipoDocumento,
                $this->nombre,
                $this->apellido,
                $this->telefono,
                $this->telefonoOpcional,
                $this->direccion,
                $this->contraseña,
                $this->TIPOPERSONA,
                $this->estado,
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
        $arrPersona = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $arrPersona = new Persona();
            $arrPersona->id = $valor['id'];
            $arrPersona->documento = $valor['documento'];
            $arrPersona->tipoDocumento = $valor['tipoDocumento'];
            $arrPersona->nombre = $valor['nombre'];
            $arrPersona->apellido = $valor['apellido'];
            $arrPersona->telefono = $valor['telefono'];
            $arrPersona->telefonoOpcional = $valor['telefonoOpcional'];
            $arrPersona->direccion = $valor['direccion'];
            $arrPersona->contraseña = $valor['contraseña'];
            $arrPersona->TIPOPERSONA = $valor['TIPOPERSONA'];
            $arrPersona->estado = $valor['estado'];

            $arrPersona->Disconnect();
            array_push($arrPersona, $Persona);
        }
        $tmp->Disconnect();
        return $arrPersona;
    }

    public static function searchForId($id) : Persona
    {
        $Persona = null;
        if ($id > 0){
            $Persona = new Persona();
            $getrow = $Persona->getRow("SELECT * FROM proyecto.persona WHERE id =?", array($id));
            $Persona->id = $getrow['id'];
            $Persona->tipoDocumento = $getrow['tipoDocumento'];
            $Persona->documento = $getrow['documento'];
            $Persona->nombre = $getrow['nombre'];
            $Persona->apellido = $getrow['apellido'];
            $Persona->telefono = $getrow['telefono'];
            $Persona->telefonoOpcional = $getrow['telefonoOpcional'];
            $Persona->direccion = $getrow['direccion'];
            $Persona->contraseña = $getrow['contraseña'];
            $Persona->TIPOPERSONA = $getrow['TIPOPERSONA'];
            $Persona->estado = $getrow['estado'];
        }
        $Persona->Disconnect();
        return $Persona;
    }

    public static function getAll() : array
    {
        return Persona::search("SELECT * FROM proyecto.persona");
    }

    public static function PersonaRegistrada ($id) : bool
    {
        $result = Persona::search("SELECT id FROM proyecto.persona where id = ".$id);
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }

}