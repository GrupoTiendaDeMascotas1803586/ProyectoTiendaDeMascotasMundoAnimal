<?php

namespace App\Models;

abstract class BasicModel {

    public $isConnected;
    protected $datab;
    private $username = "documento";
    private $password = "contraseña";
    private $host = "localhost";
    private $driver = "mysql";
    private $dbname = "MERproyectoTMMA";

    abstract protected static function search($query);
    abstract protected static function getAll();
    abstract protected static function searchForId($id);
    abstract protected function create();
    abstract protected function update();
    abstract protected function deleted($id);

    public function __construct(){
        $this->isConnected = true;
        try {
            $this->datab = new \PDO(
                ($this->driver != "sqlsrv") ?
                    "$this->driver:host={$this->host};dbname={$this->dbname};charset=utf8" :
                    "$this->driver:Server=$this->host;database=$this->dbname",
                $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $this->datab->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->datab->setAttribute(\PDO::ATTR_PERSISTENT, true);
        }catch(\PDOException $e) {
            $this->isConnected = false;
            throw new \Exception($e->getMessage());
        }
    }

    public function Disconnect(){
        $this->datab = null;
        $this->isConnected = false;
    }

    public function getRow($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getRows($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function getLastId(){
        try{
            return $this->datab->lastInsertId();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function insertRow($query, $params){
        try{
            if (is_null($this->datab)){
                $this->__construct();
            }
            $stmt = $this->datab->prepare($query);
            return $stmt->execute($params);
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function updateRow($query, $params){
        return $this->insertRow($query, $params);
    }

    public function deleteRow($query, $params){
        return $this->insertRow($query, $params);
    }
}
