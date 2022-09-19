<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    abstract class DBDefault{
        
        public function __construct() {
        }

        //Método toString
        public function __toString() {
        }

        public abstract function create();
        public abstract function read();
        public abstract function update();
        public abstract function delete();
        public abstract function delete();
        public abstract static function listar($buscar = 0, $procurar = "");
    }
?>