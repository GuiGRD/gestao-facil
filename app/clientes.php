<?php
include_once("startup.php");
?>

<?php

// Dados em falta
$dados_pendentes = (isset($_GET["dado_falta"]) && $_GET["dado_falta"] != null && $_GET["dado_falta"] != "") ? $_GET["dado_falta"] : null;

$actionSecondary = '';

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $txtID          = (isset($_POST["txtID"]) && $_POST["txtID"] != null) ? $_POST["txtID"] : "";
    $txtNome        = (isset($_POST["txtNome"]) && $_POST["txtNome"] != null) ? $_POST["txtNome"] : "";
    $txtCpf         = (isset($_POST["txtCpf"]) && $_POST["txtCpf"] != null) ? $_POST["txtCpf"] : NULL;
    $txtNasc        = (isset($_POST["txtNasc"]) && $_POST["txtNasc"] != null) ? $_POST["txtNasc"] : NULL;
    $txtTelefone    = (isset($_POST["txtTelefone"]) && $_POST["txtTelefone"] != null) ? $_POST["txtTelefone"] : NULL;
    $txtCelular     = (isset($_POST["txtCelular"]) && $_POST["txtCelular"] != null) ? $_POST["txtCelular"] : NULL;
    $txtEmail       = (isset($_POST["txtEmail"]) && $_POST["txtEmail"] != null) ? $_POST["txtEmail"] : "";
    $slcSexo        = (isset($_POST["slcSexo"]) && $_POST["slcSexo"] != null) ? $_POST["slcSexo"] : NULL;
    $txtEndereco    = (isset($_POST["txtEndereco"]) && $_POST["txtEndereco"] != null) ? $_POST["txtEndereco"] : NULL;
    $txtBairro      = (isset($_POST["txtBairro"]) && $_POST["txtBairro"] != null) ? $_POST["txtBairro"] : NULL;
    $txtCidade      = (isset($_POST["txtCidade"]) && $_POST["txtCidade"] != null) ? $_POST["txtCidade"] : NULL;
    $txtCep         = (isset($_POST["txtCep"]) && $_POST["txtCep"] != null) ? $_POST["txtCep"] : NULL;
    $slcUf          = (isset($_POST["slcUf"]) && $_POST["slcUf"] != null) ? $_POST["slcUf"] : NULL;
    $txtComplemento         = (isset($_POST["txtComplemento"]) && $_POST["txtComplemento"] != null) ? $_POST["txtComplemento"] : "";
} else if (!isset($id)) {
    $txtID          = (isset($_GET["txtID"]) && $_GET["txtID"] != null) ? $_GET["txtID"] : "";
    $txtNome        = NULL;
    $txtCpf         = NULL;
    $txtNasc        = NULL;
    $txtTelefone    = NULL;
    $txtCelular     = NULL;
    $txtEmail       = NULL;
    $slcSexo        = NULL;
    $txtEndereco    = NULL;
    $txtBairro      = NULL;
    $txtCidade      = NULL;
    $txtCep         = NULL;
    $slcUf          = NULL;
    $txtComplemento         = null;
}

$txtID          = (isset($txtID) && $txtID != null || $txtID != "" ? $txtID : null);
$txtNome        = (isset($txtNome) && $txtNome != null || $txtNome != "" ? $txtNome : null);
$txtCpf         = (isset($txtCpf) && $txtCpf != null || $txtCpf != "" ? $txtCpf : null);
$txtNasc        = (isset($txtNasc) && $txtNasc != null || $txtNasc != "" ? $txtNasc : null);
$txtTelefone    = (isset($txtTelefone) && $txtTelefone != null || $txtTelefone != "" ? $txtTelefone : null);
$txtCelular     = (isset($txtCelular) && $txtCelular != null || $txtCelular != "" ? $txtCelular : null);
$txtEmail       = (isset($txtEmail) && $txtEmail != null || $txtEmail != "" ? $txtEmail : null);
$slcSexo        = (isset($slcSexo) && $slcSexo != null || $slcSexo != "" ? $slcSexo : null);
$txtEndereco    = (isset($txtEndereco) && $txtEndereco != null || $txtEndereco != "" ? $txtEndereco : null);
$txtBairro      = (isset($txtBairro) && $txtBairro != null || $txtBairro != "" ? $txtBairro : null);
$txtCidade      = (isset($txtCidade) && $txtCidade != null || $txtCidade != "" ? $txtCidade : null);
$txtCep         = (isset($txtCep) && $txtCep != null || $txtCep != "" ? $txtCep : null);
$slcUf          = (isset($slcUf) && $slcUf != null || $slcUf != "" ? $slcUf : null);
$txtComplemento         = (isset($txtComplemento) && $txtComplemento != null || $txtComplemento != "" ? $txtComplemento : null);

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST["action"]) && $_REQUEST["action"] == "atualizar" && $txtID != "") {
    try {
        $stmt = $connection->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->bindParam(1, $txtID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);

            $txtID          = $rs->id;
            $txtNome        = $rs->nome;
            $txtCpf         = $rs->cpf;
            $txtNasc        = Format::formatData2Visivel($rs->nasc);
            $txtTelefone    = $rs->telefone;
            $txtCelular     = $rs->celular;
            $txtEmail       = $rs->email;
            $slcSexo        = $rs->sexo;
            $txtEndereco    = $rs->endereco;
            $txtBairro      = $rs->bairro;
            $txtCidade      = $rs->cidade;
            $txtCep         = $rs->cep;
            $slcUf          = $rs->uf;
            $txtComplemento = $rs->complemento;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

    $actionSecondary = 'atualizar';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo SIS_CONFIG_NOME_EXT . ' - '; ?>Dashboard</title>
    <?php include_once("../inc/inc-head.php"); ?>
    <link href="<?php echo SIS_CONFIG_URL; ?>assets/css/style.css?no-cache=<?php echo date('His'); ?>" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container-principal">
        <?php include_once("../inc/inc-menu.php"); ?>
        <!-- Main-->
        <div class="main">
            <?php include_once("../inc/inc-navbar.php"); ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Cadastro de Clientes</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="<?php echo SIS_CONFIG_PATH_CONTROLLER; ?>ClienteController.php?action=salvar">
                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $txtID; ?>">
                            <input type="hidden" id="actionSecondary" name="actionSecondary" value="<?php echo $actionSecondary; ?>">

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="txtNome" class="fieldRequired" title="Dado obrigatório">Nome <sup id="teste">*</sup></label>
                                    <input type="text" class="form-control form-control-user" id="txtNome" placeholder="" name="txtNome" required value="<?php echo $txtNome; ?>" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <label for="txtCpf" class="fieldRequired">CPF</label>
                                    <input type="text" class="form-control form-control-user formatCPF" id="txtCpF" placeholder="" autocomplete="off" name="txtCpf" value="<?php echo $txtCpf; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label for="txtNasc" class="fieldRequired">Data de nascimento</label>
                                    <input type="text" class="form-control form-control-user formatData dtpData" id="txtNasc" placeholder="" name="txtNasc" value="<?php echo $txtNasc; ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="slcSexo" class="fieldRequired" title="Dado obrigatório">Sexo <sup>*</sup></label>
                                    <select name="slcSexo" id="slcSexo" required class="form-control form-control-user">
                                        <option value=""></option>
                                        <?php echo Functions::createSelectOptions2Array(Arrays::arraySexo(), $slcSexo); ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="txtEndereco">Endereço</label>
                                    <input type="text" class="form-control form-control-user" id="txtEndereco" placeholder="" name="txtEndereco" value="<?php echo $txtEndereco; ?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="txtBairro">Bairro</label>
                                    <input type="text" class="form-control form-control-user" id="txtBairro" placeholder="" name="txtBairro" value="<?php echo $txtBairro; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="txtCidade">Cidade</label>
                                    <input type="text" class="form-control form-control-user" id="txtCidade" placeholder="" name="txtCidade" value="<?php echo $txtCidade; ?>">
                                </div>
                                <div class="col-sm-1">
                                    <label for="slcUf">UF</label>
                                    <select name="slcUf" id="slcUf" class="form-control form-control-user">
                                        <option value=""></option>
                                        <?php echo Functions::createSelectOptions2Array(Arrays::arrayUF(), $slcUf); ?>
                                    </select>
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="txtCep">CEP</label>
                                    <input type="text" class="form-control form-control-user formatCEP" id="txtCep" placeholder="" name="txtCep" value="<?php echo $txtCep; ?>">
                                </div>
                                <div class="col-sm-5">
                                    <label for="txtComplemento" class="fieldRequired">Complemento</label>
                                    <input type="text" class="form-control form-control-user" id="txtComplemento" name="txtComplemento" maxlength="25" value="<?php echo $txtComplemento; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="txtTelefone">Telefone <sup id="teste">*</sup></label>
                                    <input type="text" class="form-control form-control-user formatPhone" id="txtTelefone" placeholder="" autocomplete="off" name="txtTelefone" value="<?php echo $txtTelefone; ?>">
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtCelular">Celular <sup id="teste">*</sup></label>
                                    <input type="tel" class="form-control form-control-user formatPhone" id="txtCelular" placeholder="" autocomplete="off" name="txtCelular" value="<?php echo $txtCelular; ?>">
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="txtEmail" title="Dado obrigatório">E-mail <sup>*</sup></label>
                                    <input type="email" class="form-control form-control-user" id="txtEmail" placeholder="" name="txtEmail" required value="<?php echo $txtEmail; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-6 mt-3 col-btn-action">
                                    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "atualizar" && $txtID != '' && !is_null($txtID) && $txtID && (int)$txtID > 0) : ?>
                                        <input class="btn btn-secondary btn-user actVoltar" type="button" value="Voltar" data-url="<?php echo SIS_CONFIG_URL_APP; ?>produtos.php" />
                                        <input class="btn btn-danger btn-user actExcluirPadrao" type="button" value="Excluir" data-url="<?php echo SIS_CONFIG_PATH_CONTROLLER; ?>ClienteController.php?action=deletar&txtID=<?php echo $txtID; ?>" />
                                    <?php else : ?>
                                        <input class="btn btn-secondary btn-user" type="reset" value="Limpar" />
                                    <?php endif; ?>
                                    <input class="btn btn-primary btn-user" type="submit" value="Salvar" />
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS - INI -->
        <?php include_once("../inc/inc-js.php"); ?>

        <!-- Abaixo codigo para instalar o os icones do site ionicons https://ionic.io/ionicons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!--Codigo para instalar o charts. No site Chart.js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            // MenuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');

            toggle.onclick = function() {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }

            // add hovered class in selected list item
            let list = document.querySelectorAll('.navigation li');

            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'));
                this.classList.add('hovered');
            }
            list.forEach((item) =>
                item.addEventListener('mouseover', activeLink));
        </script>
</body>

</html>