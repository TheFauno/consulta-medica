<?php

class Auth{
    private $usuario;
    private $password;

//getters
    function getUsuario(){
        return $this->usuario;
    }

    function getPassword(){
        return $this->password;
    }
//setters
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    function setPassword($password){
        $this->password = $password;
    }

//Funciones
    function auth($usuario, $password){
        try{
            $sql = $this->db->prepare('SELECT * FROM usuario WHERE ID = :usuario AND PASSWORD = :password');
            $sql->bindParam();
            $sql->bindParam();
            $sql->execute();
            $res = $sql->fetch();

            if(isset($res) && !empty($res)){
                return $res;
            }else{
                return 'USUARIO NO ENCONTRADO';
            }
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}