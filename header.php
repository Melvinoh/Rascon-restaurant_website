<?php
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rascon tastes</title>
    
    <link rel="stylesheet" href="./fontawsome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css"> 
    <link rel="stylesheet" href="./css/media_queries.css">
    <link rel="stylesheet" href="./css/landing.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/reviews.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/checkout.css">

    <script src="./js/jquery-3.6.1.min.js"></script>

</head>
<body>
    <header class="header ">  
        <div class="title">
            <i class="fas fa-bars " id="menu" onclick=""></i>
            <img src="./pictures/wall paper/wall paper 3.jpg" alt="logo">
            <h4>rascon tastes</h4>
            <i class="fas fa-utensils fa-sl"></i>
        </div>
        <nav id="nav">
            <a href="landing.php">home</a>
            <a href="about.php">about</a>
            <a href="mlayout.php">menu</a>
            <a href="reviews.php">reviews</a>
            <a href="reviews.php#contacts">contacts </a>
        
            <div class="cat_nav">
                <div class="cat">
                    <a href="#cart_data.php">category<i class="fa fa-caret-down" onmouseover="document.getElementById('category-nav').classList.toggle('active')"></i></a>
                </div>  
                <div id="category-nav">
                    <a href="">chicken</a>
                    <a href="">chicken</a>
                    <a href="">chicken</a>
                    <a href="">chicken</a>
                </div>
            </div>
        </nav>
        <span class="icons">
            
            <i class="fas fa-user"onclick="" id="user"></i>
            <i class="fas fa-search" onclick="" id ="search"></i>
            <i class="fas fa-shopping-cart" id ="shoppingcart" onclick=""></i>
            <span id="count"> 0</span>
        </span>
    </header>
    <div class="modal" id="login_form">
        <h5>welcome to rascon Tastes</h5><br>
        <div id ="alert"></div>
        <form action=""method="post" id="login">
            <i class="fas fa-times" id="close" onclick="" ></i>
            <label for="username">username</label><br>
            <input type="text" name="username"><br>
            <label for="password">password</label><br>
            <input type="password" name="password"><br>
            <input type="checkbox" name = "check"><label for="">remember me?</label><br><br>
            <input type="submit" value="log in"><br><br>
            <span>don't have an account ?</span><br><br>
            <input type="button" value="create acount" onclick="document.getElementById('create_account').classList.toggle('active');document.getElementById('login_form').classList.remove('active');" id="create">
        </form>
    </div>
    <section class="modal" id="create_account">
        <form action="" method="post" action="create_account.php" id="create_form">
            <i class="fas fa-times" id="close" onclick="" ></i>
            <h5>welcome to rascon tastes </h5>
            <div class="f_container">
                <div class="names">
                    <label for="firstname">first name</label><br>
                    <input type="text" name="fname"><br>
                    <label for="">second name</label><br>
                    <input type="text" name="sname"><br>
                    <lable for="phone">phone</lable><br>
                    <input type="text" name="phone">
                </div>
                <div class="names">
                    <label for="firstname">city</label><br>
                    <input type="text" name="city"><br>
                    <label for="">email adress</label><br>
                    <input type="text" name="email"><br>
                    <lable for="zip">zip</lable><br>
                    <input type="text" name="zip">
                </div>
                <div class="names">
                    <label for="DOB">DOB</label><br>
                    <input type="text" name="DOB"><br>
                    <label for="user name">user name</label><br>
                    <input type="text" name="username"><br>
                    <lable for="">password</lable><br>
                    <input type="text" name="password">
                </div>
                <div class="gender">
                    <label for="gender">gender</label><br>
                    <input type="radio" name="male">
                    <label for="male">male</label><br>
                    <input type="radio" name="female">
                    <label for="female">female</label><br>
                    <input type="radio" name="others">
                    <lable for="others">others</lable><br>
                </div>
            </div>
            <div class="names"><input type="submit" value="create_account" name="submit"><br><br></div>
            <div class="reply">
            
            </div>
        </form>
    </section>
    <div id="searchform">
        <form action="" method="post" id="search">
            <input type="submit" value="submit" onkeyup = ""> 
            <input type="text" placeholder="search here" name="search"  >
        </form>
    </div>
    <div id ="cart_data">

        <div class="title">
            <h3>welcome to rascon cart</h3>
            <i class="fas fa-times" id="close" onclick="" ></i>
            <div id="cart" class="pb-5">
          
                            
            </div>
                
        </div>
    </div> 
    <script>
        $("#search").on("submit",function(event){

            event.preventDefault();
            var searchValues =$(this).serialize();

            $.post( "productdetails.php", searchValues, function(data){
                $(".sectcontainer").html(data);
            })
        });

        $("#search").on("keyup",function(event){

            event.preventDefault();
            var searchValues =$(this).serialize();

            $.post( "search.php", searchValues, function(data){
               //alert(data);
            })
        });


        $("#login").on("submit",function(event){

            event.preventDefault();
            var loginvalues =$(this).serialize();

            $.post("session.php?q=login", loginvalues, function(data){
                $("#alert").html(data);

            })

        });

        $("#create_form").on("submit",function(event){

            event.preventDefault();
            var formValues =$(this).serialize();

            $.post("create_account.php?q=creataccount", formValues, function(data){
                alert(data);
            })

        });
    </script>
   <script src="./js/effects.js"></script>
    