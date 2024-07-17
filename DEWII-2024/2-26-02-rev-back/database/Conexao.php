<?php
class Conexao
{
    private static $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=dewii2024';   
    private static $user = 'root';   
    private static $password = '';   
    private static $con = null;  
    
    public static function getConnection(){
        if (Conexao::$con === null) {
            try {
                Conexao::$con = new PDO(Conexao::$dsn, Conexao::$user, Conexao::$password);
            } catch (PDOException $e) {
                echo 'Erro ao conectar com o banco!<br>';
                //echo $e->getMessage(); 
            }
        }
        return Conexao::$con;
    }

    public static function getPrepareStatement(string $sql)
    {
        if(Conexao::getConnection()){
            try {
                return Conexao::$con->prepare($sql);
            } catch (PDOException $e) {
                echo 'Erro ao preparar o comando!<br>';
                //echo $e->getMessage(); 
            }
        }
        return null;
    }
}
