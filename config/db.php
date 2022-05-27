<?php

include_once("app.php");

// ------------------------------------------------------------------------
// CONEXÃO COM O BANCO DE DADOS

if (SIS_CONFIG_ENV == "localhost") {
    define("SIS_BD_USER", "root");
    define("SIS_BD_PASSWORD", "");
    define("SIS_BD_DATABASE", "bd_gestao");
    define("SIS_BD_HOST", "localhost");

}

$connection = new PDO('mysql:host=' . SIS_BD_HOST . ';dbname=' . SIS_BD_DATABASE, SIS_BD_USER, SIS_BD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
