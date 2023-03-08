<?PHP
namespace app;
class Connect{
    public $host = 'localhost';
    public $port = 5420;
    public $database = 'trabalho-pi';
    public $user = 'postgres';
    public $password = 'k147rosa';
    public $conn;

    function __construct(){
        try{

            $conn_string = "host=".$this->host." port=".$this->port." dbname=".$this->database." user=".$this->user." password=".$this->password;
            $this->conn = pg_connect($conn_string);
    
        }catch(Exception $error){
            var_dump($error);
            die($error->getMessage());
        }
    }
}
?>