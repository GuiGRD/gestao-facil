<?php

// Inicia session

if (!isset($_SESSION)) {
    $sessionTime = 3600 * 8; // 3600 = 1 hour
    ini_set('session.gc_maxlifetime', $sessionTime); // server should keep session data for AT LEAST sessionTime
    session_set_cookie_params($sessionTime); // each client should remember their session id for EXACTLY sessionTime
    session_start();
}

// Includes

include_once("app.php");
include_once("messages.php");

// Validar login na sessão

$isLogged = ($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN"] ? $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN"] : "");
$isLogged_Unidade = ($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE"] ? $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE"] : "");

if (!isset($isLogged) || $isLogged == "" || !isset($isLogged_Unidade) || $isLogged_Unidade == "") {
    header("Location:" . SIS_CONFIG_URL . "acesso-invalido.php");
}
