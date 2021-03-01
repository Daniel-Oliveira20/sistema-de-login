<?php
    require_once "usuarios.php";    
    $u = new Usuario;
?>
<html leng='pt-br'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body>
    <div>
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="email" placeholder="Usuário" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="ACESSAR">
            <p>Não tem cadastro? <a href="cadastra.php">CADASTRE-SE</a></p>
        </form>
    </div>
<?php
if(insert($_POST['nome']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha))
            {
                header(areaprivada.php);
            }
            else
            {
            echo "Email e/ou senha incorretos!";
            }
        }
        else
        {
            echo "Erro:".$u->msgErro;
        }
    }
    else
    {
        echo "Preencha todos os campos!";
    }
}
?>
</body>
</html>
