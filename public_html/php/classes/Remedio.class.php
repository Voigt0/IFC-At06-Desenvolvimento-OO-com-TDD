<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Remedio extends Crud{
        private $id;
        private $nome;
        private $classificacao;
        private $tipo;
        private $idade;

        
        public function __construct($id, $nome, $classificacao, $tipo, $idade) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setClassificacao($classificacao);
            $this->setTipo($tipo);
            $this->setIdade($idade);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getClassificacao() {
            return $this->classificacao;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getIdade() {
            return $this->idade;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setClassificacao($classificacao) {
            $this->classificacao = $classificacao;
        }
        
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        
        public function setIdade($idade) {
            $this->idade = $idade;
        }
        
        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Remedio]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Classificação: ".$this->getClassificacao().
                    "<br>Tipo: ".$this->getTipo().
                    "<br>Idade: ".$this->getIdade().
                    "<br>";
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Remedio (remeId, remeNome, remeClassificacao, remeIdade) VALUES (:remeId, :remeNome, :remeClassificacao, :remeIdade)";
            $params = array(
                ":remeId" => $this->getId(),
                ":remeNome" => $this->getNome(),
                ":remeClassificacao" => $this->getClassificacao(),
                ":remeIdade" => $this->getIdade()                
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Remedio SET remeNome = :remeNome, remeClassificacao = :remeClassificacao, remeIdade = :remeIdade WHERE remeId = :remeId";
            $params = array(
                ":remeId" => $this->getId(),
                ":remeNome" => $this->getNome(),
                ":remeClassificacao" => $this->getClassificacao(),
                ":remeIdade" => $this->getIdade()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Remedio WHERE remeId = :remeId";
            $params = array(
                ":remeId" => $this->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Remedio";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE remeId like :pesquisa"; break;
                    case(2): $sql .= " WHERE remeNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE remeClassificacao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE remeIdade like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY remeId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Remedio WHERE remeId = :remeId";
            $params = array(':remeId'=>$id);
            return Database::consulta($sql, $params);
        }


        //Métodos de validação
        public static function validar($id) {
            $sql = "SELECT * FROM Remedio WHERE remeId = :remeId";
            $params = array(
                ":remeId" => $id
            );
            if (Database::consulta($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>