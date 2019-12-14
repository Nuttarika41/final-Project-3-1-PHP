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
            
        </style>
        
        
        <nav class="navbar navbar-expand-lg table-Default navbar-dark  ">
        <div class="container">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
<!--                   <ul class="navbar-nav mx-auto">
                    <li class="nav-item " >
                        <a class="navbar-brand" href="Basket_pro.php">
                            <img src="icon/cart-icon.png" width="30" height="30" alt=""></a>
                    </li> 
                    </li> 
                </ul>-->
                 
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item " >
                        <a class="navbar-brand" href="viewOrder.php">
                            <img src="icon/certificate-icon.png" width="30" height="30" alt=""></a>
                    </li>                 
                </ul>
                 
            </div>  
            <div class="container">
             
        </div>
        </div>
     <div class="container">
            <!-- Content here -->
        </div>
        <div class="container">
            <!-- Content here -->
        </div>
        <div class="container">
           
        </div>

        <div class="container">
            <div align="center">
                <a class="navbar-brand" href="#">

                    <img src="image/Rolex_logo.png" width="70" height="40" alt="" >
                </a>

<!--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">LOGOUT</span>
                </button>-->
            </div>
        </div>
        <div class="container">
             
        </div>
             <div class="container">
           
        </div>
              <div class="container">
             
        </div>
        <div class="container">
            <?php
          if (isset($_SESSION['user'])) {
                echo "<h1>". $_SESSION['user'] ." Active now</h1>";   
            }
            ?>
        </div>
        <div class="container" >
            <?php
         echo "<a  href=\"logout.php\"  role=\"button\" class=\"btn btn-danger btn-sm\"  onclick=\"return confirm(' Log out of ROLEX Store? ')\" >logout</a>";

            ?>
           
        </div>
    </nav>
      
         <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/baselworld_2019_new_gmt-master_ii_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES GMT-MASTER II</h5>
                            <p>Rolex is presenting a new version of the Oyster Perpetual GMT‑Master II with a bidirectional rotatable bezel and a two-colour 24-hour graduated Cerachrom insert in blue and black ceramic.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="image/baselworld_2019_new_sea-dweller_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES SEA-DWELLER</h5>
                            <p>Rolex is introducing an Oyster Perpetual Sea‑Dweller in a yellow Rolesor version, combining Oystersteel and 18 ct yellow gold. This new watch brings 18 ct yellow gold to the Sea‑Dweller range for the first time.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="image/baselworld_2019_new_yacht-master_42_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES YACHT-MASTER 42</h5>
                            <p>Rolex is extending its Yacht‑Master range with a new 42 mm model: the Oyster Perpetual Yacht‑Master 42.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>