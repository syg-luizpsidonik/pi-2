<?PHP
    require 'jwt.php';
    require_once 'connect.php';
    use jwt\jwt;

    header('Content-type: application/json');

    if (isset($_POST['email']) && isset($_POST['password'])){
        $find_user = $connect->prepare("select * from usuario where email = :email and senha = :password");
        $find_user->bindValue(':email', $_POST['email']);
        $find_user->bindValue(':password', md5($_POST['password']));
        $find_user->execute();
        $count_user = $find_user->rowCount();
        $user = $find_user->fetchAll();
        if($count_user > 0){
            $token = new jwt($user[0]["id"],$user[0]["nome"],'secret');
            echo json_encode(["token" => $token->generate()]);
        }else{
            echo json_encode(["error" => "Usúario ou senha inválida!"]);
        }
    }else{
        echo json_encode(["error" => "Preencha todos os campos!"]);
    }
?>