<?php 

// ------------------------------------------------------------------------
// CONFIGURAÇÕES GERAIS

header('Content-Type: text/html; charset=utf-8');
ini_set("default_charset", "UTF-8");
ini_set('upload_max_filesize', '300M');
ini_set('post_max_size', '300M');
date_default_timezone_set("America/Sao_Paulo");

// ------------------------------------------------------------------------
// CONFIGURAÇÕES DE SISTEMA

define("SIS_CONFIG_LOCALHOST", (preg_match("/localhost|[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/", $_SERVER['HTTP_HOST']) ? true : false));

if (SIS_CONFIG_LOCALHOST) {
    define("SIS_CONFIG_ENV", "localhost");
	error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

define("SIS_CONFIG_NOME", "GF");
// define("SIS_CONFIG_NOME_EXT", "[HOMOLOGAÇÃO] PLUS - Gestão e Tecnologia");
define("SIS_CONFIG_NOME_EXT", "GF - Gestão Fácil");
define("SIS_CONFIG_NOME_ABR", "GF");

// ------------------------------------------------------------------------
// TAMANHO ARQUIVO UPLOAD

define("SIS_CONFIG_SIZE_FILE_UPLOAD", 10000000);
// ------------------------------------------------------------------------

// CONFIGURAÇÕES DE URLS E PATHS

if (SIS_CONFIG_LOCALHOST) {
    define("SIS_CONFIG_PROTOCOL", "http://");
    define("SIS_CONFIG_PATH", str_replace("\\", "/", str_replace("config", "", dirname(__FILE__))));
    define("SIS_CONFIG_DOMAIN", $_SERVER['HTTP_HOST']);
    define("SIS_CONFIG_URL", SIS_CONFIG_PROTOCOL . SIS_CONFIG_DOMAIN . "/gestao-facil/");
    define("SIS_CONFIG_URL_APP", SIS_CONFIG_URL . "app/");
}
define("SIS_CONFIG_PATH_CONTROLLER", SIS_CONFIG_URL . "controller/");

// ------------------------------------------------------------------------
// CONFIGURAÇÕES DE URLS E PATHS

// define("SIS_CONFIG_SMTP_HOST", "mail.maistopestetica.com.br");
// define("SIS_CONFIG_SMTP_USER", "sistema@maistopestetica.com.br");
// define("SIS_CONFIG_SMTP_PASSWORD", "MAISTOP#2021");
// define("SIS_CONFIG_SMTP_AUTH", true);
// define("SIS_CONFIG_SMTP_FROM_MAIL", "sistema@maistopestetica.com.br");
// define("SIS_CONFIG_SMTP_FROM_NAME", SIS_CONFIG_NOME_EXT);

// if (SIS_CONFIG_LOCALHOST) {
//     define("SIS_CONFIG_EMAIL_PEDIDOS", "sistema@maistopestetica.com.br");
//     define("SIS_CONFIG_EMAIL_PEDIDOS_CCO", "rodrigo@maistopestetica.com.br");
//     define("SIS_CONFIG_EMAIL_PEDIDOS_CCO_2", "rodrigo@maistopestetica.com.br");
// } else {
//     define("SIS_CONFIG_EMAIL_PEDIDOS", "sistema@maistopestetica.com.br");
//     define("SIS_CONFIG_EMAIL_PEDIDOS_CCO", "leticianeves@maistopestetica.com.br");
//     define("SIS_CONFIG_EMAIL_PEDIDOS_CCO_2", "raquelpatricia@maistopestetica.com.br");
// }
