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
                    <li><a href="formIncluirClientes.php">Incluir</a>
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
            <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
    </ul>    
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="formIncluirClientes.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
        <li><a href="formAlterarClientes.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formExcluirClientes.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="menuPesquisarClientes.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerClientes.php"><i class="material-icons left">person_pin</i>Gerenciamento de Clientes</a></li>
        <li><a href="menuGerUsuAdm.php"><i class="material-icons left">group</i>Gerenciamento de Usuários</a></li>
        <li><a href="menuGerProdutos.php"><i class="material-icons left">local_grocery_store</i>Gerenciamento de Produtos</a></li>
        <li><a href="menuGerVendas.php"><i class="material-icons left">monetization_on</i>Gerenciamento de Vendas</a></li>
        <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>        
    </ul>
    <div>
        <?php
            //Exibirá o nome do usuário que está logado e a data corrente
            echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
        ?>
    </div>
    <br/><br/>
    <?php include_once 'includes/imagem.php'; ?>
    <div align="center">
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">directions_bike</i>Sair do Sistema BIL</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>