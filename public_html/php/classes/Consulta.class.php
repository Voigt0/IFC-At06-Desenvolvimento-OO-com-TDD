<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Consulta extends Padrao{
        private $id;
        private $data;
        private $horario;
        private $gravidade;
        private $estado;
        private $paciente_paciId;
        private $medico_medId;

        public function __construct($id, $data, $horario, $gravidade, $estado, $paciente_paciId, $medico_medId) {
            $this->setId($id);
            $this->setData($data);
            $this->setHorario($horario);
            $this->setGravidade($gravidade);
            $this->setEstado($estado);
            $this->setPaciente_paciId($paciente_paciId);
            $this->setMedico_medId($medico_medId);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getData() {
            return $this->data;
        }

        public function getHorario() {
            return $this->horario;
        }

        public function getGravidade() {
            return $this->gravidade;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getPaciente_paciId() {
            return $this->paciente_paciId;
        }

        public function getMedico_medId() {
            return $this->medico_medId;
        }


        public function setId($id) {
            $this->id = $id;
        }

        public function setData($data) {
            $this->data = $data;
        }

        public function setHorario($horario) {
            $this->horario = $horario;
        }

        public function setGravidade($gravidade) {
            $this->gravidade = $gravidade;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function setPaciente_paciId($paciente_paciId) {
            $this->paciente_paciId = $paciente_paciId;
        }

        public function setMedico_medId($medico_medId) {
            $this->medico_medId = $medico_medId;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Consulta]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Data: ".$this->getData().
                    "<br>Horário: ".$this->getHorario().
                    "<br>Gravidade: ".$this->getGravidade().
                    "<br>Estado: ".$this->getEstado().
                    "<br>Paciente: ".$this->getPaciente_paciId().
                    "<br>Médico: ".$this->getMedico_medId().
                    "<br>";
            return $str;
        }

        
        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Consulta (consId, consData, consHorario, consGravidade, consEstado, Paciente_paciId, Medico_mediId) VALUES (:consId, :consData, :consHorario, :consGravidade, :consEstado, :paciente_paciId, :medico_mediId)";
            $params = array(
                ":consId" => $this->getId(),
                ":consData" => $this->getData(),
                ":consHorario" => $this->getHorario(),
                ":consGravidade" => $this->getGravidade(),
                ":consEstado" => $this->getEstado(),
                ":paciente_paciId" => $this->getPaciente_paciId(),
                ":medico_mediId" => $this->getMedico_medId()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Consulta SET consData = :consData, consHorario = :consHorario, consGravidade = :consGravidade, consEstado = :consEstado, Paciente_paciId = :paciente_paciId, Medico_mediId = :medico_mediId WHERE consId = :consId";
            $params = array(
                ":consId" => $this->getId(),
                ":consData" => $this->getData(),
                ":consHorario" => $this->getHorario(),
                ":consGravidade" => $this->getGravidade(),
                ":consEstado" => $this->getEstado(),
                ":paciente_paciId" => $this->getPaciente_paciId(),
                ":medico_mediId" => $this->getMedico_medId()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Consulta WHERE consId = :consId";
            $params = array(
                ":consId" => $this->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Consulta";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE consId like :pesquisa"; break;
                        
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY consId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Consulta WHERE consId = :consId";
            $params = array(':consId'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>