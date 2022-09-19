<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Medico extends Padrao{
        private $id;
        private $nome;
        private $crm;
        private $especializacao;
        private $telefone;
        private $email;
        private $senha;

        public function __construct($id, $nome, $crm, $especializacao, $telefone, $email, $senha) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setCrm($crm);
            $this->setEspecializacao($especializacao);
            $this->setTelefone($telefone);
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

        public function getCrm() {
            return $this->crm;
        }

        public function getEspecializacao() {
            return $this->especializacao;
        }

        public function getTelefone() {
            return $this->telefone;
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
        
        
        public function setCrm($crm) {
            $this->crm = $crm;
        }
        
        public function setEspecializacao($especializacao) {
            $this->especializacao = $especializacao;
        }
        
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Médico]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>CRM: ".$this->getCrm().
                    "<br>Especialização: ".$this->getEspecializacao().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Email: ".$this->getEmail().
                    "<br>Senha: ".$this->getSenha();
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Medico (mediNome, mediCrm, mediEspecializacao, mediEmail, mediSenha) VALUES (:mediNome, :mediCrm, :mediEspecializacao, :mediEmail, :mediSenha)";
            $params = array(
                ":mediNome" => $this->getNome(),
                ":mediCrm" => $this->getCrm(),
                ":mediEspecializacao" => $this->getEspecializacao(),
                "mediTelefone" => $this->getTelefone(),
                ":mediEmail" => $this->getEmail(),
                ":mediSenha" => $this->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Medico SET mediNome = :mediNome, mediCrm = :mediCrm, mediEspecializacao = :mediEspecializacao, mediTelefone = :mediTelefone, mediEmail = :mediEmail, mediTelefone = :mediTelefone, mediSenha = :mediSenha WHERE mediId = :mediId";
            $params = array(
                ":mediId" => $this->getId(),
                ":mediNome" => $this->getNome(),
                ":mediCrm" => $this->getCrm(),
                ":mediEspecializacao" => $this->getEspecializacao(),
                ":mediTelefone" => $this->getTelefone(),
                ":mediEmail" => $this->getEmail(),
                ":mediSenha" => $this->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Medico WHERE mediId = :mediId";
            $params = array(
                ":mediId" => $this->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Medico";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE mediId like :pesquisa"; break;
                    case(2): $sql .= " WHERE mediNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE mediEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE mediTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE mediSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY mediId";
                $params = array();
            }
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM medirio WHERE mediId = :mediId";
            $params = array(':mediId'=>$id);
            return parent::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($email, $senha){
            $sql = "SELECT mediId FROM medirio WHERE mediEmail = :mediEmail AND mediSenha = :mediSenha";
            $params = array(
                ':mediEmail' => $email,
                ':mediSenha' => $senha
            );
            session_start();
            if (self::consulta($sql, $params)) {
                $_SESSION['mediId'] = self::consulta($sql, $params)[0]['mediId'];
                return true;
            } else {
                $_SESSION['mediId'] = "";
                return false;
            }
        }
    }
?>