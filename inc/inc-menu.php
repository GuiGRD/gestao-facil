<?php include_once("../config/app.php"); ?>

<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="cash-outline"></ion-icon>
                </span>
                <span class="title">Gestão Fácil</span>
            </a>
        </li>
        <li>
            <a href="<?php echo SIS_CONFIG_URL_APP; ?>index.php">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo SIS_CONFIG_URL_APP; ?>clientes.php">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Clientes</span>
            </a>
        </li>
        <li>
            <a href="<?php echo SIS_CONFIG_URL_APP; ?>produtos.php">
                <span class="icon">
                    <ion-icon name="file-tray-stacked-outline"></ion-icon>
                </span>
                <span class="title">Produtos</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">Usuários</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="cash-outline"></ion-icon>
                </span>
                <span class="title">Vendas</span>
            </a>
        </li>
    </ul>
</div>