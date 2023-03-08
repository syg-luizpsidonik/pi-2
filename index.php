<?PHP
    session_start();
    require_once("functions.php");

    use app\Controller;
    $func = new Controller();
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
        <h2>Figurinhas Disponíveis</h2>
        <?PHP

            $figs = $func->figurinhas();
            $figurinha = pg_fetch_all($figs);
            echo '<div class="produtos">';
            for ($item=0; $item < 3; $item++) {
                if(isset($figurinha[ $item]['nm_figurinha'])){
                    echo '<div class="produto" onmouseover="addcolorBG(this)" onmouseout="removecolorBG(this)">';
                    echo '<img src="data:image/*;base64,'.$figurinha[ $item]['img_figurinha'].'" alt="">';
                    echo '<h3>'.$figurinha[ $item]['nm_figurinha'].'</h3>';
                    echo '<button onclick="redirecionar('.$figurinha[ $item]['id_figurinha'].')">Comprar</button>';
                    echo '</div>';
                }
            } 
            echo '</div>';
            
        ?>
    </main>
    <hr>
    <footer>
        <p>Copyright © 2022 Stickers - Todos os direitos reservados</p>
    </footer>
    <script src="src/js/script.js"></script>
</body>
</html>