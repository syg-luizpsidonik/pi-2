
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
    <link rel="shortcut icon" href="src/img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/style.css">
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
        <h2>Produto</h2>
        <?PHP
            if(isset($_GET['id'])){
                $figs = $func->figurinhasId($_GET['id']);
                $figurinha = pg_fetch_all($figs);
                if(pg_num_rows($figs) == 0) echo "Nenhuma figurinha encontrada";
                else {
                    echo '<div class="container">';
                    echo '<div class="foto">';
                    echo '<img src="data:image/*;base64,'.$figurinha[0]['img_figurinha'].'" alt="">';
                    echo '</div>';
                    echo '<div class="desc">';
                    echo '<h3>'.$figurinha[0]['nm_figurinha'].'</h3>';
                    echo '<p>'.$figurinha[0]['desc_figurinha'].'</p><br>';
                    echo '<p>'.$figurinha[0]['raridade_figurinha'].'</p>';
                    echo '<center>';
                    echo '<iframe src="https://www.youtube.com/embed/sCQEWIRsCsk" frameborder="0" style="max-width: 100%;"></iframe>';
                    echo '</center>';
                    echo '<button>Comprar</button>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        ?>
        
        <h3 class="titulo">Tabela de Preços</h3>
        <div class="tabela">
            
            <table class="raridade">
                <thead>
                <tr>
                    <th>RARIDADE</th>
                    <th>VALOR</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>BASE</td>
                    <td>&nbsp;R$ 80,00</td>
                </tr>
                <tr>
                    <td>BRONZE</td>
                    <td>&nbsp;R$ 120,00</td>
                </tr>
                <tr>
                    <td>PRATA</td>
                    <td>&nbsp;R$ 460,00</td>
                </tr>
                <tr>
                    <td>OURO</td>
                    <td>&nbsp;R$ 709,00</td>
                </tr>
                <tbody>
            </table>
        </div>
    </main>
    <hr>
    <footer>
        <p>Copyright © 2022 Stickers - Todos os direitos reservados</p>
    </footer>
    <script src="src/js/script.js"></script>
</body>
</html>