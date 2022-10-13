<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Paciente extends Crud{
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


        //Métodos de persistência (CRUD)
        public function create(){
            $sql = "INSERT INTO Paciente (paciNome, paciNascimento, paciEstado, paciCidade, paciEndereco, paciTelefone, paciComorbidades, paciTabagismo, paciEtilismo, paciAlergias, paciMedicacao, paciHistoriaClinica, paciPeso, paciAltura) VALUES (:paciNome, :paciNascimento, :paciEstado, :paciCidade, :paciEndereco, :paciTelefone, :paciComorbidades, :paciTabagismo, :paciEtilismo, :paciAlergias, :paciMedicacao, :paciHistoriaClinica, :paciPeso, :paciAltura)";
            $params = array(
                ":paciNome" => $this->getNome(),
                ":paciNascimento" => $this->getNascimento(),
                ":paciEstado" => $this->getEstado(),
                ":paciCidade" => $this->getCidade(),
                ":paciEndereco" => $this->getEndereco(),
                ":paciTelefone" => $this->getTelefone(),
                ":paciComorbidades" => $this->getComorbidades(),
                ":paciTabagismo" => $this->getTabagismo(),
                ":paciEtilismo" => $this->getEtilismo(),
                ":paciAlergias" => $this->getAlergias(),
                ":paciMedicacao" => $this->getMedicacao(),
                ":paciHistoriaClinica" => $this->getHistoriaClinica(),
                ":paciPeso" => $this->getPeso(),
                ":paciAltura" => $this->getAltura()
            );
            Database::comando($sql, $params);
            return true;
        }

        public function update(){
            $sql = "UPDATE Paciente SET paciNome = :paciNome, paciNascimento = :paciNascimento, paciEstado = :paciEstado, paciCidade = :paciCidade, paciEndereco = :paciEndereco, paciTelefone = :paciTelefone, paciComorbidades = :paciComorbidades, paciTabagismo = :paciTabagismo, paciEtilismo = :paciEtilismo, paciAlergias = :paciAlergias, paciMedicacao = :paciMedicacao, paciHistoriaClinica = :paciHistoriaClinica, paciPeso = :paciPeso, paciAltura = :paciAltura WHERE paciId = :paciId";
            $params = array(
                ":paciId" => $this->getId(),
                ":paciNome" => $this->getNome(),
                ":paciNascimento" => $this->getNascimento(),
                ":paciEstado" => $this->getEstado(),
                ":paciCidade" => $this->getCidade(),
                ":paciEndereco" => $this->getEndereco(),
                ":paciTelefone" => $this->getTelefone(),
                ":paciComorbidades" => $this->getComorbidades(),
                ":paciTabagismo" => $this->getTabagismo(),
                ":paciEtilismo" => $this->getEtilismo(),
                ":paciAlergias" => $this->getAlergias(),
                ":paciMedicacao" => $this->getMedicacao(),
                ":paciHistoriaClinica" => $this->getHistoriaClinica(),
                ":paciPeso" => $this->getPeso(),
                ":paciAltura" => $this->getAltura()
            );
            Database::comando($sql, $params);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM Paciente WHERE paciId = :paciId";
            $params = array(
                ":paciId" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
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