<?PHP
    session_start();	
    require_once("functions.php");

    use app\Controller;
    if(isset($_SESSION['logado'])) return header("Location: painel.php");

    if(isset($_POST['email']) && isset($_POST['senha'])){
        $func = new Controller();
        //echo "function".$func->login($_POST['email'],$_POST['senha']);
        if($func->login($_POST['email'],$_POST['senha']) == true){
            $_SESSION['logado'] = 'sim';
            $_SESSION['email'] = $_POST['email'];
            return header("Location: painel.php");
        }
        return header("Location: login.php?msg=Usúario ou senha inválida!");
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
        <h2>Login</h2>
        <form  method="POST" action="" style="margin-top: 20px">
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
            <label for="email">Email:</label>
            <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="email" name="email" type="mail"
                placeholder="E-mail">
            <label for="senha">Senha:</label>
            <input class="campo" onfocus="onfocusinput(this)" onblur="onblurinput(this)" id="senha" name="senha" type="password"
                placeholder="senha">
            <button class="button" type="submit">Enviar</button>
        </form>
    </main>
    <hr>
    <footer>
        <p>Copyright © 2022 Stickers - Todos os direitos reservados</p>
    </footer>
    <script src="src/js/script.js"></script>
</body>

</html>