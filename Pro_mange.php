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
             h2{font-size: 15px;
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

        <form name="frm" method="POST" enctype="multipart/form-data"  >
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <input type="text" size="15" name="pname" placeholder="Product Name" class="form-control"><br>
                        <input type="text" size="15" name="psize" placeholder="Size" class="form-control"><br>
                        <input type="text" size="15" name="pmaterial" placeholder="Material" class="form-control"><br>
                        <input type="text" size="15" name="pprice" placeholder="Price" class="form-control"><br>
                        <input type="text" size="15" name="pamount" placeholder="Amount" class="form-control"><br>

                        <div class="form-group" align="center">  
                            <h2> <lable class="control-label">Picture : </lable></h2>
                            <div  id="upload" class="btn btn-info">
                                Upload File
                            </div><br><br>

                            <div align="center"> <input type="submit"   name="submitAdd" role="button" class="btn btn-warning"  value="เพิ่มสินค้า"><br><br></div>

                        </div>  

                    </div>

                    <div class="col-sm">
                        <div align="center">
<!--                                  <input type="file" name="AAA" size="37" ><br><br>-->
                            <?php
                            if (isset($image['image'])) {
                                if (!empty($image['image'])) {
                                    echo '<image src=\"image/' . $image['image'] . '" /><br />';
                                    echo $image['image'];
                                }
                            }
                            ?>
                            <!--                                  <div id="thumbnail"></div>     -->
                            <div id="thumbnail" class="d-block  bg-secondary text-white"></div> 
                        </div>


                    </div>
                </div>
            </div>
        </form>
        

        
        <?php
         if (isset($_POST['submitAdd'])) {
            $pname = $_POST['pname'];
            $psize = $_POST['psize'];
            $pmaterial = $_POST['pmaterial'];
            $pprice = $_POST['pprice'];
            $pamount = $_POST['pamount'];
            
            //upload ppic
            $ext = pathinfo($_FILES['_file_upload']['name'], PATHINFO_EXTENSION);
            $new_image_name = 'img_'.uniqid().".".$ext;
            $image_path = "image/";
            $upload_path = $image_path.$new_image_name;
            
            //uploading
            $success = move_uploaded_file($_FILES['_file_upload']['tmp_name'], $upload_path);
            if ($success===FALSE) {
                echo "ไม่สามารถอัพโหลดได้";
                //echo ($ext);
                exit();
            }
            $image = $new_image_name;
                $sql = "INSERT INTO `product`(`pname` ,`size`, `material`, `price`, `amount`,`image`) "
                        . "VALUES ('$pname','$psize','$pmaterial','$pprice','$pamount','$image')";

                $result = mysqli_query($conn, $sql);
                if ($result == 1) {
              //    header("location:upload.php");
                    echo "อัพโหลดเรียบร้อย";
                    echo $image ;
                 
                }
           
        }
        ?>
        
        
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
