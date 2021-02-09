<?php


class cadastro_usuario{
    
    
    private $pdo;

    // conexao banco de dados

    public function __construct($dbname,$host,$user,$senha){

        try {
            $this->pdo = new PDO ("mysql:dbname=".$dbname.";host=".$host,$user,$senha);

        } catch (PDOException $th) {
            echo "Erro no banco de dados".$th->getMessage();
           
        }
    }



    public  function cadastroPessoa($nome,$telefone,$email,$senha)
    {

            $cmd = $this->pdo->prepare("select * from usuarios where email = :e ");
            $cmd ->bindValue(":e","$email");
            $cmd->execute();
            if($cmd->rowCount()>0){
            return false;

          }else{
            $cmd = $this->pdo->prepare("insert into usuarios (nome,telefone,email,senha) value (:n , :t , :e,:s)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t",$telefone);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":s",$senha);
            $cmd -> execute();
            return true;


          }


        }



        public function login($email,$senha){

            $cmd=$this->pdo->prepare("select * from usuarios where email=:e and senha =:s");
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":s",$senha);
            $cmd->execute();

            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $res;

        }



        





}





?>