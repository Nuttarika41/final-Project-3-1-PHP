<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include './dbconfig.php';
session_start();
if (!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = array();
} else {

//      print_r($_SESSION['cart']);
}
$totalprice = 0;
$count = 0;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style>
            body{
               background-image: url("image/rolex-bg.jpg")
            }
            h1{
               font-style: italic;
                font-size: 14px;
                text-decoration: underline;
                color: #ffffff
            }
            h2{
               font-style: italic;
               font-size: 30px;
               text-decoration: underline;
               color: #ffffff
            }
            
        </style>
        
         <nav class="navbar navbar-expand-lg table-Default navbar-dark  ">
        <div class="container">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                     <li class="nav-item " >
                         <a class="navbar-brand" href="Home.php">
                            <img src="icon/home-icon.png" width="30" height="30" alt=""></a>
                    </li> 
                   
                </ul>              
            </div>    
        </div>
        <div class="container"></div>
        <div class="container"></div>
        <div class="container"></div>
        <div class="container"></div>
        <div class="container">
            <div align="center">
                <a class="navbar-brand" href="#">

                    <img src="image/Rolex_logo.png" width="70" height="40" alt="" >
                </a>
        </div>
        </div>
        <div class="container"> </div>
        <div class="container"> </div>
        <div class="container"> </div>
        <div class="container">
            <?php
                if (isset($_SESSION['user'])) {
                    echo "<h1>" . $_SESSION['user'] . " Active now</h1>";
                }
                ?>
        </div>
        <div class="container" >
            <?php
            echo "<a  href=\"logout.php\"  role=\"button\" class=\"btn btn-danger btn-sm\"  onclick=\"return confirm(' Log out of ROLEX Store? ')\" >logout</a>";
            ?>
        </div>
    </nav>
         
        <?php
        if (isset($_GET['addcart'])) {

            array_push($_SESSION['cart'], $_GET['product_id']);
            $count++;
            print_r($_SESSION['cart']);
        }
        ?>
       
            <br>
            
            <form method="POST" align="center" action="addcart.php">  
                <div class="container">
                    <div class="row">
                        <div class="col-sm"></div>
                        <div class="col-sm">
                            <div align="right">
                                <button type="submit" class="btn btn-warning btn-lg"  name="submit">CHECK OUT</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm">

                        </div>
                        <div class="col-sm-12">

            <table class="table table-bordered table-striped table-hover table-dark">
                <thead class="thead-light" >
                <th ><div align="center">ProductID</div></th>
                <th ><div align="center">pname</div></th>
                <th ><div align="center">psize</div></th>
                <th ><div align="center">pmaterial</div></th>
                <th ><div align="center">Price</div></th>
                <th ><div align="center">pic</div></th>
                <th><div align="center">amount</div></th>
               </thead>
                <?php
                foreach ($_SESSION['cart'] as $key) {
                    ?>
                    <tr>
                        <td><p><?php echo $key[0]; ?></p></td>
                        <td><p><?php echo $key[1]; ?></p></td>
                        <td><p><?php echo $key[2]; ?></p></td>
                       <td><p><?php echo $key[3]; ?></p></td>
                       <td><p><?php echo $key[4]; ?></p></td>
                        <?php echo "<td align=\"center\"><image src=\"image/$key[5]\" width=\"150px\" height=\"150px\"></td>"; ?>
                        <td><p><input type="text" name="namount" value="<?php echo $key[6]; ?>" style="width:100px;"></p></td>

                    </tr>
                    <?php
                    
                    $count += $key[6];
                    $totalprice += $key[4] * $key[6];
                }
                ?>
              <?php echo "<br><h1> รวมจำนวนสินค้า $count ชิ้น เป็นจำนวนเงิน $totalprice บาท</h1><br><br>"; ?>
            </table>
         

                        </div>
                        <div class="col-sm">

                        </div>
                    </div>
                </div>
 </form> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
