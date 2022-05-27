<?php
    include_once("startup.php"); 
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

                <!--Cards-->
                <div class="cardBox">
                    <div class="card">
                        <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                        <div class="iconBx">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>
                    </div>
                                    
                    <div class="card">
                        <div>
                            <div class="numbers">80</div>
                            <div class="cardName">Sales</div>
                        </div>                        
                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div> 
                    </div>                                   
                    <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                    </div>                                    
                    <div class="card">
                        <div>
                            <div class="numbers">$7,842</div>
                            <div class="cardName">Earning</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    </div>                    
                </div>                
               
                <!--add charts-->
                <div class="graphBox">
                    <div class="box"><canvas id="myChart"></canvas></div><!--precisa do link do canvas para incrementação-->
                    <div class="box">
                        <canvas id="earning"></canvas>
                    </div>
                </div>

                <div class="details">
                     <!-- order details List-->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Orders</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Payment</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><!-- nao esquecer de fazer um bloco/bd para cadastrar os produtos-->
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status inprogress">Inprogress</span></td>
                                </tr>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status return">Return</span></td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- New Customer -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                        </div>
                        <table>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="imagens/img1.jpg"></div></td>
                                <td><h4>David<br><span>Italy</span></h4></td>
                            </tr>    
                        </table>
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

            toggle.onclick=function(){
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }

            // add hovered class in selected list item
            let list = document.querySelectorAll('.navigation li');
            function activeLink(){
                list.forEach((item)=>
                item.classList.remove('hovered'));
                this.classList.add('hovered');
            }
            list.forEach((item)=>
            item.addEventListener('mouseover',activeLink));
        </script>
    </body>
</html>