<?php

require_once("Models/Medico.php");
require_once("Models/Message.php");

class MedicoDAO implements MedicoDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url ){
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildMedico($data){
        $user = new Medico();

        $user->id = $data["cod_medico"];
        $user->name = $data["nome_medico"];
        $user->email = $data["email_medico"];
        $user->password = $data["senha_medico"];
        $user->image = $data["imagem_medico"];
        $user->token = $data["token_medico"];
        $user->cpf = $data["cpf_medico"];
        $user->crm = $data["crm_medico"];
        $user->especialidade = $data["especialidade_medico"];

        return $user;

    }
    public function create(Medico $user, $authUser = false){
        $stmt = $this->conn->prepare("INSERT INTO medico(
             nome_medico, email_medico, senha_medico, token_medico
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

    public function update(Medico $user, $redirect = true){
        $stmt = $this->conn->prepare("UPDATE medico SET
            nome_medico = :name,
            email_medico = :email,
            imagem_medico = :image,
            token_medico = :token,
            cpf_medico = :cpf,
            crm_medico = :crm,
            especialidade_medico = :especialidade
            WHERE cod_medico = :id
        ");

        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":image", $user->image);
        $stmt->bindParam(":token", $user->token);
        $stmt->bindParam(":crm", $user->crm);
        $stmt->bindParam(":cpf", $user->cpf);
        $stmt->bindParam(":especialidade", $user->especialidade);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        if($redirect){
            //Redirect to the user's profile
            $this->message->setMessage("Dados atualizados com sucesso!", "success", "edit_profile_medico.php");
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
                //Redireciona usuario não autenticado
                $this->message->setMessage("Faca a autenticação para acessar essa página!", "error", "index.php");                    
            }

        }else if($protected){
            //Redireciona usuario não autenticado
            $this->message->setMessage("Faca a autenticação para acessar essa página!", "error", "index.php");                    
        }
    }
    public function setTokenToSession($token, $redirect = true){
        //Salvar token na session
        $_SESSION["token"] = $token;

        if($redirect){
           //Redireciona para o perfil do usuario
           $this->message->setMessage("Seja bem vindo!", "success", "edit_profile_medico.php");
          // $this->message->setMessage("Seja bem vindo!", "success", "principal_medico.php");
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
            $stmt = $this->conn->prepare("SELECT * FROM medico where email_medico = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = $this->buildMedico($data);

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
            $stmt = $this->conn->prepare("SELECT * FROM medico where token_medico = :token");

            $stmt->bindParam(":token", $token);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = $this->buildMedico($data);

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
    
    public function changePassoword(Medico $user){
        $stmt = $this->conn->prepare("UPDATE medico SET 
        senha_medico = :password
        WHERE cod_medico = :id");

        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        //Redirecionar e apresentar a mensagem com sucesso
        $this->message->setMessage("Senha alterada com sucesso!", "success", "edit_profile_medico.php");
    }
}

