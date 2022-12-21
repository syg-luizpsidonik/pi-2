<?PHP
    $host = '';
    $port = 0;
    $database = '';
    $user = '';
    $password = '';
    try{
        $connect = new PDO("pgsql:host=".$host.";port=".$port.";dbname=".$database.";user=".$user.";password=".$password."");
    }catch(PDOException $error){
        echo "Error: ".$error;
        die($error->getMessage());
    }
    
?>