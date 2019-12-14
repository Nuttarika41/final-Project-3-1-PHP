<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './dbconfig.php';
session_start();

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
                background-image: url("image/rolex-bg.jpg")}
             h1{font-style: italic;
                font-size: 14px;
                text-decoration: underline;
                color: #ffffff}
             h2{font-size: 20px;
                 color: #ffffff}
              #thumbnail img{width:300px;height:400px;margin:5px;}
        </style>

        <nav class="navbar navbar-expand-lg table-Default navbar-dark  ">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item " >
                            <a class="navbar-brand" href="Admin.php">
                                <img src="icon/home-icon.png" width="30" height="30" alt=""></a>
                        </li> 
                    </ul>
                     <ul class="navbar-nav mx-auto">
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
                        </li> 
                    </ul>
<!--                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item " >
                            <a class="navbar-brand" href="Basket_pro.php">
                                <img src="icon/cart-icon.png" width="30" height="30" alt=""></a>
                        </li> 
                        </li> 
                    </ul>-->
                </div>  
                <div class="container"></div>
            </div>
            <div class="container"></div>
            <div class="container"></div>
            <div class="container"> </div>

            <div class="container">
                <div align="center">
                    <a class="navbar-brand" href="#">

                        <img src="image/Rolex_logo.png" width="70" height="40" alt="" >
                    </a>
             </div>
            </div>
            <div class="container"></div>
            <div class="container"></div>
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
        <br><br>
         <?php
        if(isset($_POST['submit']))$keyword=$_POST['keyword'];
        else $keyword="";    
             
        if (isset($_GET['view_id'])) {
                   $view_id=$_GET['view_id'];
            }else $view_id="OD000020";

        ?>
      
        
         <br>
        <form method="POST" >
            <div align="center">
                <input type="text" name="keyword" size="15" class="form-control-sm">
                <input type="submit" name="submit" value="Search" class="btn btn-dark">
            </div>                           
        </form> 
       
        <div align="center" >
            <a href="Admin.php"><button type="button" class="btn btn-dark">back to admin page</button></a>

        </div>

        <br>
        
       <?php
        $totalP=0;
        $sql="SELECT od.order_id,od.orderdate FROM orderdetail odt "
                . "JOIN product pd ON pd.product_id = odt.product_id "
                . "JOIN orders od ON od.order_id = odt.order_id "
                . "WHERE od.order_id LIKE '%$keyword%'ORDER BY od.order_id desc  ";
 
        $query= mysqli_query($conn, $sql);
        $total= mysqli_num_rows($query);
        
        
        $sqlB="SELECT od.order_id,pd.product_id,pd.pname,odt.price,odt.amount FROM orderdetail odt "
                . "JOIN product pd ON pd.product_id = odt.product_id "
                . "JOIN orders od ON od.order_id = odt.order_id "
                . "WHERE od.order_id LIKE '%$view_id%' ORDER BY od.order_id  ";
             
        $queryB= mysqli_query($conn, $sqlB);
        $totalB= mysqli_num_rows($queryB);
        
        ?>
        <div class="container">
  <div class="row">
    <div class="col-sm">
        
       <?php
       echo "<div align=\"center\"><h2>View Order$total</h2></div><br>";
       
                     echo "<table class=\"table table-striped table-dark\">";

                 if ($total > 0) {
                     echo "<tr>";
                     echo "<th>Order ID</th><th>OrderDate</th>";
                     echo "<th>view</th>";
                     echo "</tr>";
                 }
               
                 while ($row = mysqli_fetch_row($query)) {
                     echo "<tr>";
                     echo "<td>$row[0]</td>";
                     echo "<td>$row[1]</td>";
                     echo "<td><a  href=\"viewOrder.php?view_id=$row[0]\"  role=\"button\" class=\"btn btn-warning btn-sm\"  onclick=\"return confirm\" >view</a></td>";
                     echo "</tr>";
                     //$total++;
                 }
                
                 echo "</table>";
                 ?>
    </div>
    <div class="col-sm">
        <?php
                     echo "<table class=\"table table-striped table-dark\">";

                 if ($totalB > 0) {
                     echo "<tr>";
                     echo "<th>Order ID</th><th>Product ID</th>";
                     echo "<th>Product Name</th><th>Amount</th><th>Price</th>";
                     echo "</tr>";
                 }
               
                 while ($rowB = mysqli_fetch_row($queryB)) {
                     echo "<tr>";
                     echo "<td>$rowB[0]</td>";
                     echo "<td>$rowB[1]</td>";
                     echo "<td>$rowB[2]</td>";
                     echo "<td>$rowB[3]</td>";  
                     echo "<td>$rowB[4]</td>"; 
                     $totalP+=$rowB[3]*$rowB[4];
                  
                     echo "</tr>";
               
                 }
                 echo "<tr align=\"center\"><td class=\"bg-danger\" colspan=2>Total</td ><td class=\"bg-danger\" colspan=5 >$totalP</td></tr>";
        echo "</table>";
                
              
                 ?>
    </div>
</div>
</div>
        
        
       
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
