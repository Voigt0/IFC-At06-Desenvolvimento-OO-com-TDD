<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Pessoa extends Padrao{
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __construct($id, $nome, $email, $senha) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setSenha($senha);
        }

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getSenha() {
            return $this->senha;
        }


        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        //Método toString
        public function __toString() {

        }

        //Métodos de autenticação
        public static function autenticar($email, $senha, $tabela){
            if($tabela == "Medico") {
                $sql = "SELECT mediId FROM Medico WHERE mediEmail = :email AND mediSenha = :senha";
                $validacaoId = "mediId";
            } else if($tabela == "Recepcionista") {
                $sql = "SELECT receId FROM Recepcionista WHERE receEmail = :email AND receSenha = :senha";
                $validacaoId = "receId";
            }
            $params = array(
                ':email' => $email,
                ':senha' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['id'] = Database::consulta($sql, $params)[0]['receId'];
                return true;
            } else {
                $_SESSION['id'] = "";
                return false;
            }
        }
    }
?>