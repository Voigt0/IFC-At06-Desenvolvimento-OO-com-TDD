<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class MedicoLogin{
        //Atributos
        private $email;
        private $senha;        

        // Criação do Construct
        public function __construct($email, $senha){
            $this->setEmail($email);
            $this->setSenha($senha);
        }  
        

        //Métodos Getters e Setters
        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }


        public function setEmail($email){
            $this->email = $email;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Médico Login]<br>".
                    "<br>Email: ".$this->getEmail().
                    "<br>Senha: ".$this->getSenha();
            return $str;
        }


        //Métodos de autenticação do login
        public static function autenticar($email, $senha){
            $sql = "SELECT mediId FROM Medico WHERE mediEmail = :mediEmail AND mediSenha = :mediSenha";
            $params = array(
                ':mediEmail' => $email,
                ':mediSenha' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['mediId'] = Database::consulta($sql, $params)[0]['mediId'];
                return true;
            } else {
                $_SESSION['mediId'] = "";
                return false;
            }
        }
    }
?>