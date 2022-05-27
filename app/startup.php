<?php

// Inicia session

// if (!isset($_SESSION)) {
//     $sessionTime = 3600 * 8; // 3600 = 1 hour
//     ini_set('session.gc_maxlifetime', $sessionTime); // server should keep session data for AT LEAST sessionTime
//     session_set_cookie_params($sessionTime); // each client should remember their session id for EXACTLY sessionTime
//     session_start();
// }

// Includes

include_once("../config/app.php");
include_once("../config/db.php");
// include_once("../config/security.php");
include_once("../inc/inc-imports.php");

// // Captura dados do usuário logado

// $sessionUsuario             = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN"];
// $sessionUsuarioID           = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_ID"];
// $sessionUsuarioUnidade      = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE"];
// $sessionUsuarioUnidadeNome  = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NOME"];
// $sessionUsuarioNivel        = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL"];
// $sessionUsuarioNivelAcesso  = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"];
// $sessionUsuarioNome         = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NOME"];
// $sessionHabilitacaoNF       = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NF"];
// $sessionHabilitacaoNFs      = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NFS"];
// $sessionHabilitacaoNFc      = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NFC"];
// $sessionPermissoesAcesso    = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_PERMISSOES_ACESSO"];
// $sessionResponsavel         = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_USUARIO_RESPONSAVEL"];

// // ---------------------------------------------------------------------------------------------------
// // VALIDAÇÃO DE ACESSO

// function invalidarAcesso()
// {
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_ID"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_ID"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NOME"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_UNIDADE_NOME"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"]);
//     if (isset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NOME"])) unset($_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NOME"]);
//     if (isset($_SESSION)) unset($_SESSION);
//     header("Location:" . SIS_CONFIG_URL . "acesso-invalido.php");
// }

// function validarAcessoTotal()
// {
//     /*
//         FRANQUEADORA - S (Sim) ou N (Não)
//     */

//     $sessionUsuarioNivelAcesso = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"];
//     $nivel = "FRANQUEADORA";
    
//     if (count($sessionUsuarioNivelAcesso) > 0) {
//         if (array_key_exists($nivel, $sessionUsuarioNivelAcesso)) {
//             if ($sessionUsuarioNivelAcesso[$nivel] == 'N') return false;
//         } else return false;
//     } else return false;

//     return true;
// }

// function validarAcessoFranqueadora()
// {
//     /*
//         UNIDADE         - Unidade
//         FRANQUEADORA    - Franqueadora
//         ADMINISTRATIVO  - Administrativo
//         FINANCEIRO      - Financeiro
//         RELATORIO       - Relatórios
//         BI              - Business Intelligence
//         CEO             - Chief Executive Officer
//     */

//     $sessionUsuarioNivelAcesso = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"];
    
//     $nivel_1 = "FINANCEIRO";
//     $nivel_2 = "RELATORIO";
//     $nivel_3 = "BI";
//     $nivel_4 = "CEO";

//     $retorno = false;
    
//     if (count($sessionUsuarioNivelAcesso) > 0) {
//         if (array_key_exists($nivel_1, $sessionUsuarioNivelAcesso) && array_key_exists($nivel_2, $sessionUsuarioNivelAcesso) && array_key_exists($nivel_3, $sessionUsuarioNivelAcesso) && array_key_exists($nivel_4, $sessionUsuarioNivelAcesso)) {
//             if ($sessionUsuarioNivelAcesso[$nivel_1] == 'S' || $sessionUsuarioNivelAcesso[$nivel_2] == 'S' || $sessionUsuarioNivelAcesso[$nivel_3] == 'S' || $sessionUsuarioNivelAcesso[$nivel_4] == 'S') {
//                 $retorno = true;
//             }
//         }
//     }

//     return $retorno;
// }

// function validarAcessoPagina2Nivel($nivel)
// {
//     /*
//         UNIDADE         - Unidade
//         FRANQUEADORA    - Franqueadora
//         ADMINISTRATIVO  - Administrativo
//         FINANCEIRO      - Financeiro
//         RELATORIO       - Relatórios
//         BI              - Business Intelligence
//         CEO             - Chief Executive Officer
//     */
    
//     $sessionUsuarioNivelAcesso = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"];
    
//     if (count($sessionUsuarioNivelAcesso) > 0) {
//         if (array_key_exists($nivel, $sessionUsuarioNivelAcesso)) {
//             if ($sessionUsuarioNivelAcesso[$nivel] == 'N') invalidarAcesso();
//         } else invalidarAcesso();
//     } else invalidarAcesso();
// }

// function validarAcesso2Nivel($nivel)
// {
//     /*
//         UNIDADE         - Unidade
//         FRANQUEADORA    - Franqueadora
//         ADMINISTRATIVO  - Administrativo
//         FINANCEIRO      - Financeiro
//         RELATORIO       - Relatórios
//         BI              - Business Intelligence
//         CEO             - Chief Executive Officer
//     */
    
//     $sessionUsuarioNivelAcesso = $_SESSION[SIS_CONFIG_NOME_ABR . "_SIS_LOGIN_NIVEL_ACESSO"];

//     if (count($sessionUsuarioNivelAcesso) > 0) {
//         if (array_key_exists($nivel, $sessionUsuarioNivelAcesso)) {
//             if ($sessionUsuarioNivelAcesso[$nivel] == 'N') return false;
//         } else return false;
//     } else return false;
    
//     return true;
// }

// // Função para validar acesso do usuário

// function validaAcessoUsuario($id)
// {
//     /*
//     1231     => maistop.financeiro.teste
//     24     => maistop.caroline
//     22     => maistop.fernando
//     1106     => maistop.karla
//     26     => maistop.mariane
//     23     => maistop.vanessa
//     1095     => bruno
//     */

//     $arrId = array(1231, 24, 22, 1106, 26, 23, 1095);
//     if(in_array($id, $arrId)) return true;
// }

// function getAlertas($connection = null, $idUnidade = null)
// {
//     $arrAlertas = array();

//     if (is_null($connection) || $connection == '') return array();
//     if (is_null($idUnidade) || $idUnidade == '') return array();

//     $arrParam = array(
//         'idUnidade' => $idUnidade,
//         'flgStatus' => 'A',
//     );

//     $SQL = "";
//     $SQL.= "SELECT ";
//     $SQL.= "AL.id AS id_alerta, AL.flg_relacao, AL.flg_tipo, AL.tms_data AS data, AL.titulo, AL.descricao, ";
//     $SQL.= "AL_R.id AS id_alerta_r, AL_R.tms_data AS tms_data_alerta_r, AL_R.flg_aberto, AL_R.tms_aberto ";
//     $SQL.= "FROM alerta AL ";
//     $SQL.= "INNER JOIN alerta_r AL_R ON AL.id = AL_R.id_alerta AND AL_R.flg_status = :flgStatus ";
//     $SQL.= "WHERE AL.flg_status = :flgStatus ";
//     $SQL.= "AND AL_R.id_unidade = :idUnidade ";
//     $SQL.= "ORDER BY AL_R.tms_data DESC  ";
//     $SQL.= "; ";
    
//     try {
//         $stmt = $connection->prepare($SQL);
        
//         if ($stmt->execute($arrParam)) {
//             $arrAlertas = $stmt->fetchAll(PDO::FETCH_OBJ);
//         } else {
//             return array();
//             echo "Erro: Não foi possível recuperar os dados do banco de dados";
//         }
//     } catch (PDOException $erro) {
//         return array();
//         echo "Erro: ".$erro->getMessage();
//     }

//     return $arrAlertas;
// }
