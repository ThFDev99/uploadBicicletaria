<?php
    require_once("includes/conectarBD.php");
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
    //Função que vai exibir a data completa, dia e ano corrente
     include 'includes/exibirDia.fcn';
     include 'includes/cabecalho.php';
?>
    <img src="imagens/logoBike.png" width="150" height="100"><b>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
      <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar Clientes por Termos de Pesquisa - BIL</b></font></div></td>
      </tr>
      </table><br>
<?php
    //Recebe os dados digitados no formulário de cadastro de clientes via método POST
    $cliItemPesquisa = $_POST["cliItemPesquisa"];
    $cliTermoPesquisa = $_POST["cliTermoPesquisa"];
      
    //Elimina os espaços em branco digitados pelo usuário através do comando trim
    $cliItemPesquisa = trim($cliItemPesquisa);
      
    $sqlCliente = mysqli_query($conexao,"SELECT * FROM clientes WHERE ".$cliItemPesquisa." LIKE '%".$cliTermoPesquisa."%'"
    //Ordena pelo número do código do cliente
    ." ORDER BY cliID") or die ("Não foi possível realizar a consulta !!!!");      
?>
<?php
    //Se encontrar algum registro na tabela
    if(mysqli_num_rows($sqlCliente) > 0)
    {
?>
       <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
       <tr>
           <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Clientes Pesquisados</font></b></font></div>
           </td>
       <tr>
           <td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cliente</font></b></div></td>
           <td width="5%"><div align="center"><b><font face="Arial" size="2">Data de inclusão</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">Nome do Cliente</font></b></div></td>
           <td width="20%"><div align="center"><b><font face="Arial" size="2">Endereço</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">Bairro</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">E-mail</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">Telefone</font></b></div></td>
           <td width="10%"><div align="center"><b><font face="Arial" size="2">Cidade</font></b></div></td>
           <td width="5%"><div align="center"><b><font face="Arial" size="2">UF</font></b></div></td>
       </tr>
<?php
       //Lista os dados da tabela enquanto existir
       while($arrayCliente = mysqli_fetch_array($sqlCliente))
       {
?>
        <tr>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliID'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliDtInclusao'];?></font></td>
           <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliNome'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliEndereco'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliBairro'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliEmail'];?></font></td>
           <td width="03%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliTel'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliCidade'];?></font></td>
           <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['cliUF'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array 
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mais não foram encontrados nenhum cliente !!!!<br><br></font></div>";
     }
?>
     <br><div align="center"><font face="Arial" size="2">
     <b><a href='menuPesquisarClientes.php'><b>Voltar Para o Menu Pesquisar Clientes</a><br>     
     <b><a href='formAlterarClientes.php'><b>Voltar Para Alteração de Clientes</a><br>
     <b><a href='formExcluirClientes.php'><b>Voltar Para Exclusão de Clientes</a><br>
     <b><a href='menuGerClientes.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br>
     <b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Geral</a><br>
     <b><a href='sair.php'><b>Sair do Sistema BIL</a></font></div>
<?php
    include_once 'includes/rodape.php';
?>