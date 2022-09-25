<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Recepcionista extends Padrao{
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


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Recepcionista]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Email: ".$this->getEmail().
                    "<br>Senha: ".$this->getSenha();
            return $str;
        }

        
        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Recepcionista (receNome, receEmail, receSenha) VALUES (:receNome, :receEmail, :receSenha)";
            $params = array(
                ":receNome" => $this->getNome(),
                ":receEmail" => $this->getEmail(),
                ":receSenha" => $this->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Recepcionista SET receNome = :receNome, receEmail = :receEmail, receSenha = :receSenha WHERE receId = :receId";
            $params = array(
                ":receId" => $this->getId(),
                ":receNome" => $this->getNome(),
                ":receEmail" => $this->getEmail(),
                ":receSenha" => $this->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Recepcionista WHERE receId = :receId";
            $params = array(
                ":receId" => $this->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Recepcionista";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE receId like :pesquisa"; break;
                    case(2): $sql .= " WHERE receNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE receEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE receSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY receId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Recepcionista WHERE receId = :receId";
            $params = array(':receId'=>$id);
            return Database::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($email, $senha){
            $sql = "SELECT receId FROM Recepcionista WHERE receEmail = :receEmail AND receSenha = :receSenha";
            $params = array(
                ':receEmail' => $email,
                ':receSenha' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['receId'] = Database::consulta($sql, $params)[0]['receId'];
                return true;
            } else {
                $_SESSION['receId'] = "";
                return false;
            }
        }
    }
?>