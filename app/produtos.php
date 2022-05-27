<?php
include_once("startup.php");
?>

<?php

$actionSecondary = '';

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $txtID           = (isset($_POST["txtID"]) && $_POST["txtID"] != null) ? $_POST["txtID"] : "";
    $txtDescrica     = (isset($_POST["txtDescricao"]) && $_POST["txtDescricao"] != null) ? $_POST["txtDescricao"] : "";
    $vlrUni_med      = (isset($_POST["vlrUni_med"]) && $_POST["vlrUni_med"] != null) ? $_POST["vlrUni_med"] : "";
    
    $vlrPreco = (isset($_POST["vlrPreco"]) && $_POST["vlrPreco"] != null) ? $_POST["vlrPreco"] : "";
} else if (!isset($txtID)) {
    $txtID             = (isset($_GET["txtID"]) && $_GET["txtID"] != null) ? $_GET["txtID"] : "";
    $txtDescricao      = null;
    $vlrUni_med        = 'UN';
    $vlrPreco          = null;
}

$txtID           = (isset($txtID) && $txtID != null || $txtID != "" ? $txtID : null);
$txtDescricao    = (isset($txtDescricao) && $txtDescricao != null || $txtDescricao != "" ? $txtDescricao : null);
$vlrUni_med      = (isset($vlrUni_med) && $vlrUni_med != null || $vlrUni_med != "" ? $vlrUni_med : null);
$vlrPreco = (isset($vlrPreco) && $vlrPreco != null || $vlrPreco != "" ? $vlrPreco : null);

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST["action"]) && $_REQUEST["action"] == "atualizar" && $txtID != "") {
    try {
        $stmt = $connection->prepare("SELECT * FROM produtos WHERE prod_id = ?");
        $stmt->bindParam(1, $txtID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);

            $txtID               = $rs->prod_id;
            $txtDescricao        = $rs->prod_nome;
            $vlrUni_med          = $rs->prod_unid_medida;
            $vlrPreco            = $rs->prod_preco;
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
                    <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Cadastro de Produtos</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="<?php echo SIS_CONFIG_PATH_CONTROLLER; ?>ProdutoController.php?action=salvar">
                            <input type="hidden" id="txtID" name="txtID" value="<?php echo $txtID; ?>">
                            <input type="hidden" id="actionSecondary" name="actionSecondary" value="<?php echo $actionSecondary; ?>">

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-3">
                                    <label for="txtDescricao">Descrição</label>
                                    <input type="text" class="form-control form-control-user" id="txtDescricao" placeholder="" name="txtDescricao" value="">
                                    <!-- <?php echo $txtDescricao; ?> -->
                                </div>
                                <div class="col-sm-3">
                                    <label for="vlrUni_med">Unidade de Medida</label>
                                    <select name="vlrUni_med" id="vlrUni_med" class="form-control form-control-user">
                                        <option value=""></option>
                                        <?php echo Functions::createSelectOptions2Array(Arrays::arrayUnidadeMedida(), $vlrUni_med); ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="vlrPreco">Valor</label>
                                    <input type="text" class="form-control form-control-user formatMoeda" id="vlrPreco" placeholder="" name="vlrPreco" value="<?php echo Format::formatMoeda2Input($vlrPreco); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-6 mt-3 col-btn-action">
                                    <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "atualizar" && $txtID != '' && !is_null($txtID) && $txtID && (int)$txtID > 0) : ?>
                                        <input class="btn btn-secondary btn-user actVoltar" type="button" value="Voltar" data-url="<?php echo SIS_CONFIG_URL_APP; ?>produtos.php" />
                                        <input class="btn btn-danger btn-user actExcluirPadrao" type="button" value="Excluir" data-url="<?php echo SIS_CONFIG_PATH_CONTROLLER; ?>ProdutoController.php?action=deletar&txtID=<?php echo $txtID; ?>" />
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