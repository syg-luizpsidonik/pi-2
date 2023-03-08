<?PHP
    session_start();
    require_once("functions.php");

    use app\Controller;

    //if(!isset($_SESSION['logado'])) header("location: index.php");
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['assunto']) && isset($_POST['msg'])){
        
        $func = new Controller();
        if(($func->cadastroContato($_POST['nome'],$_POST['email'],$_POST['assunto'],$_POST['msg'])) ){
            return header("Location: index.php");
        }else{
            return header("Location: contato.php?msg=Erro ao enviar!");
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="produtos.php">Produtos</a>
                    </li>
                    <li>
                        <a href="contato.php">Contato</a>
                    </li>
                    <li>
                        <a href="cadastro.php">Cadastro</a>
                    </li>
                    <?PHP 
                        if(isset($_SESSION['logado'])){
                            echo '<li><a href="logout.php">Logout</a></li>';
                            echo '<li><a href="painel.php">Painel</a></li>';
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
        <h2>Contato</h2>
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
                <label for="nome">Nome:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="nome" name="nome" type="text"
                    placeholder="Nome" required>
                    <label for="email">Email:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="email" name="email" type="mail"
                    placeholder="Email" required>
                <label for="assunto">Assunto:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="assunto" name="assunto" type="text"
                    placeholder="Assunto" required>
                <label for="msg">Mensagem:</label>
                <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="msg" name="msg" type="text"
                    placeholder="Mensagem" required>
                   
                <button class="button" type="submit">Enviar</button>
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