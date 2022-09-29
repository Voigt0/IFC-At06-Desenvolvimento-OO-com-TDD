<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class DBPaciente extends Crud{
        //Atributos
        private $paciente;


        //Método construtor
        public function __construct(Paciente $paciente) {
            $this->setPaciente($paciente);
        }  
        

        //Métodos Getters e Setters
        public function getPaciente() {
            return $this->paciente;
        }

        public function setPaciente(Paciente $paciente) {
            $this->paciente = $paciente;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "";
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Paciente (paciNome, paciNascimento, paciEstado, paciCidade, paciEndereco, paciTelefone, paciComorbidades, paciTabagismo, paciEtilismo, paciAlergias, paciMedicacao, paciHistoriaClinica, paciPeso, paciAltura) VALUES (:paciNome, :paciNascimento, :paciEstado, :paciCidade, :paciEndereco, :paciTelefone, :paciComorbidades, :paciTabagismo, :paciEtilismo, :paciAlergias, :paciMedicacao, :paciHistoriaClinica, :paciPeso, :paciAltura)";
            $params = array(
                ":paciNome" => $this->paciente->getNome(),
                ":paciNascimento" => $this->paciente->getNascimento(),
                ":paciEstado" => $this->paciente->getEstado(),
                ":paciCidade" => $this->paciente->getCidade(),
                ":paciEndereco" => $this->paciente->getEndereco(),
                ":paciTelefone" => $this->paciente->getTelefone(),
                ":paciComorbidades" => $this->paciente->getComorbidades(),
                ":paciTabagismo" => $this->paciente->getTabagismo(),
                ":paciEtilismo" => $this->paciente->getEtilismo(),
                ":paciAlergias" => $this->paciente->getAlergias(),
                ":paciMedicacao" => $this->paciente->getMedicacao(),
                ":paciHistoriaClinica" => $this->paciente->getHistoriaClinica(),
                ":paciPeso" => $this->paciente->getPeso(),
                ":paciAltura" => $this->paciente->getAltura()
            );
            return Database::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Paciente SET paciNome = :paciNome, paciNascimento = :paciNascimento, paciEstado = :paciEstado, paciCidade = :paciCidade, paciEndereco = :paciEndereco, paciTelefone = :paciTelefone, paciComorbidades = :paciComorbidades, paciTabagismo = :paciTabagismo, paciEtilismo = :paciEtilismo, paciAlergias = :paciAlergias, paciMedicacao = :paciMedicacao, paciHistoriaClinica = :paciHistoriaClinica, paciPeso = :paciPeso, paciAltura = :paciAltura WHERE paciId = :paciId";
            $params = array(
                ":paciId" => $this->paciente->getId(),
                ":paciNome" => $this->paciente->getNome(),
                ":paciNascimento" => $this->paciente->getNascimento(),
                ":paciEstado" => $this->paciente->getEstado(),
                ":paciCidade" => $this->paciente->getCidade(),
                ":paciEndereco" => $this->paciente->getEndereco(),
                ":paciTelefone" => $this->paciente->getTelefone(),
                ":paciComorbidades" => $this->paciente->getComorbidades(),
                ":paciTabagismo" => $this->paciente->getTabagismo(),
                ":paciEtilismo" => $this->paciente->getEtilismo(),
                ":paciAlergias" => $this->paciente->getAlergias(),
                ":paciMedicacao" => $this->paciente->getMedicacao(),
                ":paciHistoriaClinica" => $this->paciente->getHistoriaClinica(),
                ":paciPeso" => $this->paciente->getPeso(),
                ":paciAltura" => $this->paciente->getAltura()
            );
            return Database::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Paciente WHERE paciId = :paciId";
            $params = array(
                ":paciId" => $this->paciente->getId()
            );
            return Database::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Paciente";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE paciId like :pesquisa"; break;
                    case(2): $sql .= " WHERE paciNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE paciNascimento like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE paciEstado like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE paciCidade like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(6): $sql .= " WHERE paciEndereco like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(7): $sql .= " WHERE paciTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(8): $sql .= " WHERE paciComorbidades like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(9): $sql .= " WHERE paciTabagismo like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(10): $sql .= " WHERE paciEtilismo like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(11): $sql .= " WHERE paciAlergias like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(12): $sql .= " WHERE paciMedicacao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(13): $sql .= " WHERE paciHistoriaClinica like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(14): $sql .= " WHERE paciPeso like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(15): $sql .= " WHERE paciAltura like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY paciId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Paciente WHERE paciId = :paciId";
            $params = array(':paciId'=>$id);
            return Database::consulta($sql, $params);
        }


        //Métodos de validação
        public static function validar($id) {
            $sql = "SELECT * FROM Paciente WHERE paciId = :paciId";
            $params = array(
                ":paciId" => $id
            );
            if (Database::consulta($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>