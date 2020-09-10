<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>projeto longin</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Nome completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Usuario" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirmar senha" maxlength="15">
        <input type="submit" value="Cadastrar">
       </form>
</div>  
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarsenha = addslashes($_POST['confsenha']);
    //verificar se esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha)
    {
        $u->conectar("projeto_coringa","localhost","root","");
        if($u->msgErro =="")//esta tudo ok
        {
            if($senha == $confirmarsenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha))   
            {
                echo "cadastrado om sucesso! acesse para entrar!";
            }
            else
            {
                echo "senha e confirmar senha nao correspondem";
            }
        }
        else
        {
        echo "erro: ",$u->msgErro;
        }
    }
    else
    {
        echo "preencha todos os campos!"
    }

}

?>

</body>
</htmk>
