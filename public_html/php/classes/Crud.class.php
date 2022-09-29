<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    abstract class Crud{
        
        // Criação do Construct
        public function __construct() {
        }

        //Método toString
        public function __toString() {
            
        }

        // Funções abstratas relacionadas ao CRUD;
        public abstract function create();
        public static abstract function consultar($busca = 0, $pesquisa = "");
        public abstract function update();
        public abstract function delete();
    }
?>