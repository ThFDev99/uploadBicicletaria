<?php
    require_once("includes/conectarBD.php");
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
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
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados de Clientes - BIL</b></font></div></td>
        </tr>
    </table>
    <?php
        if (!isset($_POST["cliID"])&& !isset($_POST["enviar"]))
        {
    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Código do Cliente: <input type="text" name="cliID" size="10">
            <input type="submit" value="Alterar Dados do Cliente" name="alterar"></p>
            <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosClientes.php'> Clique Aqui </a><br/></font></div>
        </form>
    <?php
        }
        //Buscará os dados do Cliente
        else if(!isset($_POST["enviar"]))
        {
            $cliID = $_POST["cliID"];
            $consulta = mysqli_query($conexao, "SELECT cliID, date_format(cliDtInclusao,'%d/%m/%Y') as cliDtInclusao, cliNome, cliEndereco, cliBairro, cliEmail, cliTel, cliCidade, cliUF FROM clientes WHERE cliID = '$cliID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o cliente não foi encontrado
        {
            echo "Cliente não encontrado $cliID";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Cliente Encontrado:</b></font></div>";
            //seta a linha de campoCliente da tabela clientes e depois, coloca cada campo em uma variável.
            $campoCliente = mysqli_fetch_row($consulta);
            $cliDtInclusao = $campoCliente[1];
            $cliNome = $campoCliente[2];
            $cliEndereco = $campoCliente[3];
            $cliBairro = $campoCliente[4];
            $cliEmail = $campoCliente[5];
            $cliTel = $campoCliente[6];
            $cliCidade = $campoCliente[7];
            $cliUF = strtoupper($campoCliente[8]);//Esta função gravará os caracteres maiúsculos no MySql
    ?>
        <form name="formClientes" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <tr>
                <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Clientes Cadastrados</font></b></font></div></td>
            </tr>
            <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cliente</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Data de inclusão</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Cliente</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Endereço</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Bairro</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">E-mail</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Telefone</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Cidade</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">UF</font></b></div></td>
            </tr>
            <tr>
                <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cliID;?></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliDtInclusao" size="10" required value="<?php echo $cliDtInclusao;?>"></font></td>
                <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliNome" size="42" required value="<?php echo $cliNome;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliEndereco" size="42" required value="<?php echo $cliEndereco;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliBairro" size="10" required value="<?php echo $cliBairro;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="email" name="cliEmail" required value="<?php echo $cliEmail;?>"></font></td>
                <td width="03%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliTel" size="10" required value="<?php echo $cliTel;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliCidade" size="10" required value="<?php echo $cliCidade;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cliUF" style="texttransform: uppercase" onblur="maiuscula" size="5" required value="<?php echo $cliUF;?>"></font></td><!--Chamada da função que deixará o texto em maiúsculo -->
            </tr>
        </table>
        <input type ="hidden" name="cliID" value="<?php echo $cliID;?>">
        <input type ="hidden" name="enviar" value="S">
        <input type ="submit" value="Alterar Dados do Cliente" name="alterar"></p>
        </form>
    <?php
            mysqli_close($conexao);
        }
        }
        else // alterar cliente
        {
            $cliID=$_POST["cliID"];
            $cliDtInclusao=$_POST["cliDtInclusao"];
            $cliNome=$_POST["cliNome"];
            $cliEndereco=$_POST["cliEndereco"];
            $cliBairro=$_POST["cliBairro"];
            $cliEmail=$_POST["cliEmail"];
            $cliTel=$_POST["cliTel"];
            $cliCidade=$_POST["cliCidade"];
            $cliUF=strtoupper($_POST["cliUF"]);
            $altera = mysqli_query($conexao, "UPDATE clientes SET cliDtInclusao = str_to_date('$cliDtInclusao','%d/%m/%Y'), cliNome='$cliNome', cliEndereco='$cliEndereco', cliBairro='$cliBairro', cliEmail='$cliEmail', cliTel='$cliTel', cliCidade='$cliCidade', cliUF='$cliUF' WHERE cliID='$cliID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do Cliente $cliNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código do Cliente</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Data de inclusão</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Cliente</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Endereço</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Bairro</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>E-mail</font></b></div></td>";
                        echo "<td width='03%'><div align='center'><b><font face='Arial' size='2'>Telefone</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Cidade</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>UF</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliID</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliDtInclusao</font></td>";
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cliNome</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliEndereco</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliBairro</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliEmail</font></td>";
                        echo "<td width='03%' height='25'><b><font face='Arial' size='2'>$cliTel</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliCidade</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cliUF</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
    ?>
    <p><div align="center"><font face="Arial" size="2"><b><a href='formIncluirClientes.php'><b>Voltar para a Inclusão de Clientes</a><br/>
    <b><a href='formAlterarClientes.php'><b>Voltar para a Alteração de Clientes</a><br/>
    <b><a href='formExcluirClientes.php'><b>Voltar para a Exclusão de Clientes</a><br/>
    <b><a href='menuPesquisarClientes.php'><b>Voltar para a Pesquisa de Clientes</a><br/>
    <b><a href='menuGerClientes.php'><b>Voltar para o menu de Opções Gerenciamento de Clientes</a><br/>
    <b><a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Gerais</a><br/>
    <b><a href='sair.php'><b>Sair do Sistema BIL</a></font></div>
<?php
    include_once 'includes/rodape.php';
?>