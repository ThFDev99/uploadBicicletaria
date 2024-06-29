<?php
    //Inicializar a sessão
    session_start();

    //Faz a conexão com o nosso Banco de Dados MySql
    include_once("includes/conectarBD.php");
    //Recebe os dados do formulário index.php, que são repassados via método POST
    
    if(empty($_POST['indexUsuario']) || empty($_POST['indexSenha']))
    {
        header('Location: index.php');
        exit();
    }
    $autUsuario = mysqli_real_escape_string($conexao, $_POST['indexUsuario']);
    $autSenha = mysqli_real_escape_string($conexao, (sha1($_POST['indexSenha'])));
    
    //Consulta se os dados digitados estão gravados na tabela usuario_adm
    $sql = ("SELECT usuID, usuNome FROM usuariosadm WHERE usuNome = '$autUsuario' AND usuSenha = ('$autSenha')") or die ("Erro no Comando SQL");
    $result = mysqli_query($conexao, $sql);

    //Se os dados estiverem gravados no banco a variável $linha receberá 1
    $linhas = mysqli_num_rows($result);

    //Se os dados estiverem em branco ou se foram digitados errado e não existem no banco, a variável linha receberá zero (0)
    if($linhas == 0)
    {
        //Gravar as variáveis que iremos utilizar na nossa sessão
        $_SESSION['sessaoID'] = $autUsuario;
        $_SESSION['sessaoNome'] = $autUsuario;
        //Abrirá o script que contém a página com o menu de opções
        Header("Location: menuOpcoesGeral.php");
        exit();
    }
    else
    {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
?>
