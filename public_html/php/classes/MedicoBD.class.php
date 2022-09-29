<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class MedicoBD extends Crud{
        //Atributos
        private $medico;

        public function __construct(Medico $medico){
            $this->setMedico($medico);
        }  
        

        //Métodos Getters e Setters
        public function getMedico(){
            return $this->medico;
        }

        public function setMedico(Medico $medico){
            $this->medico = $medico;
        }

        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "";
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Medico (mediNome, mediCrm, mediEspecializacao, mediTelefone, mediEmail, mediSenha) VALUES (:mediNome, :mediCrm, :mediEspecializacao, :mediTelefone, :mediEmail, :mediSenha)";
            $params = array(
                ":mediNome" => $this->medico->getNome(),
                ":mediCrm" => $this->medico->getCrm(),
                ":mediEspecializacao" => $this->medico->getEspecializacao(),
                "mediTelefone" => $this->medico->getTelefone(),
                ":mediEmail" => $this->medico->login->getEmail(),
                ":mediSenha" => $this->medico->login->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Medico SET mediNome = :mediNome, mediCrm = :mediCrm, mediEspecializacao = :mediEspecializacao, mediTelefone = :mediTelefone, mediEmail = :mediEmail, mediSenha = :mediSenha WHERE mediId = :mediId";
            $params = array(
                ":mediId" => $this->medico->getId(),
                ":mediNome" => $this->medico->getNome(),
                ":mediCrm" => $this->medico->getCrm(),
                ":mediEspecializacao" => $this->medico->getEspecializacao(),
                ":mediTelefone" => $this->medico->getTelefone(),
                ":mediEmail" => $this->medico->login->getEmail(),
                ":mediSenha" => $this->medico->login->getSenha()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Medico WHERE mediId = :mediId";
            $params = array(
                ":mediId" => $this->medico->getId()
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
    }
?>