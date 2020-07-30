<?php

namespace App\Models;
require('BasicModel.php');

class Persona extends BasicModel
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
private $tipoPersona;
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
        $this->tipoPersona = $Persona['tipoPersona'] ?? null;
        $this->estado = $Persona['estado'] ?? null;
    }
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    /**
     * @param string $tipoDocumento
     */
    public function setTipoDocumento(?string $tipoDocumento): void
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return int
     */
    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    /**
     * @param int $documento
     */
    public function setDocumento(?int $documento): void
    {
        $this->documento = $documento;
    }

    /**
     * @return string
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido(?string $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return int
     */
    public function getTelefono(): ? int
    {
        return $this->telefono;
    }

    /**
     * @param int $telefono
     */
    public function setTelefono(?int $telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return int
     */
    public function getTelefonoOpcional(): ?int
    {
        return $this->telefonoOpcional;
    }

    /**
     * @param int $telefonoOpcional
     */
    public function setTelefonoOpcional(?int $telefonoOpcional): void
    {
        $this->telefonoOpcional = $telefonoOpcional;
    }

    /**
     * @return string
     */
    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     */
    public function setDireccion(?string $direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return string
     */
    public function getContraseña(): ?string
    {
        return $this->contraseña;
    }

    /**
     * @param string $contraseña
     */
    public function setContraseña(?string $contraseña): void
    {
        $this->contraseña = $contraseña;
    }

    /**
     * @return string
     */
    public function gettipoPersona(): ?string
    {
        return $this->tipoPersona;
    }

    /**
     * @param string $tipoPersona
     */
    public function settipoPersona(?string $tipoPersona): void
    {
        $this->tipoPersona = $tipoPersona;
    }

    /**
     * @return string
     */
    public function getEstado(): ?string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(?string $estado): void
    {
        $this->estado = $estado;
    }
    public function create() : bool
    {
        $result = $this->insertRow("INSERT INTO proyecto.persona VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->tipoDocumento,
                $this->documento,
                $this->nombre,
                $this->apellido,
                $this->telefono,
                $this->telefonoOpcional,
                $this->direccion,
                $this->contraseña,
                $this->tipoPersona,
                $this->estado

            )
        );
        $this->Disconnect();
        return $result;
    }

    public function update() : bool
    {
        $result = $this->updateRow("UPDATE proyecto.persona SET tipoDocumento = ?,documento = ?, nombre = ?, apellido = ?, telefono = ?, telefonoOpcional = ?, direccion = ?, contraseña = ?, tipoPersona = ?, estado = ? WHERE id = ?", array(

                $this->tipoDocumento,
                $this->documento,
                $this->nombre,
                $this->apellido,
                $this->telefono,
                $this->telefonoOpcional,
                $this->direccion,
                $this->contraseña,
                $this->tipoPersona,
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
        $arrPersona = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Persona = new Persona();
            $Persona->id = $valor['id'];
            $Persona->tipoDocumento = $valor['tipoDocumento'];
            $Persona->documento = $valor['documento'];
            $Persona->nombre = $valor['nombre'];
            $Persona->apellido = $valor['apellido'];
            $Persona->telefono = $valor['telefono'];
            $Persona->telefonoOpcional = $valor['telefonoOpcional'];
            $Persona->direccion = $valor['direccion'];
            $Persona->contraseña = $valor['contraseña'];
            $Persona->tipoPersona = $valor['tipoPersona'];
            $Persona->estado = $valor['estado'];

            $Persona->Disconnect();
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
            $Persona->tipoPersona = $getrow['tipoPersona'];
            $Persona->estado = $getrow['estado'];
        }
        $Persona->Disconnect();
        return $Persona;
    }

    public static function getAll() : array
    {
        return Persona::search("SELECT * FROM proyecto.persona");
    }

    public static function PersonaRegistrada ($documento) : bool
    {
        $result = Persona::search("SELECT documento FROM proyecto.persona where documento = '".$documento."'");
        if (count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}