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
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
    </head>
    <body>
        <style>
            body{
                background : black;
            }
            h1{
                font-size: medium;
                color: white;
            }
            h2{
                font-family: 'Fira Sans Extra Condensed', sans-serif;
                font-size: 40px;
                color: white;
            }
        </style>

        <nav class="navbar navbar-expand-lg table-Default navbar-dark ">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item " >
                            <a class="nav-link"  href="index.php">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <!--                            <li class="nav-item">
                                                        <a class="nav-link" href="login.php">LOGIN</a>
                                                    </li>-->
                    </ul>
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

                </div>
            </div>
            <div class="container"></div>
            <div class="container"> </div>
            <div class="container"> 
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<h1>" . $_SESSION['user'] . " Active now</h1>";
                }
                ?>
            </div>
            <div class="container"  >
                <?php
                echo "<a  href=\"logout.php\"  role=\"button\" class=\"btn btn-danger btn-sm\"  onclick=\"return confirm(' Log out of ROLEX Store? ')\" >logout</a>";
                ?>
            </div>
        </nav>

        <!--       ???????home-->

        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div  align="center" class="carousel-item active " data-interval="1000">
                        <img src="image/baselworld_2019_new_gmt-master_ii_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES GMT-MASTER II</h5>
                            <p>Rolex is presenting a new version of the Oyster Perpetual GMT-Master II with a bidirectional rotatable bezel and a two-colour 24-hour graduated Cerachrom insert in blue and black ceramic.</p>
                        </div>
                    </div>
                    <div class="carousel-item " data-interval="900">
                        <img src="image/baselworld_2019_new_sea-dweller_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES SEA-DWELLER</h5>
                            <p>Rolex is introducing an Oyster Perpetual Sea-Dweller in a yellow Rolesor version, combining Oystersteel and 18 ct yellow gold. This new watch brings 18 ct yellow gold to the Sea-Dweller range for the first time.</p>
                        </div>
                    </div>
                    <div class="carousel-item" >
                        <img src="image/baselworld_2019_new_yacht-master_42_video_cover_0001.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>NEW 2019 WATCHES YACHT-MASTER 42</h5>
                            <p>Rolex is extending its Yacht-Master range with a new 42 mm model: the Oyster Perpetual Yacht-Master 42.</p>
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

        <br>          
        <br>          
        <div class="jumbotron jumbotron-fluid bg-transparent text-white" align="center">             
            <div class="container">                 
                <h1 class="display-4">ROLEX</h1>                 
                <p class="lead" >Rolex watches are crafted from the finest raw materials and assembled with scrupulous attention to detail. Every component is designed, developed and produced in-house to the most exacting standards.</p>          
            </div>         
        </div>

        <br>
        <div align="center">
            <a href="Basket_pro.php"><button type="button" class="btn btn-outline-warning">SHOP NOW</button></a>
        </div>
        <br> 


        <div class="container">
            <div class="row">
                <div class="col-xs-11 col-md-10 col-centered">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="1500">

                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <div class="carousel-col">
                                    <img src="rolexpic/1.jpg" class="d-block w-100" alt="...">
                                </div>

                                <div class="carousel-col">
                                    <img src="rolexpic/2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/3.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/4.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-col">
                                    <img src="rolexpic/5.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/6.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/7.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/8.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-col">
                                    <img src="rolexpic/11.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/12.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/13.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/10.jpg" class="d-block w-100" alt="...">     
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-col">
                                    <img src="rolexpic/14.png" class="d-block w-100" alt="...">  
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/16.jpg" class="d-block w-100" alt="...">  
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/17.png" class="d-block w-100" alt="...">                              
                                </div>
                                <div class="carousel-col">
                                    <img src="rolexpic/18.jpg" class="d-block w-100" alt="...">                              
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="left carousel-control">
                            <a href="#carousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <div class="right carousel-control">
                            <a href="#carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="container" align="center">
            <div class="row">
                <div class="col-sm">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/-guAJ9zhZ9w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                <div class="col-sm">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/JoBpoDDJrHs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-sm">

                </div>
                <br>
                <div class="col-sm-12">
                    <h2><div align="center">ED VIESTURS</div></h2>

                    <h1> <div align="center">
                            Ed Viesturs is one of only a handful of climbers in history, and the only American, 
                            to reach the summits of all of the world’s fourteen 8,000-metre (26,000 feet) peaks 
                            without supplemental oxygen. In 2005, with his ascent of the 14th summit – Annapurna - one of the world’s most
                            treacherous peaks, Viesturs was awarded National Geographic’s Adventurer of the Year. In all, Viesturs, equipped 
                            with an Oyster Perpetual Explorer II, has made 21 ascents of mountains that are more than 8,000 metres high, 
                            including Mount Everest seven times.</div></h1>

                </div>
                <br>
                <div class="col-sm">

                </div>
            </div>
        </div>

        <div align="center" >
            <img src="rolexpic/messageImage_1574094037376.jpg" class="img-fluid" alt="Responsive image">
        </div>

        <br>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js.js"></script>

    </body>
</html>
