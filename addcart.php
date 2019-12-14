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

            h2{
               font-style: italic;
               font-size: 16px;
               text-decoration: underline;
               color: #ffffff
            }
             h3{
               font-style: italic;
               font-size: 20px;
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
                    </ul>
                </div>       
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
            <div class="container"></div>
            <div class="container">
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<h2>" . $_SESSION['user'] . " Active now</h2>";
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
         include_once './dbconfig.php';

    
        if (isset($_SESSION['cart'])) {
//            $cus_name = $_POST['cus_name'];
//            $cus_tel = $_POST['cus_tel'];
            $order_id = "";
            $sql_s = " SELECT order_id FROM orders  ";
            $result0 = mysqli_query($conn, $sql_s);
            while ($row = mysqli_fetch_row($result0)) {
                $order_id = $row[0];
            }

            $nextVal = (int) substr($order_id, 2);  //ตัดส่วนอักษรข้างหน้าออกและแปลงเป็นตัวเลข
            $nextVal++;

            if ($nextVal >= 100000)
                $stepCount = "";
            else if ($nextVal >= 10000)
                $stepCount = "0";
            else if ($nextVal >= 1000)
                $stepCount = "00";
            else if ($nextVal >= 100)
                $stepCount = "000";
            else if ($nextVal >= 10)
                $stepCount = "0000";
            else
                $stepCount = "00000";

            $order_id = "OD" . $stepCount . $nextVal;   //รวมเป็นคำอีกครั้ง   

            mysqli_autocommit($conn, false);

            $sql_query = "INSERT INTO orders (order_id,orderdate) ";
            $sql_query .= " VALUES('$order_id ', '" . date('Y-m-d H:i:s') . "')";
//    echo "<br>" . $sql_query;

            $result1 = mysqli_query($conn, $sql_query);
            foreach ($_SESSION['cart'] as $key) {

                $product_id = $key[0];
                $totalPrice = $key[4] * $key[6];
                $amount = $key[6];

                $sql_sub = "insert into orderdetail(od_id,order_id,product_id,price,amount) ";
                $sql_sub .= " values('','$order_id','$product_id',$totalPrice,$amount)";
//        echo "<br>" . $sql_sub;
                $result2 = mysqli_query($conn, $sql_sub);

                $sqlp = "update product set amount = amount-'$amount' where product_id='$product_id'";
                $resultp = mysqli_query($conn, $sqlp);
            }
            if ($result1 && $result2) {
                mysqli_commit($conn);
                unset($_SESSION['cart']);
                echo"<script>alert('รายการสั่งซื้อสำเร็จ')</script>";
            } else {
                mysqli_rollback($conn);
                echo"<script>alert('รายการสั่งซื้อไม่สำเร็จ')</script>";
            }
        } else {
//            echo "No cart";
        }
        ?>
         <br><br><br><br>
        
       
             

    <div class="col-sm">
     <div align="center">
            <img src="icon/Cute-Ball-Go-icon.png" width="280" height="260" alt="" >
            <br><br>
            <h2><label>ORDER SUCCESS</label></h2>
             </div> 
    </div>
    
  </div>
</div>
       
        
        
        
        
      
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
