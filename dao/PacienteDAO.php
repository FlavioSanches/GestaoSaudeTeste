<?php

require_once("Models/Paciente.php");
require_once("Models/Message.php");

class PacienteDAO implements PacienteDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url ){
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildPaciente($data){
        $user = new Paciente();

        $user->id = $data["cod_paciente"];
        $user->name = $data["nome_paciente"];
        $user->email = $data["email_paciente"];
        $user->password = $data["senha_paciente"];
        $user->image = $data["imagem_paciente"];
        $user->token = $data["token_paciente"];
        $user->cpf = $data["cpf_paciente"];
        $user->pais = $data["pais_paciente"];
        $user->estado = $data["estado_paciente"];
        $user->cidade = $data["cidade_paciente"];
        $user->rua = $data["rua_paciente"];

        return $user;

    }
    public function create(Paciente $user, $authUser = false){
        $stmt = $this->conn->prepare("INSERT INTO paciente(
             nome_paciente, email_paciente, senha_paciente, token_paciente
             ) VALUES (
                :name, :email,:password,:token
            
            )");
        
        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute();

        // Autenticar the user if authUser is true
        if($authUser){
            $this->setTokenToSession($user->token);
        }
    }

    public function update(Paciente $user, $redirect = true){
        $stmt = $this->conn->prepare("UPDATE paciente SET
            nome_paciente = :name,
            email_paciente = :email,
            imagem_paciente = :image,
            token_paciente = :token,
            cpf_paciente = :cpf,
            pais_paciente = :pais,
            estado_paciente = :estado,
            cidade_paciente = :cidade,
            rua_paciente = :rua

            WHERE cod_paciente = :id
        ");

        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":image", $user->image);
        $stmt->bindParam(":token", $user->token);
        $stmt->bindParam(":cpf", $user->cpf);
        $stmt->bindParam(":pais", $user->pais);
        $stmt->bindParam(":estado", $user->estado);
        $stmt->bindParam(":cidade", $user->cidade);
        $stmt->bindParam(":rua", $user->rua);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        if($redirect){
            //Redirect to the user's profile
            $this->message->setMessage("Dados atualizados com sucesso!", "success", "edit_profile_paciente.php");
        }
    
    }
    public function verifyToken($protected = false){
        if(isset($_SESSION["token"])){
            //Pega o token da session
            $token = $_SESSION["token"];

            $user = $this->findByToken($token);

            if($user){
                return $user;
            }else if($protected){
                //Redireciona paciente não autenticado
                $this->message->setMessage("Faca a autenticação para acessar essa página!", "error", "index.php");                    
            }

        }else if($protected){
            //Redireciona paciente não autenticado
            $this->message->setMessage("Faca a autenticação para acessar essa página!", "error", "index.php");                    
        }
    }
    public function setTokenToSession($token, $redirect = true){
        //Salvar token na session
        $_SESSION["token"] = $token;

        if($redirect){
           //Redireciona para o perfil do paciente
           $this->message->setMessage("Seja bem vindo!", "success", "edit_profile_paciente.php");
        }
    }
    public function authenticateUser($email, $password){
        $user = $this->findByEmail($email);
        if($user){
            //Checar se as senhas batem
            if(password_verify($password, $user->password)){
                //Gerar um token e inserir na session
                $token = $user->generateToken();

                $this->setTokenToSession($token,false);

                //Atualizar token no usuário
                $user->token = $token;

                $this->update($user, false);

                return true;  


                
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public function findByEmail($email){

        if($email != ""){
            $stmt = $this->conn->prepare("SELECT * FROM paciente where email_paciente = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = $this->buildPaciente($data);

                return $user;

            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public function findById($id){
        
    }
    public function findByToken($token){

        if($token != ""){
            $stmt = $this->conn->prepare("SELECT * FROM paciente where token_paciente = :token");

            $stmt->bindParam(":token", $token);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = $this->buildPaciente($data);

                return $user;

            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    
    public function destroyToken(){
        $_SESSION["token"] = "";

        //Redirecionar e apresentar a mensagem com sucesso
        $this->message->setMessage("Você fez o logout com sucesso!", "success", "index.php");


    }
    
    public function changePassoword(Paciente $user){
        $stmt = $this->conn->prepare("UPDATE paciente SET 
        senha_paciente = :password
        WHERE cod_paciente = :id");

        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        //Redirecionar e apresentar a mensagem com sucesso
        $this->message->setMessage("Senha alterada com sucesso!", "success", "edit_profile_paciente.php");
    }
}

