<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include 'includes/cabecalho.php';
?>
    <img src="/bil/imagens/logoBike.png" width="150" height="100"><b>
      <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar por Código, Nome e UF de Clientes - BIL</b></font></div></td>
      </tr>
      </table>      
    <form method="POST" action="resultadoPesquisarTermosClientes.php">
        <p><div align="left"><font face="Arial" size="2">
        <b>Selecione Código, Nome ou UF Cliente:<br>
        <select name="cliItemPesquisa">
            <option value="cliID"><b>Código</option>    
            <option value="cliNome"><b>Nome</option>
            <option value="cliUF"><b>UF</option>
            </select><br/><br/>
        <b>Digite um Termo Conforme Item Escolhido Acima:</br>
        <input name="cliTermoPesquisa" type="text" size="40"></br>
        <input type="submit" value="Pesquisar"></font></div><br>               
    </form>
        <p><div align="center"><font face="Arial" size="2">
        <p><div align="center"><font face="Arial" size="2">
        <b><a href='menuPesquisarClientes.php'><b>Voltar Para o Menu Pesquisar Clientes</a><br>
        <b><a href='menuGerClientes.php'>Voltar Para o Menu de Opções Gerenciamento de Clientes</a><br>
        <b><a href='menuOpcoesGeral.php'>Voltar Para o Menu de Opções Geral</a><br>
        <b><a href='sair.php'>Sair do Sistema BIL</a></font></div></p>
<?php
    include_once 'includes/rodape.php';
?>