<?php

class Paciente{
    private $rut;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $faci;
    private $edad;
    private $sexo;
    private $email;
    private $afiliacion;
    private $ultimacita;
    private $proximacita;
    private $pacientes = array();
    private $foto;
    private $telefonos = array();
    private $estadoc;

    public function __construct(){
    }

    public function insert($rut, $nombre, $apaterno, $amaterno, $faci, $edad, $sexo, $afiliacion, $ultimacita, $telefonos, $estadoc){
        
        if($this->exist($rut)){
            return 'El paciente ya existe';
        }

        try{

            $sql = $this->db->prepare('INSERT INTO paciente(NOMBRE_PACIENTE, RUT_PACIENTE, APATERNO_PACIENTE, AMATERNO_PACIENTE, FACI_PACIENTE, EDAD_PACIENTE, SEXO_PACIENTE, AFILIACION_PACIENTE, ESTADOCIVIL_PACIENTE)

            VALUES (:rut, :nombre, :apaterno, :amaterno, :faci, :edad, :sexo, :afiliacion, :ultimacita, :estado)');
            $sql->bindParam(':rut', $rut);
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':apaterno', $apaterno);
            $sql->bindParam(':amaterno', $amaterno);
            $sql->bindParam(':faci', $faci);
            $sql->bindParam(':edad', $edad);
            $sql->bindParam(':sexo', $sexo);
            $sql->bindParam(':afiliacion', $afiliacion);
            $sql->bindParam(':ultimacita', $ultimacita);
            $sql->execute();
            if($sql->execute){
                $this->setPaciente($rut, $nombre, $apaterno, $amaterno, $faci, $edad, $sexo, $afiliacion, $ultimacita);
                return true;
            }else{
                return false;
            }            
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    private function setPaciente($rut, $nombre, $apaterno, $amaterno, $faci, $edad, $sexo, $afiliacion, $ultimacita){

        $this->setRut($rut);
        $this->setNombre($nombre);
        $this->setApaterno($apaterno);
        $this->setAmaterno($amaterno);
        $this->setFnaci($faci);
        $this->setEdad($edad);
        $this->setSexo($sexo); 
        $this->setAfiliacion($afiliacion);
        $this->setUltimacita($ultimacita);

    }

    public function exist($rut){
        if(empty($rut) || !isset($rut)){
            return 'Debes ingresar un rut';
        }

        try{
            $sql = $this->db->prepare('SELECT count(*) as EXIST FROM paciente WHERE rut_paciente = :rut');
            $sql->bindParam(':rut', $this->rut);
            $sql->execute();
            $data = $sql->fetch();
            if($data['EXIST']){
                return true;
            }else{
                return false;
            }

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function getPaciente($rut){
        try{
            $sql = $this->db->prepare('SELECT * FROM paciente WHERE rut_paciente = :rut');
            $sql->bindParam(':rut', $rut);
            $sql->execute();
            $paciente = $sql->fetch();
            return $paciente;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
//setter
    public function setPacientes($pacientes){
        $this->pacientes = $pacientes;
    }

    public function setRut($rut){
        $this->rut = $rut;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApaterno($apaterno){
        $this->apaterno = $apaterno;
    }

    public function setAmaterno($amaterno){
        $this->amaterno = $amaterno;
    }

    public function setFnaci($fnaci){
        $this->fnaci = $fnaci;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setAfiliacion($afiliacion){
        $this->afiliacion = $afiliacion;
    }

    public function setUltimacita($ultimacita){
        $this->ultimacita = $ultimacita;
    }

//getter
    public function getPacientes(){

        try{

            $sql = $this->db->prepare('SELECT * FROM paciente');
            $sql->execute();
            $data = $sql->fetchAll();
            return $data;
            
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function getRut(){
        return $this->rut;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApaterno(){
        return $this->apaterno;
    }

    public function getAmaterno(){
        return $this->amaterno;
    }

    public function getFnaci(){
        return $this->faci;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getAfiliacion(){
        return $this->afiliacion;
    }

    public function getUltimacita(){
        return $this->ultimacita;
    }
//destructor
    public function __destruct(){
        $this;
    }
}