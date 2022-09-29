<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Medico extends Crud{
        private $id;
        private $nome;
        private $crm;
        private $especializacao;
        private $telefone;
        public $login;

        
        // Criação do Construct
        public function __construct($id, $nome, $crm, $especializacao, $telefone, $email, $senha) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setCrm($crm);
            $this->setEspecializacao($especializacao);
            $this->setTelefone($telefone);
            $this->adicionarLogin($email, $senha);
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


        //Método toString
        public function __toString() {
            $str = "";
            return $str;
        }


        //Métodos de persistência (CRUD)
        public function create(){
            $sql = "INSERT INTO Medico (mediNome, mediCrm, mediEspecializacao, mediTelefone, mediEmail, mediSenha) VALUES (:mediNome, :mediCrm, :mediEspecializacao, :mediTelefone, :mediEmail, :mediSenha)";
            $params = array(
                ":mediNome" => $this->getNome(),
                ":mediCrm" => $this->getCrm(),
                ":mediEspecializacao" => $this->getEspecializacao(),
                "mediTelefone" => $this->getTelefone(),
                ":mediEmail" => $this->login->getEmail(),
                ":mediSenha" => $this->login->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Medico SET mediNome = :mediNome, mediCrm = :mediCrm, mediEspecializacao = :mediEspecializacao, mediTelefone = :mediTelefone, mediEmail = :mediEmail, mediSenha = :mediSenha WHERE mediId = :mediId";
            $params = array(
                ":mediId" => $this->getId(),
                ":mediNome" => $this->getNome(),
                ":mediCrm" => $this->getCrm(),
                ":mediEspecializacao" => $this->getEspecializacao(),
                ":mediTelefone" => $this->getTelefone(),
                ":mediEmail" => $this->login->getEmail(),
                ":mediSenha" => $this->login->getSenha()
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
                    case(3): $sql .= " WHERE mediCrm like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE mediEspecializacao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE mediTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(6): $sql .= " WHERE mediEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(7): $sql .= " WHERE mediSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY mediId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Medico WHERE mediId = :mediId";
            $params = array(':mediId'=>$id);
            return Database::consulta($sql, $params);
        }

        //Métodos diversos
        public function adicionarLogin($email, $senha) {
            $this->login = new MedicoLogin($email, $senha);
        }
    }
?>