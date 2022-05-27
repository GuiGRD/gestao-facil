<?php

// Includes
include_once("../inc/inc-imports.php");
include_once("../config/app.php");
include_once("../config/db.php");
// include_once("startup.php");

if (!isset($_REQUEST["action"])) die(E0011);
$action = $_GET['action'];
$method = $_SERVER['REQUEST_METHOD'];

// ------------------------------------------------------------------------

if ($action == "salvar" && $method == 'POST') {

  // Vars

  $txtID                = $_POST['txtID'];
  $txtDescricao         = $_POST['txtDescricao'];
  $vlrUni_med           = $_POST['vlrUni_med'];
  $vlrPreco             = $_POST['vlrPreco'];
  $actionSecondary      = $_POST['actionSecondary'];
  $now                  = Functions::now2Sql();

  // URL de retorno

  if ($actionSecondary == "atualizar" && $txtID != '' && !is_null($txtID) && $txtID && (int)$txtID > 0) {
    $returnURL = SIS_CONFIG_URL_APP . "produtos.php?action=atualizar&txtID=" . $txtID;
  } else $returnURL = SIS_CONFIG_URL_APP . "produtos.php";

  // Validações

  if ($txtDescricao == '' || is_null($txtDescricao) || !$txtDescricao) {
    Functions::return($returnURL, E1035);
  }

  if ($vlrUni_med == '' || is_null($vlrUni_med) || !$vlrUni_med) {
    Functions::return($returnURL, E1078);
  }

  if ($vlrPreco == '' || is_null($vlrPreco) || !$vlrPreco || $vlrPreco == 0) {
    Functions::return($returnURL, E1077);
  }

  // Tratamentos

  $vlrPreco         = Format::formatMoeda2Sql($vlrPreco);

  // SQL

  try {
    if ($txtID != "") {
      $txtID = (int)$txtID;
      $stmt = $connection->prepare("UPDATE produtos SET prod_nome=?, prod_unid_medida=?, prod_preco=?, prod_atualizacao=? WHERE id = ?");

      $stmt->bindParam(1, $txtDescricao);
      $stmt->bindParam(2, $vlrUni_med);
      $stmt->bindParam(3, $vlrPreco);
      $stmt->bindParam(4, $now);
      $stmt->bindParam(5, $txtID, PDO::PARAM_INT);
    } else {
      $stmt = $connection->prepare("INSERT INTO produtos (prod_nome, prod_unid_medida, prod_preco, prod_cadastro) VALUES (?, ?, ?, ?);");

      $stmt->bindParam(1, $txtDescricao);
      $stmt->bindParam(2, $vlrUni_med);
      $stmt->bindParam(3, $vlrPreco);
      $stmt->bindParam(4, $now);
    }

    if ($stmt->execute()) {

      $returnMessage = "Nenhum dado alterado";
      if ($stmt->rowCount() > 0) {
        if ($actionSecondary == "atualizar") $returnMessage = "Dados atualizados com sucesso";
        else $returnMessage = "Dados cadastrados com sucesso";
      } else {
        if ($txtID != "") $returnMessage =  "Nenhum dado alterado";
        else $returnMessage = "Erro ao tentar efetivar o cadastro";
      }

      Functions::return($returnURL, $returnMessage);
    } else {
      throw new PDOException("Erro: Não foi possível executar a declaração sql");
      Functions::return($returnURL, "Nenhuma alteração efetuada ou falha comunicação com a base de dados");
    }
  } catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
    Functions::return($returnURL, "Nenhuma alteração efetuada ou falha comunicação com a base de dados");
  }
}
if ($action == "salvar" && $method != 'POST') Functions::return(SIS_CONFIG_URL_APP . "produtos.php", "Acesso inválido");

// ------------------------------------------------------------------------
// // ProdutoController?action=atualizar

// if ($action == "atualizar") {

//   // Vars

//   $txtID = $_REQUEST['txtID'];

//   // URL de retorno

//   $returnURL = SIS_CONFIG_URL_APP . "produtos.php";

//   // Validações

//   if ($txtID == '' || is_null($txtID) || !$txtID || (int)$txtID == 0) {
//     Functions::return($returnURL, E0004);
//   }

//   // SQL

//   try {
//     $stmt = $connection->prepare("SELECT * FROM produtos WHERE id = ?");
//     $stmt->bindParam(1, $txtID, PDO::PARAM_INT);

//     if ($stmt->execute()) {
//       $rs     = $stmt->fetch(PDO::FETCH_OBJ);
//       $txtID  = $rs->id;

//       Functions::redirect(SIS_CONFIG_URL_APP . "produtos.php?action=atualizar&txtID=" . $txtID);
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//       Functions::return($returnURL, E0022);
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//     Functions::return($returnURL, E0022);
//   }
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=deletar

// if ($action == "deletar") {

//   // Vars

//   $txtID = $_REQUEST['txtID'];

//   // URL de retorno

//   $returnURL = SIS_CONFIG_URL_APP . "produtos.php";

//   // Validações

//   if ($txtID == '' || is_null($txtID) || !$txtID || (int)$txtID == 0) {
//     Functions::return($returnURL, E0004);
//   }

//   // SQL

//   try {
//     $stmt = $connection->prepare("DELETE FROM produtos WHERE id = ?");
//     $stmt->bindParam(1, $txtID, PDO::PARAM_INT);

//     if ($stmt->execute()) {
//       Functions::return($returnURL, E0005);
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//       Functions::return($returnURL, E0022);
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//     Functions::return($returnURL, E0022);
//   }
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=consultarProdutos2JSON

// if ($action == "consultarProdutos2JSON") {

//   // Vars

//   $produtos  = array();
//   $status    = 0;
//   $unidade   = (isset($_REQUEST["unidade"]) ? $_REQUEST['unidade'] : '');

//   // SQL

//   $arrParams = array();
//   $arrParams['unidade'] = $unidade;

//   try {
//     $SQL = "SELECT PR.id, PR.descricao FROM produtos PR ";
//     $stmt = $connection->prepare($SQL);

//     if ($stmt->execute($arrParams)) {
//       $itens = $stmt->fetchAll();
//       foreach ($itens as $item) {
//         $id   = $item['id'];
//         $nome = $item['descricao'];

//         $produtos[] = array(
//           'id'    => $id,
//           'nome'  => $nome,
//         );

//         $status = 1;
//       }
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//     "success"   => $status,
//     "result"    => $produtos,
//   );
//   echo json_encode($returnData);
//   exit;
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=consultarPreco2JSON

// if ($action == "consultarPreco2JSON") {

//   // Vars

//   $dados   = array();
//   $status  = 0;
//   $id      = (isset($_REQUEST["id"]) ? $_REQUEST['id'] : '');
//   $tipo_preco = (isset($_REQUEST["tipo_preco"]) ? $_REQUEST['tipo_preco'] : '');

//   // SQL

//   $arrParams = array();
//   $arrParams['id'] = $id;

//   try {
//     $SQL = "SELECT PR.id, PR.descricao, PR.preco_venda, PR.preco_venda_aprazo 
//         FROM produtos PR 
//         WHERE PR.id = :id
//         ORDER BY PR.descricao ASC ";
//     $stmt = $connection->prepare($SQL);

//     if ($stmt->execute($arrParams)) {
//       $itens = $stmt->fetchAll();
//       foreach ($itens as $item) {
//         $id    = $item['id'];
//         $nome  = $item['descricao'];

//         if ($tipo_preco == "a_prazo") $preco = $item['preco_venda_aprazo'];
//         else $preco = $item['preco_venda'];

//         $dados[] = array(
//           'id'    => $id,
//           'nome'  => $nome,
//           'preco' => str_replace("R$ ", "", Format::formatMoeda2Visivel($preco)),
//         );

//         $status = 1;
//       }
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//     "success"   => $status,
//     "result"    => $dados,
//   );
//   echo json_encode($returnData);
//   exit;
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=consultarPrecoVenda2JSON

// if ($action == "consultarPrecoVenda2JSON") {

//   // Vars

//   $dados   = array();
//   $status  = 0;
//   $id      = (isset($_REQUEST["id"]) ? $_REQUEST['id'] : '');
//   $tipo_preco = (isset($_REQUEST["tipo_preco"]) ? $_REQUEST['tipo_preco'] : '');

//   // SQL

//   $arrParams = array();
//   $arrParams['id'] = $id;

//   try {
//     $SQL = "SELECT PR.id, PR.descricao, PR.preco_venda, PR.preco_venda_aprazo, PR.preco_venda_cliente 
//         FROM produtos PR 
//         WHERE PR.id = :id
//         ORDER BY PR.descricao ASC ";
//     $stmt = $connection->prepare($SQL);

//     if ($stmt->execute($arrParams)) {
//       $itens = $stmt->fetchAll();
//       foreach ($itens as $item) {
//         $id    = $item['id'];
//         $nome  = $item['descricao'];

//         if ($tipo_preco == "a_prazo") $preco = $item['preco_venda_aprazo'];
//         else $preco = $item['preco_venda'];

//         $preco = $item['preco_venda_cliente']; // preco de venda

//         $dados[] = array(
//           'id'    => $id,
//           'nome'  => $nome,
//           'preco' => str_replace("R$ ", "", Format::formatMoeda2Visivel($preco)),
//         );

//         $status = 1;
//       }
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//     "success"   => $status,
//     "result"    => $dados,
//   );
//   echo json_encode($returnData);
//   exit;
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=consultarProdutosTipoPreco2JSON

// if ($action == "consultarProdutosTipoPreco2JSON") {

//   // Vars

//   $produtos   = array();
//   $status     = 0;
//   $tipo_preco = (isset($_REQUEST["tipo_preco"]) ? $_REQUEST['tipo_preco'] : '');

//   // SQL

//   try {
//     $SQL = "";

//     if ($tipo_preco == "a_prazo") {
//       $SQL = "SELECT PR.id, PR.descricao, PR.preco_venda_aprazo AS preco 
//             FROM produtos PR
//             WHERE flg_compra = 'S' 
//             GROUP BY PR.id, PR.descricao
//             ORDER BY PR.descricao ASC ";
//     } else {
//       $SQL = "SELECT PR.id, PR.descricao, PR.preco_venda AS preco 
//             FROM produtos PR
//             WHERE flg_compra = 'S'
//             GROUP BY PR.id, PR.descricao
//             ORDER BY PR.descricao ASC ";
//     }

//     $stmt = $connection->prepare($SQL);

//     if ($stmt->execute()) {
//       $itens = $stmt->fetchAll();
//       foreach ($itens as $item) {
//         $id     = $item['id'];
//         $nome   = $item['descricao'];
//         $preco  = $item['preco'];

//         $produtos[] = array(
//           'id'                => $id,
//           'nome'              => $nome,
//           'preco'             => $preco,
//           'preco_formatado'   => Format::formatMoeda2Visivel($preco),
//         );

//         $status = 1;
//       }
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//     "success"   => $status,
//     "result"    => $produtos,
//   );
//   echo json_encode($returnData);
//   exit;
// }

// // ------------------------------------------------------------------------
// // ProdutoController?action=consultarProdutosVenda2JSON

// if ($action == "consultarProdutosVenda2JSON") {

//   // Vars

//   $produtos  = array();
//   $status    = 0;

//   // SQL

//   try {
//     $SQL = "SELECT PR.id, PR.descricao, PR.preco_venda_cliente
//                 FROM produtos PR
//                 WHERE preco_venda_cliente IS NOT NULL 
//                 AND preco_venda_cliente > 0 
//                 AND flg_venda = 'S'
//                 GROUP BY PR.id, PR.descricao
//                 ORDER BY PR.descricao ASC; ";
//     $stmt = $connection->prepare($SQL);

//     if ($stmt->execute()) {
//       $itens = $stmt->fetchAll();
//       foreach ($itens as $item) {
//         $id   = $item['id'];
//         $nome = $item['descricao'];
//         $preco = $item['preco_venda_cliente'];

//         $produtos[] = array(
//           'id'    => $id,
//           'nome'  => $nome . ' (' . Format::formatMoeda2Visivel($preco) . ')',
//         );

//         $status = 1;
//       }
//     } else {
//       throw new PDOException("Erro: Não foi possível executar a declaração sql");
//     }
//   } catch (PDOException $erro) {
//     echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//     "success"   => $status,
//     "result"    => $produtos,
//   );
//   echo json_encode($returnData);
//   exit;
// }

// ------------------------------------------------------------------------