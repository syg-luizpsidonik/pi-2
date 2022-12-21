<?PHP
    require 'jwt.php';
    require_once 'connect.php';
    use jwt\verify_jwt;

    header('Content-type: application/json');

    if(isset($_SERVER['HTTP_X_ACCESS_TOKEN'])){
        $verify = new verify_jwt($_SERVER['HTTP_X_ACCESS_TOKEN'],'secret');
        echo $verify->verify();
    }
?>