<?php

require_once("models/Clinica.php");
require_once("models/Message.php");


class ClinicaDAO implements ClinicaDAOInterface{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn , $url){
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);

    }

    public function buildClinica($data){
        $clinica = new Clinica();

        $clinica->id = $data["cod_clinica"];
        $clinica->name = $data["nome_clinica"];
        $clinica->cnpj = $data["cnpj_clinica"];
        $clinica->cidade = $data["cidade_clinica"];
        $clinica->pais = $data["pais_clinica"];
        $clinica->estado = $data["estado_clinica"];
        $clinica->rua = $data["rua_clinica"];
        $clinica->medico_id = $data["medico_cod_medico"];
        

        return $clinica;
    }
    public function findAll(){

    }
    public function getClinicasBYMedicoId($id){
        $clinicas = [];

        $stmt = $this->conn->prepare("SELECT * FROM clinica WHERE medico_cod_medico = :medico_id");

        $stmt->bindParam(":medico_id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $clinicaArray = $stmt->fetchAll();

            foreach($clinicaArray as $clinica){
                $clinicas[] = $this->buildClinica($clinica);
            }
        }

        return $clinicas;


    }
    public function findById($id){

        $clinica = [];

        $stmt = $this->conn->prepare("SELECT * FROM clinica WHERE cod_clinica = :clinica_id");

        $stmt->bindParam(":clinica_id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $clinicaData = $stmt->fetch();

            $clinica = $this->buildClinica($clinicaData);
            return $clinica;

            
        }else{
            return false;
        }

        
 
    }
    public function findByNome($nome){

    }
    public function create(Clinica $clinica){
        $stmt = $this->conn->prepare("INSERT INTO clinica (
            nome_clinica, cnpj_clinica, pais_clinica, estado_clinica, cidade_clinica, rua_clinica, medico_cod_medico
            )VALUES(
                :name, :cnpj, :pais, :estado, :cidade, :rua, :medico_id
            )");

            $stmt->bindParam(":name", $clinica->name);
            $stmt->bindParam(":cnpj", $clinica->cnpj);
            $stmt->bindParam(":pais", $clinica->pais);
            $stmt->bindParam(":estado", $clinica->estado);
            $stmt->bindParam(":cidade", $clinica->cidade);
            $stmt->bindParam(":rua", $clinica->rua);
            $stmt->bindParam(":medico_id", $clinica->medico_id);

            $stmt->execute();

            $this->message->setMessage("Consultório adcionado com sucesso!", "success", "principal_medico.php");


            

    }
    public function updade(Clinica $clinica){
        $stmt = $this->conn->prepare("UPDATE clinica SET
        nome_clinica = :name,
        cnpj_clinica = :cnpj,
        cidade_clinica = :cidade,
        pais_clinica = :pais,
        estado_clinica = :estado,
        rua_clinica = :rua
        WHERE cod_clinica = :id
        ");

        $stmt->bindParam(":name", $clinica->name);
        $stmt->bindParam(":cnpj", $clinica->cnpj);
        $stmt->bindParam(":cidade", $clinica->cidade);
        $stmt->bindParam(":pais", $clinica->pais);
        $stmt->bindParam(":estado", $clinica->estado);
        $stmt->bindParam(":rua", $clinica->rua);
        $stmt->bindParam(":id", $clinica->id);

        $stmt->execute();

        $this->message->setMessage("Consultório atualizado com sucesso!", "success", "dashboard.php");
        

    }
    public function destroy($id){
        $stmt = $this->conn->prepare("DELETE FROM clinica WHERE cod_clinica = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $this->message->setMessage("Consultório deletado com sucesso!", "success", "dashboard.php");
    }
}
