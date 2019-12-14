<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './dbconfig.php';


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
               color: #ffffff
            }
            h2{
               font-style: italic;
               font-size: 14px;
               text-decoration: underline;
               color: #ffffff
            }
        </style>
            
        
         <nav class="navbar navbar-expand-lg table-Default navbar-dark ">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item " >
                                <a class="nav-link"  href="index.php">HOME<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container"></div>
        </nav>
        
       
         <br><br><br>
        
        <div class="container">
  <div class="row">
      <div class="col-sm-6"><br>
          <div align="center">
              <img src="image/Rolex_logo.png" width="430" height="260" alt="" >
          </div>
    </div>
      
    <div class="col-sm-5" align="center">
        <form method="POST" align ="center" >
           <!--การสร้ากล่องให้กรอกข้อมูล-->
         <br>
           <div align="center">
               <h1><label>REGISTER</label></h1><br>
               <input type="text"  class="form-control"size="50" name="username" placeholder="Username" ><br>
               <input type="password" class="form-control" size="50" name="password" placeholder="Password" ><br>
               <input type="password"  class="form-control"size="50" name="confirm_pass" placeholder="Password Again" ><br>
               <input type="submit" name="submitReg" role="button" class="btn btn-warning" value="Register"><br><br>
               <a href="login.php"><h2>LOGIN</h2></a><br>
           </div>
        </form>
        <?php
         //               ให้ส่งค่าไปยังdatabase
        if (isset($_POST['submitReg'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_pass = $_POST['confirm_pass'];
            if ($password != $confirm_pass) {
                echo "รหัสผ่านไม่ตรงกัน";
            } else {

                $password = md5($password);
                $sql = "INSERT INTO cus_data (username, password) VALUES ('$username', '$password' ) ";
                $result = mysqli_query($conn, $sql);
                if ($result == 1) {
                    header("Location:CUS_login.php");
                }
            }
        }
        ?>
    </div>
     
  </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
