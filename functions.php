<?php
namespace app;

require_once("conexao.php");

use app\Connect;

class Controller extends Connect {
  
  public function login($email, $senha){
    try {
        $result = pg_query_params($this->conn, 'select * from tb_usuario where email_usuario = $1 and senha_usuario = $2', array($email,md5($senha)));
        $count_user = pg_num_rows($result);
        $user = pg_fetch_assoc($result);
        if($count_user > 0){
          return true; 
        }else{
          return false;
        } 
    } catch (\Exception $e) {
      return "Error: ". $e->getMessage();
    }    
  }

  public function cadastro($nome, $email, $senha){
    try {
        $result_query = pg_query_params($this->conn, 'select * from tb_usuario where email_usuario = $1', array($email));
        $count_user = pg_num_rows($result_query);

        if($count_user > 0){
            return false;
        }else{
            $result = pg_query_params($this->conn, 'insert into tb_usuario (nm_usuario,email_usuario,senha_usuario) values ($1,$2,$3)', array($nome, $email, md5($senha)));
            return true;
        }
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
  public function cadastroFigurinha($nome,$desc,$raridade,$qtd,$base){
    try {
        $result = pg_query_params($this->conn, 'insert into tb_figurinha (nm_figurinha,desc_figurinha,raridade_figurinha,img_figurinha,qnt_figurinha) values ($1,$2,$3,$4,$5)', array($nome, $desc, $raridade,$base,(int) $qtd));    
        return true;
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
  public function figurinhas(){
    try {
        $result = pg_query_params($this->conn, 'select * from tb_figurinha', array());    
        return $result;
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
  public function figurinhasId($id){
    try {
        $result = pg_query_params($this->conn, 'select * from tb_figurinha where id_figurinha = $1', array($id));    
        return $result;
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
  public function figurinhasDelete($id){
    try {
        $result = pg_query_params($this->conn, 'delete from tb_figurinha where id_figurinha = $1', array($id));    
        return $result;
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
  public function figurinhasEdit($id,$nome,$desc,$raridade,$qtd){
    try {
        $result = pg_query_params($this->conn, 'update tb_figurinha set nm_figurinha = $1,desc_figurinha = $2,raridade_figurinha = $3,qnt_figurinha = $4 where id_figurinha = $5', array($nome,$desc,$raridade,$qtd,$id));    
        return $result;
    } catch (\Exception $e) {
        return false;
        return "Error: ". $e->getMessage();
    }    
  }
}
?>