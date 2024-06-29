<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
        <nav>
            <div class="nav-wrapper blue lighten-1">
                <a href="#!" class="brand-logo">Menu de Opções</a>
                <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="navbar-itens" class="right hide-on-med-and-down">
                    <li><a href="formAlterarClientes.php">Alterar</a>
                    <li><a href="formExcluirClientes.php">Excluir</a>
                    <li><a href="menuPesquisarClientes.php">Pesquisar</a>
                    <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
                </ul>
            </div> 
        </nav>
    </div>
    <ul id="dropdown" class="dropdown-content">
            <li><a href="menuGerClientes.php"><i class="material-icons left">person_pin</i>Gerenciamento de Clientes</a></li>
            <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
            <li><a href="menuGerProdutos.php"><i class="material-icons left">local_grocery_store</i>Gerenciamento de Produtos</a></li>
            <li><a href="menuGerVendas.php"><i class="material-icons left">monetization_on</i>Gerenciamento de Vendas</a></li>
    </ul>    
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="formAlterarClientes.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formExcluirClientes.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="menuPesquisarClientes.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerClientes.php"><i class="material-icons left">person_pin</i>Gerenciamento de Clientes</a></li>
        <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
        <li><a href="menuGerProdutos.php"><i class="material-icons left">local_grocery_store</i>Gerenciamento de Produtos</a></li>
        <li><a href="menuGerVendas.php"><i class="material-icons left">monetization_on</i>Gerenciamento de Vendas</a></li>        
    </ul>
    <div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Clientes - BIL</b></font></div></td>
        </tr>
    </table>
    <form name="formClientes" id="formClientes" method="POST" action="incluirClientes.php">
    <div class = "container" style="margin-top: 100px">
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">event_note</i>
                    <input type="date" name="cliDtInclusao" required>
                    <label for="cliDtInclusao">Data de Inclusão:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">keyboard</i>
                    <input type="text" name="cliNome" required>
                    <label for="cliNome">Nome:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input type="text" name="cliEndereco" required>
                    <label for="cliEndereco">Endereço:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">home</i>
                    <input type="text" name="cliBairro" required>
                    <label for="cliBairro">Bairro:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="cliEmail" required>
                    <label for="cliEmail">Email:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">call</i>
                    <input type="text" name="cliTel" required>
                    <label for="cliTel">Telefone:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_city</i>
                    <input type="text" name="cliCidade" required>
                    <label for="cliCidade">Cidade:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">public</i>
                    <input type="text" name="cliUF" required>
                    <label for="cliUF">UF:</label>
                </div>
            </div>
        </div>
    </div><br/><br/>
    <div align="center">
        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="cadCliente" value="Cadastrar Cliente"><i class="material-icons left">assignment_ind</i>Cadastrar Cliente</button>
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">directions_bike</i>Sair do Sistema BIL</a>
    </div>
    </form>
<?php
    include_once 'includes/rodape.php';
?>