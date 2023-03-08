<?PHP
    session_start();
    require_once("functions.php");

    use app\Controller;

    if(!isset($_SESSION['logado'])) header("location: index.php");
    if(isset($_POST['nome']) && isset($_POST['desc']) && isset($_POST['raridade']) && isset($_POST['qtd']) && isset($_FILES['img'])){
        
        //base64
        move_uploaded_file($_FILES["img"]["tmp_name"], $_FILES["img"]["name"]);
        $arquivo = file_get_contents($_FILES["img"]["name"]);
        $base64 = base64_encode($arquivo);

        $func = new Controller();
        if(($func->cadastroFigurinha($_POST['nome'],$_POST['desc'],$_POST['raridade'],$_POST['qtd'],$base64)) ){
            return header("Location: produtos.php");
        }else{
            return header("Location: painel.php?msg=Erro ao cadastrar uma figurinha!");
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
        <div class="capa">
            <img src="src/img/banner.png" alt="">
        </div>
        <h2>Cadastro Produtos</h2>
        <div >
            <form  method="POST" action="" style="margin-top: 20px" enctype="multipart/form-data">
                <?PHP
                    if(isset($_GET['msg'])){
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <b>Alerta:</b> <?PHP echo $_GET['msg'];?>
                        </div>
                        <?PHP
                    }
                ?>
                <label for="nome">Nome da Figurinha:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="nome" name="nome" type="text"
                    placeholder="Nome" required>
                <label for="desc">Descrição da figurinha:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="desc" name="desc" type="text"
                    placeholder="Descrição" required>
                <label for="raridade">Raridade:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="raridade" name="raridade" type="text"
                    placeholder="Raridade" required>
                    <label for="img">Imagem:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="img" name="img" type="file" required>
                    <label for="qtd">Qtd:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="qtd" name="qtd" type="number"
                    placeholder="Quantidade" required>
                <button class="button" type="submit">Cadastrar</button>
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