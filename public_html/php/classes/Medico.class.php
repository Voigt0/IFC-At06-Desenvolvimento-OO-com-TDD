<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Medico{
        private $id;
        private $nome;
        private $crm;
        private $especializacao;
        private $telefone;
        public $login;


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

        //Métodos diversos
        public function adicionarLogin($email, $senha) {
            $this->login = new MedicoLogin($email, $senha);
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Médico]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>CRM: ".$this->getCrm().
                    "<br>Especialização: ".$this->getEspecializacao().
                    "<br>Telefone: ".$this->getTelefone().
                    $this->login->__toString();
            return $str;
        }
    }
?>