<?php

class DAO //objeto de cesso aos dados
{
    private $pdo;
    function conecta(){
        try{
            $pdo = new PDO( DRIVE . ":host=".HOST.";port=".PORT.";dbname=".DB , USER, PASS);//conecta ao banco de dados
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES utf8");
        }catch(PDOException $e)
        {
            $pdo = null;
            echo("erro PDO:".$e->getMessage() . "</br>");
        }
        return $pdo;
    }
}