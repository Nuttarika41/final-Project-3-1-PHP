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
               background-image: url("image/rolex-bg.jpg")
            }
            h1{
               
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
 <br><br>
<div align="center">
   <img src="image/Rolex_logo.png" width="280" height="170" alt="" >
</div>
        <br>
        
    <div align="center">    
         <div class="col-sm">
        <form method="POST" >
     
    <br><br>
    <!--<font color="#ffffff"><h1 class="display-6">Welcome</h1></font>-->
    <div class="form-group-sm " >
        
        <div class="col-sm-5">
            
         <input type="text" class="form-control" size="50" name="username" placeholder="Username" ><br>
        </div>
    </div>
    <div class="form-group">
      <div class="col-sm-5">
         
      <input type="password" class="form-control" size="50" name="password" placeholder="Password" ><br>
      </div>
    </div>
    
   <input type="submit" name="submitLog" role="button" class="btn btn-light" value="LOGIN"><br>
</form>

   <a href="register.php"> <h1>Register</h1></a>
        <!--</div>-->
        
    </div>
    </div>
        

      
             <?php
                    if (isset($_POST['submitLog'])) {
                        //echo "Test";
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $password = md5($password);  //แปลงเป็น md5 ก่อนค้น DB

                        $sql1 = "select * from cus_data"
                                . " where username='$username' and password='$password' ";
                     //   echo $sql1;
                        $result = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result) > 0) {//ถ้าได้ผลลัพธ์มากกว่า 1 record
                            //อัพเดตเวลาที่ user ดังกล่าว
                            $row = mysqli_fetch_row($result);
                            $user_id = $row[0];
                            echo "------>$user_id";

                            session_start();
                            $_SESSION['user'] = $username;
                            date_default_timezone_set("Asia/Bangkok");
                   
                            $sql2 = "insert into cus_login(user_id,timelogin)"
                                    . " values($user_id,'" . date('Y-m-d H:i:s') . "') ";
                            echo "$sql2<br>";
                            $result2 = mysqli_query($conn, $sql2);

                            header("Location:Home.php");
                        } else {
                            echo "<br> ไม่พบข้อมูล $username กรุณาทดลองใหม่อีกครั้ง";
                        }
                    }
                    ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>