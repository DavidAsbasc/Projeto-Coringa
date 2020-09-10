<?php

class usuario
{
    private $pdo;
    public $msgErro = "";//tudo ok
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try 
        {   
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
    } catch (PDOException $e)  {
        $msg = $e->getMessage();
    }
     
    
    
    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sqç->execute();
        if($sql->rowCount() > 0)
        {
            return false; //Já está cadastrado
        }
        else
        {
            //caso não, cadastrar
            $sql = $pdo->prepare("INSERT INtO usuarios(nome, telefone, email, senha) VALUES (:n, :t, :e, :s   ");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",mds($senha));
            $sql->execute();
            return true;
        }
    }


    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se amail e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",mds($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
           //entrar no sistema (sessao)
           $dado = $sql->fetch();
           session_start();
           $_SESSION['id_usuario'] = $dado['id_usuario'];
           return true; //cadastrado com sucesso
        }
        else
        {
            return false;//nao foi possivel logar

        }


        //entrar no sistema (sessao)





    }
}








?>