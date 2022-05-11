<?php
// essas 3 lonhas mostra para o programador erro e o php não 
// mostra sem elas e mais pra produçao
include_once("secrets.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("enable_post_data_reading", 1);

// quando for subir comente essa linha acima
define("DRIVE",  "mysql"); //define sao constantes q não muda enquantonservidor tiver rodande (toda constante com letra maiuscula)
define("HOST",  "localhost");
define("PORT",  "3306");
define("USER",  "root");

define("DB",  "rafagourmet");
