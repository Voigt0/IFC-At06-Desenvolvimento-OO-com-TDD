<?php
  class Conexao {  
    //Atributos
    private static $pdo;
  
		private static $host = 'localhost';
    private static $dbname='docgo';
    private static $user='root';
    private static $password='';
		private static $driver = 'mysql';
		private static $charset = 'utf8';	
    // private $NOME_DO_PROJETO = 'Atividade 6';
		// private $DESCRICAO_DO_PROJETO = 'Um pequeno projeto para a disciplina de Programação';


    // Criação do Construct
    private function __construct() {  
    } 
  
    // Criação do Get Instance
    public static function getInstance() {  
      if (!isset(self::$pdo)) {  
        try {  
          $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
                          PDO::ATTR_PERSISTENT => TRUE,
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

          // self::$pdo = new PDO(DRIVER.
          //                      ":host=" . HOST . 
          //                      "; dbname=" . DBNAME . 
          //                      "; charset=" . CHARSET . 
          //                      ";", USER, PASSWORD, 
          //                      $opcoes);  

          self::$pdo = new PDO(self::$driver.
                               ":host=" . self::$host . 
                               "; dbname=" . self::$dbname . 
                               "; charset=" . self::$charset . 
                               ";", self::$user, self::$password, 
                               $opcoes);

        } catch (PDOException $e) {  
          print "Erro: " . $e->getMessage();  
        }  
      }  
      return self::$pdo;  
    }  
  }
?>