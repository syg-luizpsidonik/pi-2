<?PHP
    session_start();
    require_once("functions.php");

    use app\Controller;

    if(!isset($_SESSION['logado'])) header("location: index.php");
    if(isset($_POST['nome']) && isset($_POST['desc']) && isset($_POST['raridade']) && isset($_POST['qtd']) && isset($_POST['id'])){
        $func = new Controller();
        if(($func->figurinhasEdit($_POST['id'],$_POST['nome'],$_POST['desc'],$_POST['raridade'],$_POST['qtd'])) ){
            return header("Location: produto.php?id=".$_POST['id']);
        }else{
            return header("Location: painel.php");
        }
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stickers</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="shortcut icon" href="src/img/icone.png" type="image/x-icon">
</head>
<body>
    <div class="loading">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921" alt="">
    </div>
    <div class="header">
        <header>
            <img src="src/img/logo.png" alt="">
            <nav>
                <ul>
                    <li>
                        <a href="painel.php">Cadastro Produto</a>
                    </li>
                    <li>
                        <a href="produtos.php">Produtos</a>
                    </li>
                    <li>
                        <a href="cadastro.php">Cadastro</a>
                    </li>
                    <?PHP 
                        if(isset($_SESSION['logado'])){
                            echo '<li><a href="logout.php">Logout</a></li>';
                        }else{
                            echo '<li><a href="login.php">Login</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </header>
    </div>
    <main>
        <h2>Editar Produto Id: <?PHP echo $_GET['id'];?></h2>
        <div >
            <form  method="POST" action="" style="margin-top: 20px" enctype="multipart/form-data">
                <?PHP
                    if(isset($_GET['id'])){
                        $func = new Controller();
                        $figs = $func->figurinhasId($_GET['id']);
                        $figurinha = pg_fetch_all($figs);
                        if(pg_num_rows($figs) == 0) echo "Nenhuma figurinha encontrada";
                        else {?>
                            <label for="nome">Nome da Figurinha:</label>
                            <input class="campo" onfocus="onfocusinput(this)" value="<?PHP echo $figurinha[0]['nm_figurinha'];?>" onblur="onblurinput(this)" id="nome" name="nome" type="text"
                                placeholder="Nome" required>
                            <label for="desc">Descrição da figurinha:</label>
                            <input class="campo" onfocus="onfocusinput(this)" value="<?PHP echo $figurinha[0]['desc_figurinha'];?>" onblur="onblurinput(this)" id="desc" name="desc" type="text"
                                placeholder="Descrição" required>
                            <label for="raridade">Raridade:</label>
                            <input class="campo" onfocus="onfocusinput(this)" value="<?PHP echo $figurinha[0]['raridade_figurinha'];?>" onblur="onblurinput(this)" id="raridade" name="raridade" type="text"
                                placeholder="Raridade" required>
                                <label for="qtd">Qtd:</label>
                            <input class="campo" onfocus="onfocusinput(this)" value="<?PHP echo $figurinha[0]['qnt_figurinha'];?>" onblur="onblurinput(this)" id="qtd" name="qtd" type="number"
                                placeholder="Quantidade" required>
                            <input class="campo" onfocus="onfocusinput(this)" value="<?PHP echo $figurinha[0]['id_figurinha'];?>" onblur="onblurinput(this)" id="id" name="id" type="hidden"
                                placeholder="id" style ="display:block" required>
                            <button class="button" type="submit">Atualizar</button>
                        
                    <?PHP }}
                ?>
                
            </form>
        </div>
    </main>
    <hr>
    <footer>
        <p>Copyright © 2022 Stickers - Todos os direitos reservados</p>
    </footer>
    <script src="src/js/script.js"></script>
</body>
</html>