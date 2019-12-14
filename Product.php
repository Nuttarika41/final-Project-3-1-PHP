<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
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
               background-image: url("image/rolex-bg.jpg")
            }
            h1{
               
               font-style: italic;
                font-size: 14px;
                text-decoration: underline;
              
                color: #ffffff
               
                    
            }
            h2{
                font-size: 15px;
                color: #ffffff
            }
             h3{
               
               font-style: italic;
               font-size: 30px;
               text-decoration: underline;
               color: #ffffff
               
                    
            }
            #thumbnail img{width:150px;height:200px;margin:4px;}
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
<!--                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item " >
                            <a class="navbar-brand" href="Basket_pro.php">
                                <img src="icon/cart-icon.png" width="30" height="30" alt=""></a>
                        </li> 
                    </ul>-->
                     <ul class="navbar-nav mx-auto">
                    <li class="nav-item " >
                        <a class="navbar-brand" href="viewOrder.php">
                            <img src="icon/certificate-icon.png" width="30" height="30" alt=""></a>
                    </li>                 
                </ul>
                </div>  
                <div class="container"></div>
            </div>
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
        
        
        
        <?php
          if (isset($_POST['submit']))
            $keyword = $_POST['keyword'];
        else
            $keyword = "";
        
        if (isset($_GET['up_id'])) {
            $up_id = $_GET['up_id'];
        } else
            $up_id = "1";
        ?>
        <?php
        if (isset($_GET['del_id'])) {
            $del_id = $_GET['del_id'];
            $sql_del = "DELETE FROM product WHERE product_id='$del_id' "; //sql delete
            mysqli_query($conn, $sql_del); //ลบ
        }
        ?>
        <?php
        //2 ต้องเลือกว่าหน้านี้จะทำการลบอะไร
        //ex.ลบข้อมูลในตารางสินค้า product
        $sql = "SELECT * FROM product ORDER BY product_id  ";
        //echo $sql."<br>";
        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);
        ?>
        
        <?php
        //6 ส่วนอัพเดต
        if (isset($_POST['submitUpdate'])) {
            $pname = $_POST['pname'];
            $psize = $_POST['psize'];
            $pmaterial = $_POST['pmaterial'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];

            //upload ppic
            $ext = pathinfo($_FILES['_file_upload']['name'], PATHINFO_EXTENSION);
            $new_image_name = 'img_'.uniqid().".".$ext;
            $image_path = "image/";
            $upload_path = $image_path.$new_image_name;
            //uploading
            $success = move_uploaded_file($_FILES['_file_upload']['tmp_name'], $upload_path);
            if ($success === FALSE) {
                echo "ไม่สามารถอัพโหลดได้";
                exit();
            }
            $image = $new_image_name;
            $sql = "UPDATE product SET pname = '$pname',size = '$psize',material = '$pmaterial',price = '$price', "
                    . "amount = '$amount' ,image='$image' "
                    . "where product_id = '$up_id' ";
            $result = mysqli_query($conn, $sql);

            if ($result == 1) {
//                echo $sql;
//                echo "อัพเดตข้อมูลเรียบร้อย";
            }
        }
        ?>
        
            <br><br>
            
            <div class="container">
  <div class="row">
    <div class="col-sm-3">
        <form method="POST" enctype="multipart/form-data">
            <?php
//            5 เมื่อกดคลิกส่งค่า มันจะไปselect ค่าจากปุ่มแก้ไขที่เราคลิก
            if ($up_id != "") {

                $sql1 = "SELECT * FROM product where product_id='$up_id' ";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_row($result1);
            }
            ?>
            
            <div align="center">
                <h3><label>EDIT PRODUCT</label></h3>
                <input type="hidden"  size="15" name="product_id" placeholder="Product ID" class="form-control" value="<?php echo $row[0]; ?>"><br>
                <input type="text" class="form-control" size="15" name="pname" placeholder="Product Name" value="<?php echo $row1[1]; ?>" ><br>
                <input type="text" size="15" name="psize" placeholder="Size" class="form-control" value="<?php echo $row1[2]; ?>"><br>
                <input type="text" size="15" name="pmaterial" placeholder="Material" class="form-control" value="<?php echo $row1[3]; ?>"><br>
                <input type="text" class="form-control" size="15" name="price" placeholder="Price" value="<?php echo $row1[4]; ?>"><br>
                <input type="text" class="form-control" size="15" name="amount" placeholder="Amount" value="<?php echo $row1[5]; ?>"><br>
                  
                 <div class="form-group" align="center">  
                            <h2><lable class="control-label">Picture : </lable></h2>
                            <div  id="upload" class="btn btn-info">
                                Upload File
                            </div><br> 
                 </div>  
                 <div id="thumbnail" class="d-block  bg-secondary text-white"></div> 
            </div><br>
          
            <div align="center">  <input type="submit"  name="submitUpdate" role="button" class="btn btn-warning btn-lg"  value="SAVE"></div><br><br>
        </form>
    </div>
    <div class="col-sm-9">
        <div align="center">
            <?php
//3 วนลูปให้ออกมาเป็นตาราง
            echo "<table  class=\"table table-bordered table-striped table-hover table-dark\">";

            if ($total > 0) {
                echo" <thead class=\"thead-light\" >";
                echo "<tr>";
                echo "<th><div align=\"center\">ID Product</div></th><th><div align=\"center\">Name</div></th><th><div align=\"center\">Size</div></th><th><div align=\"center\">Material</div></th><th><div align=\"center\">Price</div></th><th><div align=\"center\">Amount</div></th><th><div align=\"center\">Picture</div></th><th><div align=\"center\">Edit</div></th><th><div align=\"center\">Delete</div></th>";
                echo "</tr>";
                echo" </thead>";
            }
            while ($row = mysqli_fetch_row($query)) {
                echo "<tr>";
                echo "<td><br><div align=\"center\">$row[0]</div></td>";
                echo "<td><br><div align=\"center\">$row[1]</div></td>";
                echo "<td><br><div align=\"center\">$row[2]</div></td>";
                echo "<td><br><div align=\"center\">$row[3]</div></td>";
                echo "<td><br><div align=\"center\">$row[4]</div></td>";
                echo "<td><br><div align=\"center\">$row[5]</div></td>";
                echo "<td><image src=\"image/$row[6]\" width=\"120px\" height=\"120px\" ></td>";
                echo "<td><a  href=\"Product.php?up_id=$row[0]\" ><br><br><div align=\"center\">Edit</div></a></td>";
                echo "<td><a  href=\"Product.php?del_id=$row[0]\"  "
                . "onclick=\"return confirm(' ลบข้อมูล $row[1]?? ')\" ><br><br><div align=\"center\">Delete</div></a></td>";
                echo "</tr>";
                //$total++;
            }
            echo "</table>";
            ?>
        </div>
    </div>
   
  </div>
</div>
          
        
      
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <script type="text/javascript" >
        $(function () {

            $("#upload").on("click",function(e){
                var lastFile = $(".file_upload:last").length;
                if(lastFile >= 0){
                    if(lastFile == 0 || $(".file_upload:last").val()!=""){
                        var objFile= $("<input>",{
                           "class":"file_upload",
                            "type":"file",
                            "multiple":"true",
                            "name":"_file_upload",
                            "style":"display:none",
                                change: function(e){
                                    var files = this.files
                                    showThumbnail(files)    
                                }
                        }); 
                        $(this).before(objFile);        
                        $(".file_upload:last").show().click().hide();                   
                    }else{
                        $(".file_upload:last").show().click().hide();       
                    }           
                }
                e.preventDefault();
            });

            function showThumbnail(files){

            //    $("#thumbnail").html("");
                for(var i=0;i<files.length;i++){
                    var file = files[i]
                    var imageType = /image.*/
                    if(!file.type.match(imageType)){
                        //     console.log("Not an Image");
                        continue;
                    }

                    var image = document.createElement("img");
                    var thumbnail = document.getElementById("thumbnail");
                    image.file = file;
                    thumbnail.appendChild(image);

                    var reader = new FileReader();
                    reader.onload = (function(aImg){
                        return function(e){
                            aImg.src = e.target.result;
                        };
                    }(image))

                    var ret = reader.readAsDataURL(file);
                    var canvas = document.createElement("canvas");
                    ctx = canvas.getContext("2d");
                    image.onload= function(){
                        ctx.drawImage(image,300,300)
                    }
                } // end for loop

            } // end showThumbnail




        });
    </script>    

</body>
</html>
