<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Relatorio extends Crud{
        private $id;
        private $descricao;
        private $medicamentos;
        private $exames;
        private $consulta_consId;


        public function __construct($id, $descricao, $medicamentos, $exames, $consulta_consId) {
            $this->setId($id);
            $this->setDescricao($descricao);
            $this->setMedicamentos($medicamentos);
            $this->setExames($exames);
            $this->setConsulta_consId($consulta_consId);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getMedicamentos() {
            return $this->medicamentos;
        }

        public function getExames() {
            return $this->exames;
        }

        public function getConsulta_consId() {
            return $this->consulta_consId;
        }


        public function setId($id) {
            $this->id = $id;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setMedicamentos($medicamentos) {
            $this->medicamentos = $medicamentos;
        }

        public function setExames($exames) {
            $this->exames = $exames;
        }

        public function setConsulta_consId($consulta_consId) {
            $this->consulta_consId = $consulta_consId;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Relatório]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Descrição: ".$this->getDescricao().
                    "<br>Medicamentos: ".$this->getMedicamentos().
                    "<br>Exames: ".$this->getExames().
                    "<br>Consulta: ".$this->getConsulta_consId().
                    "<br>";
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Relatorio (relaDescricao, relaMedicamentos, relaExames, Consulta_consId) VALUES (:relaDescricao, :relaMedicamentos, :relaExames, :Consulta_consId)";
            $params = array(
                ":relaDescricao" => $this->getDescricao(),
                ":relaMedicamentos" => $this->getMedicamentos(),
                ":relaExames" => $this->getExames(),
                ":Consulta_consId" => $this->getConsulta_consId()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Relatorio SET relaDescricao = :relaDescricao, relaMedicamentos = :relaMedicamentos, relaExames = :relaExames, Consulta_consId = :Consulta_consId WHERE relaId = :relaId";
            $params = array(
                ":relaId" => $this->getId(),
                ":relaDescricao" => $this->getDescricao(),
                ":relaMedicamentos" => $this->getMedicamentos(),
                ":relaExames" => $this->getExames(),
                ":Consulta_consId" => $this->getConsulta_consId()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Relatorio WHERE relaId = :relaId";
            $params = array(
                ":relaId" => $this->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Relatorio";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE relaId like :pesquisa"; break;
                    case(2): $sql .= " WHERE relaDescricao like :pesquisa"; break;
                    case(3): $sql .= " WHERE relaMedicamentos like :pesquisa"; break;
                    case(4): $sql .= " WHERE relaExames like :pesquisa"; break;
                    case(5): $sql .= " WHERE Consulta_consId like :pesquisa"; break;    
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY relaId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Relatorio WHERE relaId = :relaId";
            $params = array(':relaId'=>$id);
            return Database::consulta($sql, $params);
        }

         //Métodos de validação
         public static function validar($id) {
            $sql = "SELECT * FROM Relatorio WHERE relaId = :relaId";
            $params = array(
                ":relaId" => $id
            );
            if (Database::consulta($sql, $params)) {
                return true;
            } else {
                return false;
            }
            
        }
    }
?>