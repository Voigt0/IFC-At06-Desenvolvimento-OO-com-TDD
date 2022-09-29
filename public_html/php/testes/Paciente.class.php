<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Paciente{
        // Atributos
        private $id;
        private $nome;
        private $nascimento;
        private $estado;
        private $cidade;
        private $endereco;
        private $telefone;
        private $comorbidades;
        private $tabagismo;
        private $etilismo;
        private $alergias;
        private $medicacao;
        private $historiaClinica;
        private $peso;
        private $altura;


        // Criação do Construct 
        public function __construct($id, $nome, $nascimento, $estado, $cidade, $endereco, $telefone, $comorbidades, $tabagismo, $etilismo, $alergias, $medicacao, $historiaClinica, $peso, $altura) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setNascimento($nascimento);
            $this->setEstado($estado);
            $this->setCidade($cidade);
            $this->setEndereco($endereco);
            $this->setTelefone($telefone);
            $this->setComorbidades($comorbidades);
            $this->setTabagismo($tabagismo);
            $this->setEtilismo($etilismo);
            $this->setAlergias($alergias);
            $this->setMedicacao($medicacao);
            $this->setHistoriaClinica($historiaClinica);
            $this->setPeso($peso);
            $this->setAltura($altura);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getNascimento() {
            return $this->nascimento;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getComorbidades() {
            return $this->comorbidades;
        }

        public function getTabagismo() {
            return $this->tabagismo;
        }

        public function getEtilismo() {
            return $this->etilismo;
        }

        public function getAlergias() {
            return $this->alergias;
        }

        public function getMedicacao() {
            return $this->medicacao;
        }

        public function getHistoriaClinica() {
            return $this->historiaClinica;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function getAltura() {
            return $this->altura;
        }


        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setNascimento($nascimento) {
            $this->nascimento = $nascimento;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
        
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
        
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        public function setComorbidades($comorbidades) {
            $this->comorbidades = $comorbidades;
        }
        
        public function setTabagismo($tabagismo) {
            $this->tabagismo = $tabagismo;
        }
        
        public function setEtilismo($etilismo) {
            $this->etilismo = $etilismo;
        }
        
        public function setAlergias($alergias) {
            $this->alergias = $alergias;
        }
        
        public function setMedicacao($medicacao) {
            $this->medicacao = $medicacao;
        }
        
        public function setHistoriaClinica($historiaClinica) {
            $this->historiaClinica = $historiaClinica;
        }
        
        public function setPeso($peso) {
            $this->peso = $peso;
        }
        
        public function setAltura($altura) {
            $this->altura = $altura;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Paciente]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Nascimento: ".$this->getNascimento().
                    "<br>Estado: ".$this->getEstado().
                    "<br>Cidade: ".$this->getCidade().
                    "<br>Endereço: ".$this->getEndereco().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Comorbidades: ".$this->getComorbidades().
                    "<br>Tabagismo: ".$this->getTabagismo().
                    "<br>Etilismo: ".$this->getEtilismo().
                    "<br>Alergias: ".$this->getAlergias().
                    "<br>Medicação: ".$this->getMedicacao().
                    "<br>História Clínica: ".$this->getHistoriaClinica().
                    "<br>Peso: ".$this->getPeso().
                    "<br>Altura: ".$this->getAltura().
                    "<br>";
            return $str;
        }
    }
?>