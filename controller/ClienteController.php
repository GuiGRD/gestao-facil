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

  $txtID              = $_POST['txtID'];
  $txtNome            = $_POST['txtNome'];
  $txtCpf             = $_POST['txtCpf'];
  $txtNasc            = $_POST['txtNasc'];
  $txtTelefone        = $_POST['txtTelefone'];
  $txtCelular         = $_POST['txtCelular'];
  $txtEmail           = $_POST['txtEmail'];
  $slcSexo            = $_POST['slcSexo'];
  $txtCidade          = $_POST['txtCidade'];
  $txtEndereco        = $_POST['txtEndereco'];
  $txtBairro          = $_POST['txtBairro'];
  $slcUf              = $_POST['slcUf'];
  $txtCep             = $_POST['txtCep'];
  $txtComplemento     = $_POST['txtComplemento'];

  $actionSecondary    = $_POST['actionSecondary'];
  $now                = Functions::now2Sql();

  // URL de retorno

  if ($actionSecondary == "atualizar" && $txtID != '' && !is_null($txtID) && $txtID && (int)$txtID > 0) {
    $returnURL = SIS_CONFIG_URL_APP . "clientes.php?action=atualizar&txtID=" . $txtID;
  } else $returnURL = SIS_CONFIG_URL_APP . "clientes.php";

  // Validações

  if ($txtNome == '' || is_null($txtNome) || !$txtNome) {
    Functions::return($returnURL, E1002);
  }

  // if ($txtCpf == '' || is_null($txtCpf) || !$txtCpf) {
  //     Functions::return($returnURL, E1018);
  // }

  // if ($txtNasc == '' || is_null($txtNasc) || !$txtNasc) {
  //     Functions::return($returnURL, E1019);
  // } else {
  //     $txtNasc = Format::formatData2Sql($txtNasc);
  // }

  if ($slcSexo == '' || is_null($slcSexo) || !$slcSexo) {
    Functions::return($returnURL, E1066);
  }

  // if ($txtCidade == '' || is_null($txtCidade) || !$txtCidade) {
  //     Functions::return($returnURL, E1012);
  // }

  if ($txtTelefone == '' || is_null($txtTelefone) || !$txtTelefone) {
    if ($txtCelular == '' || is_null($txtCelular) || !$txtCelular) Functions::return($returnURL, E0029);
  }

  if ($txtCelular == '' || is_null($txtCelular) || !$txtCelular) {
    if ($txtTelefone == '' || is_null($txtTelefone) || !$txtTelefone) Functions::return($returnURL, E0030);
  }

  if ($txtEmail == '' || is_null($txtEmail) || !$txtEmail) {
    Functions::return($returnURL, E1004);
  }

  // Validar se cliente já existe

  if ($txtCpf != '' && !is_null($txtCpf)) {
    if ($txtID == "") {
      $countCPF = 0;
      $stmt = $connection->prepare("SELECT COUNT(*) AS COUNT FROM clientes A WHERE A.cpf LIKE :cpf");
      $stmt->execute(array('cpf' => $txtCpf));
      while ($row = $stmt->fetch()) $countCPF = (int)$row['COUNT'];

      if ($countCPF > 0) Functions::return($returnURL, "CPF em duplicidade. Esse cliente já existe na base de dados");
    }
  }

  // Tratamentos

  $txtNasc = Format::formatData2Sql($txtNasc);

  // SQL

  try {
    if ($txtID != "") {
      $stmt = $connection->prepare("UPDATE clientes SET nome=?, cpf=?, nasc=?, cidade=?, telefone=?, celular=?, email=?, tms_atualizacao=?, sexo=?, endereco=?, bairro=?, cep=?, uf=?, complemento=? WHERE id = ?");

      $stmt->bindParam(1, $txtNome);
      $stmt->bindParam(2, $txtCpf);
      $stmt->bindParam(3, $txtNasc);
      $stmt->bindParam(4, $txtCidade);
      $stmt->bindParam(5, $txtTelefone);
      $stmt->bindParam(6, $txtCelular);
      $stmt->bindParam(7, $txtEmail);
      $stmt->bindParam(8, $now);
      $stmt->bindParam(9, $slcSexo);
      $stmt->bindParam(10, $txtEndereco);
      $stmt->bindParam(11, $txtBairro);
      $stmt->bindParam(12, $txtCep);
      $stmt->bindParam(13, $slcUf);
      $stmt->bindParam(14, $txtComplemento);
      $stmt->bindParam(15, $txtID);
    } else {
      $stmt = $connection->prepare("INSERT INTO clientes (nome, cpf, nasc, cidade, telefone, celular, email, tms_cadastro, sexo, endereco, bairro, cep, uf, complemento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

      $stmt->bindParam(1, $txtNome);
      $stmt->bindParam(2, $txtCpf);
      $stmt->bindParam(3, $txtNasc);
      $stmt->bindParam(4, $txtCidade);
      $stmt->bindParam(5, $txtTelefone);
      $stmt->bindParam(6, $txtCelular);
      $stmt->bindParam(7, $txtEmail);
      $stmt->bindParam(8, $now);
      $stmt->bindParam(9, $slcSexo);
      $stmt->bindParam(10, $txtEndereco);
      $stmt->bindParam(11, $txtBairro);
      $stmt->bindParam(12, $txtCep);
      $stmt->bindParam(13, $slcUf);
      $stmt->bindParam(14, $txtComplemento);
    }

    if ($stmt->execute()) {

      $returnMessage = "Nenhum dado alterado";
      if ($stmt->rowCount() > 0) {
        if ($actionSecondary == "atualizar") $returnMessage = "Dados atualizados com sucesso";
        else $returnMessage = "Dados cadastrados com sucesso";
      } else {
        if ($txtID != "") $returnMessage = "Nenhum dado alterado";
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
if ($action == "salvar" && $method != 'POST') Functions::return(SIS_CONFIG_URL_APP . "clientes.php", "Acesso inválido");

// // ------------------------------------------------------------------------
// // ClienteController?action=atualizar

// if ($action == "atualizar") {

//   // Vars

//   $txtID = $_REQUEST['txtID'];

//   // URL de retorno
  
//   $returnURL = SIS_CONFIG_URL_APP . "clientes.php";

//   // Validações

//   if ($txtID == '' || is_null($txtID) || !$txtID || (int)$txtID == 0) {
//       Functions::return($returnURL, E0004);
//   }

//   // SQL

//   try {
//       $stmt = $connection->prepare("SELECT * FROM clientes WHERE id = ?");
//       $stmt->bindParam(1, $txtID, PDO::PARAM_INT);

//       if ($stmt->execute()) {
//           $rs     = $stmt->fetch(PDO::FETCH_OBJ);
//           $txtID  = $rs->id;
          
//           Functions::redirect(SIS_CONFIG_URL_APP . "clientes.php?action=atualizar&txtID=". $txtID);
//       } else {
//           throw new PDOException("Erro: Não foi possível executar a declaração sql");
//           Functions::return($returnURL, E0022);
//       }
//   } catch (PDOException $erro) {
//       echo "Erro: ".$erro->getMessage();
//       Functions::return($returnURL, E0022);
//   }
// }

// // ------------------------------------------------------------------------
// // ClienteController?action=deletar

// if ($action == "deletar") {

//   // Vars

//   $txtID = $_REQUEST['txtID'];

//   // URL de retorno
  
//   $returnURL = SIS_CONFIG_URL_APP . "clientes.php";

//   // Validações
  
//   if ($txtID == '' || is_null($txtID) || !$txtID || (int)$txtID == 0) {
//       Functions::return($returnURL, E0004);
//   }

//   // SQL

//   try {
//       $stmt = $connection->prepare("DELETE FROM clientes WHERE id = ?");
//       $stmt->bindParam(1, $txtID, PDO::PARAM_INT);
      
//       if ($stmt->execute()) {
//           Functions::return($returnURL, E0005);
//       } else {
//           throw new PDOException("Erro: Não foi possível executar a declaração sql");
//           Functions::return($returnURL, E0022);
//       }
//   } catch (PDOException $erro) {
//       echo "Erro: ".$erro->getMessage();
//       Functions::return($returnURL, E0022);
//   }
// }

// // ------------------------------------------------------------------------
// // ClienteController?action=consultarClientes2JSON

// if ($action == "consultarClientes2JSON") {

//   // Vars

//   $clientes  = array();
//   $status    = 0;
//   $unidade   = (isset($_REQUEST["unidade"]) ? $_REQUEST['unidade'] : '');
  
//   // SQL

//   $arrParams = array();
//   $arrParams['unidade'] = $unidade;
  
//   $SQL = "SELECT F.* FROM franquias F INNER JOIN franquias_propria_relacao FP ON F.id = FP.id_unidade WHERE F.ativo = 'S' AND F.id NOT IN (1,2,3) ORDER BY F.nome ASC;";
//   $i = 0;
//   try {
//       $stmt = $connection->prepare($SQL);
      
//       if ($stmt->execute()) {
//           while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
//               $i++;
//               $arrUnidadesProprias[$i] = $rs->id;
          
//           }
//       } else echo "Erro: Não foi possível recuperar os dados do banco de dados";
//   } catch (PDOException $erro) {
//       echo "Erro: ".$erro->getMessage();
//   }


//   $sqlConcatAllUnity = Functions::returnSqlUnidade($unidade, "CL.unidade", $arrUnidadesProprias);

//   try {
//       $SQL = "SELECT CL.id, CL.nome FROM clientes CL WHERE 1=1 $sqlConcatAllUnity ORDER BY CL.nome ASC; ";
     
//       $stmt = $connection->prepare($SQL);
      
//       if ($stmt->execute($arrParams)) {
//           $itens = $stmt->fetchAll();
//           foreach ($itens as $item) {
//               $id     = $item['id'];
//               $nome   = $item['nome'];

//               $clientes[] = array(
//                   'id'    => $id,
//                   'nome'  => $nome,
//               );

//               $status = 1;
//           }
//       } else {
//           throw new PDOException("Erro: Não foi possível executar a declaração sql");
//       }
//   } catch (PDOException $erro) {
//       echo "Erro: " . $erro->getMessage();
//   }

//   $returnData = array(
//       "success"   => $status,	
//       "result"    => $clientes,
//   );
//   echo json_encode($returnData);
//   exit;
// }
