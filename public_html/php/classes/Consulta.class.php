<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Consulta extends Crud{
        // Atributos
        private $id;
        private $data;
        private $horario;
        private $gravidade;
        private $estado;
        private $paciente;
        private $medicos;

        // Criação do Construct
        public function __construct($id, $data, $horario, $gravidade, $estado, Paciente $paciente) {
            $this->setId($id);
            $this->setData($data);
            $this->setHorario($horario);
            $this->setGravidade($gravidade);
            $this->setEstado($estado);
            $this->setPaciente($paciente);
            $this->medicos = array();
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

        public function getPaciente() {
            return $this->paciente;
        }

        public function getMedico() {
            return $this->medico;
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

        public function setPaciente($paciente) {
            $this->paciente = $paciente;
        }


        //Métodos diversos
        public function adicionarMedico(Medico $medico) {
            $this->medicos[] = $medico;
        }

        public function listarMedicos() {
            return $this->medicos;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Consulta]<br>".
                    "<br>ID: ".$this->getId().
                    "<br>Data: ".$this->getData().
                    "<br>Horário: ".$this->getHorario().
                    "<br>Gravidade: ".$this->getGravidade().
                    "<br>Estado: ".$this->getEstado().
                    "<br>Paciente: ".$this->getPaciente()->getId().
                    "<br>Médico: ".$this->getMedico()->getId().
                    "<br>";
            return $str;
        }


        //Métodos de persistência (CRUD)
        public function create(){
            foreach($this->medicos as $key => $value) {
                $sql = "INSERT INTO Consulta (consData, consHorario, consGravidade, consEstado, Paciente_paciId, Medico_mediId) VALUES (:consData, :consHorario, :consGravidade, :consEstado, :paciente_paciId, :medico_mediId)";
                $params = array(
                    ":consData" => $this->getData(),
                    ":consHorario" => $this->getHorario(),
                    ":consGravidade" => $this->getGravidade(),
                    ":consEstado" => $this->getEstado(),
                    ":paciente_paciId" => $this->getPaciente()->getId(),
                    ":medico_mediId" => $value->getId()
                );
                Database::comando($sql, $params);
            }
            return true;
        }

        public function update(){
            foreach($this->medicos as $key => $value) {
                $sql = "UPDATE Consulta SET consData = :consData, consHorario = :consHorario, consGravidade = :consGravidade, consEstado = :consEstado, Paciente_paciId = :paciente_paciId, Medico_mediId = :medico_mediId WHERE consId = :consId";
                $params = array(
                    ":consId" => $this->getId(),
                    ":consData" => $this->getData(),
                    ":consHorario" => $this->getHorario(),
                    ":consGravidade" => $this->getGravidade(),
                    ":consEstado" => $this->getEstado(),
                    ":paciente_paciId" => $this->getPaciente()->getId(),
                    ":medico_mediId" => $this->getMedico()->getId()
                );
                Database::comando($sql, $params);
            }
            return true;
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
            $sql = "SELECT * FROM Consulta, Paciente, Medico
                    WHERE Paciente_paciId = paciId AND Medico_mediId = mediId";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " AND consId like :pesquisa"; break;
                    case(2): $sql .= " AND consData like :pesquisa"; break;
                    case(3): $sql .= " AND consHorario like :pesquisa"; break;
                    case(4): $sql .= " AND consGravidade like :pesquisa"; break;
                    case(5): $sql .= " AND consEstado like :pesquisa"; break;
                    case(6): $sql .= " AND Paciente_paciId like :pesquisa"; break;
                    case(7): $sql .= " AND Medico_mediId like :pesquisa"; break;
                    case(8): $sql .= " AND consEstado <> 1 AND Medico_mediId like :pesquisa"; break;
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

        public static function visualizarConsultas($mediId, $estado = "") {
            $sql = "SELECT * FROM Consulta LEFT JOIN Relatorio ON Consulta_consId = consId, Paciente, Medico
                    WHERE Paciente_paciId = paciId 
                    AND Medico_mediId = mediId 
                    AND Medico_mediId = :mediId";
            if ($estado == 0) {
                $sql .= " AND consEstado = 0";
            } else if($estado == 1) {
                $sql .= " AND consEstado = 1";
            }
            $sql .= " ORDER BY consEstado ASC, consGravidade DESC, consData DESC, consHorario ASC";
            $params = array(':mediId'=>$mediId);
            return Database::consulta($sql, $params);
        }


        //Métodos de validação
        public static function validar($id) {
            $sql = "SELECT * FROM Consulta WHERE consId = :consId";
            $params = array(
                ":consId" => $id
            );
            if (Database::consulta($sql, $params)) {
                return true;
            } else {
                return false;
            }
            
        }

        //Métodos diversos
        public static function modificarEstado($id, $estado) {
            $sql = "UPDATE Consulta SET consEstado = :consEstado WHERE consId = :consId";
            $params = array(
                ":consId" => $id,
                ":consEstado" => $estado
            );
            return Database::comando($sql, $params);
        }

        public static function consultarConsultasDoMedico($mediId) {
            $sql = "SELECT * FROM Consulta, Paciente, Medico
                    WHERE Medico_mediId = mediId
                    AND Paciente_paciId = paciId
                    AND Medico_mediId = :mediId";
            $params = array(
                ":mediId" => $mediId
            );
            return Database::consulta($sql, $params);
        }
    }
?>