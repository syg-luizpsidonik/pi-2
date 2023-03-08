<?PHP
    session_start();	
    require_once("functions.php");

    use app\Controller;
    if(!isset($_SESSION['logado'])) return header("Location: logout.php");

    if(isset($_GET['id'])){
        $func = new Controller();
        $figs = $func->figurinhasDelete($_GET['id']);
        echo 'Deletado com sucesso!';
        echo '<a href="edit.php">voltar!</a>';
    }
?>
