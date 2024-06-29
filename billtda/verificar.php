<?php
    //INICIALIZA A SESSÃO
    session_start();

    //SE NÃO TIVER VARIÁVEIS REGISTRADAS
    //RETORNA PARA A TELA DE LOGIN
    if( (!isset($_SESSION['sessaoID'])) AND (!isset($_SESSION['sessaoNome'])) )
    Header("Location: index.php");
?>