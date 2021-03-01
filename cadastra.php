<?php
    require_once "usuarios.php";
    $u = new Usuario;
?>
<html leng='pt-br'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body>
    <div>
        <h1>Entrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="32">
            <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="32">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php
if(insert($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['senha']);
    $senha = addslashes($_POST['senha']);
    $confirmarsenha = addslashes($_POST['confsenha']);
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha))
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->msgErro == "")
        {
            if($senha == $confirmarsenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    echo "Cadastrado com sucesso! Faça login.";
                }
                else
                {
                    echo "Email já cadastrado!";
                }
            }
            else
            {
                echo "Senha e confirmar senha não correspondem!";
            }
        }
        else
        {
            echo "Erro: ".$u->msgErro;
        }
    }
    else
    {
        echo "preencha todos os campos";
    }
}

?>
</body>
</html>
