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

    //   print_r($_SESSION['cart']);
}

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
               font-size: 30px;
               text-decoration: underline;
               color: #ffffff
               
                    
            }
            h2{
                font-size: 15px;
                color: #ffffff
            }
            h3{
                 font-style: italic;
               font-size: 14px;
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
<!--                <ul class="navbar-nav mx-auto">
                    <li class="nav-item " >
                        <a class="navbar-brand" href="Pro_mange.php">
                           <img src="icon/add-icon.png" width="30" height="30" alt=""></a>
                    </li> 
                </ul>
                 <ul class="navbar-nav mx-auto">
                    <li class="nav-item " >
                        <a class="navbar-brand" href="Product.php">
                            <img src="icon/pencil-icon.png" width="30" height="30" alt=""></a>
                    </li> 
                   
                </ul>-->
                
            </div>  
            <div class="container">
             
        </div>
        </div>
        <div class="container"></div>
        <div class="container"></div>
        <div class="container"></div>

        <div class="container">
            <div align="center">
                <a class="navbar-brand" href="#">

                    <img src="image/Rolex_logo.png" width="70" height="40" alt="" >
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="container">
            <!-- Content here -->
        </div>
        <div class="container">
            <!-- Content here -->
        </div>
        <div class="container">
            <?php
          if (isset($_SESSION['user'])) {
                echo "<h3>". $_SESSION['user'] ." Active now</h3>";   
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
            if (isset($_GET['listcart'])) {
                $product_id = $_GET['product_id'];
                $pname = $_GET['pname'];
                $psize = $_GET['psize'];
                $pmaterial = $_GET['pmaterial'];
                $price = $_GET['price'];
                $pic = $_GET['image'];
                $dup = false;

                if (!$dup)
                    array_push($_SESSION['cart'], array($_GET['product_id'], $_GET['pname'], $_GET['psize'], $_GET['pmaterial'], $_GET['price'], $_GET['image'], 1));
            }
            ?>
       
         <?php
           
            $sql = "SELECT `product_id`,`pname`,`size`,`material`,`price`,`image` FROM product  ORDER BY product_id  ";
           
            $query = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($query);
            ?>
        <br>
        <div class="container">
           <div class="container">
  <div class="row">
    <div class="col-sm">
        <h1><label>SHOPPING</label></h1>
    </div>
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
     <div align="right"> 
                
         <a href="listcart.php" > <button class="btn btn-warning" id="demo">จำนวนสินค้า <?php echo count($_SESSION['cart']); ?> ชิ้น</button></a>
            </div>
    </div>
  </div>
</div>
            
        </div>
       
        <br>
        <div class="container">
  <div class="row">
    <div class="col-sm">
<!--      One of three columns-->
    </div>
    <div class="col-12">
      <div align="center">
<!--            border=\"1\" -->
         <?php

            echo "<table class=\"table table-bordered table-striped table-hover table-dark\">";

            if ($total > 0) {
                echo" <thead class=\"thead-light\" >";
                echo "<tr>";
                echo "<th><div align=\"center\">Product ID</div></th><th><div align=\"center\">Product Name</div></th>"
                . "<th><div align=\"center\">Size</div></th>"
                        . "<th><div align=\"center\">Material</div></th>"
                        . "<th><div align=\"center\">Price</div></th><th><div align=\"center\">Picture</div></th>"
                        . "<th><div align=\"center\">เพิ่มสินค้า</div></th>";
//                echo "</tr>";
                echo" </thead>";
            }
            while ($row = mysqli_fetch_row($query)) {
                echo "<tr>";
                
                echo "<td><h2><br><br><div align=\"center\">$row[0]</div></h2></td>";
                echo "<td><h2><br><br><div align=\"center\">$row[1]</div></h2></td>";
                 echo "<td><h2><br><br><div align=\"center\">$row[2]</div></h2></td>";
                  echo "<td><h2><br><br><div align=\"center\">$row[3]</div></h2></td>";
                echo "<td><h2><br><br><div align=\"center\">$row[4]</div></h2></td>";
                echo "<td><div align=\"center\"><image src=\"image/$row[5]\" width=\"120px\" height=\"120px\" ></div></td>";
            
                ?>

  <td align="center">
        <br><a href="Basket_pro.php?product_id=<?php echo $row[0]; ?>&pname=<?php echo $row[1]; ?>&psize=<?php echo $row[2]; ?>&pmaterial=<?php echo $row[3]; ?>&price=<?php echo $row[4]; ?>&image=<?php echo $row[5]; ?>&listcart=1">
                        <button type=\"button\" class="btn btn-light"  > เพิ่มเข้าตะกร้า </button></a>
  </td>
<!--class="btn btn-warning"-->
                <?php
                echo "</tr>";
            }  //end while
            echo "</table>";
            ?>
                        
        </div>
    </div>
    <div class="col-sm">
<!--      One of three columns-->
    </div>
      
  </div>
</div>
        
        <br><br>
       
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>