
<?php

class produtos{

    private $pdo;

    // conexao banco de dados

    public function __construct($dbname,$host,$user,$senha){

        try {
            $this->pdo = new PDO ("mysql:dbname=".$dbname.";host=".$host,$user,$senha);

        } catch (PDOException $th) {
            echo "Erro no banco de dados".$th->getMessage();
           
        }
    }



    //cadastrar os campeonatos no painel
    public function cadastroCamp($tipo,$titulo,$premiacao,$descricao,$data,$valor,$imagem,$link,$id)
    {
       
        $cmd = $this->pdo->prepare("insert into campeonatos(tipo,titulo,premiacao,descricao,data,valor,imagem,link,fk_id_usuario)
        value (:t, :ti, :p ,:de, :d, :v, :i, :l ,:id)");
        $cmd->bindValue(":t",$tipo);
        $cmd->bindValue(":ti",$titulo);
        $cmd->bindValue(":p",$premiacao);
        $cmd->bindValue(":de",$descricao);
        $cmd->bindValue(":d",$data);
        $cmd->bindValue(":v",$valor);
        $cmd->bindValue(":i",$imagem);
        $cmd->bindValue(":l",$link);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        return $cmd;
 
   }

      
     //dados dos campeonatos 

   public function buscarCamp($tipo){

        
        $cmd=$this->pdo->prepare("SELECT * from campeonatos where tipo=:t");
        $cmd->bindValue(":t",$tipo);
        $cmd->execute();
        
     
        if($cmd->rowCount()>0){

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $dados=array();
        }

        return $dados;

   }


//entrar nom camp com o id
   public function dadosCampeonato($id){
     
    

    $cmd=$this->pdo->prepare("SELECT * from campeonatos where id_camp =:id");
    $cmd ->bindValue(":id",$id);
    $cmd->execute();
    
    if($cmd->rowCount()>0){

        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $dados=array("ERRO");
    }

    return $dados;


   }



   // INSEIR  O RECRUTAMENTO
   public function recrutamento($descricao,$imagem,$link,$id_usu){

       $cmd= $this->pdo->prepare("INSERT into recrutamento (descricao,nome_imagem,link,fk_id_usuario) value 
       (:d,:i,:l,:id)");
       $cmd->bindValue(":d",$descricao);
       $cmd->bindValue(":i",$imagem);
       $cmd->bindValue(":l",$link);
       $cmd->bindValue(":id",$id_usu);
       $cmd->execute();
       return $cmd;
   }



   // pegar o recrutamento
    public function pegarRecrutamento()
   {

       $cmd=$this->pdo->query("SELECT * from recrutamento");
        
       if($cmd->rowCount()>0){
           $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
       }else{
           $dados = array();
       }
       
       return $dados;
       
   }


  // / pegar os dados do campe NO BANCO DE DADOS e mostrar no painel  
   public function pegarDadosCamp($id){

    $cmd= $this->pdo->prepare("SELECT * from campeonatos where fk_id_usuario= :id");
    $cmd ->bindValue(":id",$id);
    $cmd->execute();

    if($cmd->rowCount()>0){
        $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
    }else{
        $dados = array();
    }
    
    return $dados;

   }

   //deletar o CAMPEONATO pelo ID no PAINEL
   public function deletar($id_d){
       $cmd= $this->pdo->prepare("DELETE from campeonatos where id_camp = :id");
       $cmd -> bindValue(":id",$id_d);
       $cmd -> execute();  

   }












}





?>