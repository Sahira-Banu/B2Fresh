<?php
 include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }
?>
<style type="text/css">
    <?php include 'style.css';?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="main">
     <section>
        <div class="home-section">
          <div class="slider">
                <div class="slider_slider slide1">
                      <div class="overlay"></div>
                       <div class="slide-detail">
                            <h1 style="text-transform:uppercase; font-weight:bold; color:white;">See our collections </h1>
                            <br>
                            <a href="collections.php" class="btn">shop now</a> 
                        </div>
                                <div class="hero-dec-top"></div>
                                <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider_slider slide2">
                       <div class="overlay"></div>
                           <div class="slide-detail">
                               <h1 style="text-transform:uppercase; font-weight:bold; color:white;">welcome to our store</h1>
                               <br>
                               <a href="collections.php" class="btn">shop now</a> 
                            </div>
                                      <div class="hero-dec-top"></div>
                                      <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                 <div class="slider_slider slide3">
                        <div class="overlay"></div>
                            <div class="slide-detail">
                                 <h1 style="text-transform:uppercase; font-weight:bold; color:white;">make your mood fresh</h1>
                                 <br>
                                 <a href="collections.php" class="btn">shop now</a> 
                           </div>
                                       <div class="hero-dec-top"></div>
                                       <div class="hero-dec-bottom"></div>
                 </div>
                 <!-- slide end -->
                 <div class="slider_slider slide4">
                      <div class="overlay"></div>
                       <div class="slide-detail">
                            <h1 style="text-transform:uppercase; font-weight:bold; color:white;">See our collections </h1>
                            <br>
                            <a href="collections.php" class="btn">shop now</a> 
                        </div>
                                <div class="hero-dec-top"></div>
                                <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider_slider slide5">
                       <div class="overlay"></div>
                           <div class="slide-detail">
                               <h1 style="text-transform:uppercase; font-weight:bold; color:white;">welcome to our store</h1>
                               <br>
                               <a href="collections.php" class="btn">shop now</a> 
                            </div>
                                      <div class="hero-dec-top"></div>
                                      <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                 <div class="slider_slider slide6">
                        <div class="overlay"></div>
                            <div class="slide-detail">
                                 <h1 style="text-transform:uppercase; font-weight:bold; color:white;">make your mood fresh</h1>
                                 <br>
                                 <a href="collections.php" class="btn">shop now</a> 
                           </div>
                                       <div class="hero-dec-top"></div>
                                       <div class="hero-dec-bottom"></div>
                 </div>
                 <!-- slide end -->
                         <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
                         <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
           </div>
        </div>
    </section>
        <!-- home slider end -->
       
        <section class="container">
            <div class="box-container">
            <div class="box">
                <span>Fresh Flowers</span>
                <h1>save up to 20% off</h1>
                <span>a bunch of fresh flowers refresh your mood</span>
                <br><br>
            </div>
          </div>
        </section>
       <section class="shop">
            <div class="title">
               <h1>New Collections</h1>
            </div>
            
            <div class="box-container">
                <div class="box">
                    <img src="img/1.jpg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
                <div class="box">
                    <img src="img/2.jpg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
                <div class="box">
                    <img src="img/7.jpg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
                <div class="box">
                    <img src="img/4.jpg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
                <div class="box">
                    <img src="img/9.jpeg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
                <div class="box">
                    <img src="img/6.jpg">
                    <a href="collections.php" class="btn">shop</a>
                </div>
            </div>
        </section>
        <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="img/offer.jpeg">
                    <div class="detail">
                        <span>BIG OFFERS</span>
                        <h1>Extra 10% off</h1>
                        <a href="collections.php" class="btn">shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/offer2.jpeg">
                    <div class="detail">
                        <span>Gift Bunches</span>
                        <h1>Grab now</h1>
                        <a href="collections.php" class="btn">shop now</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="address">
            <br>
        <div class="title">
                    <h1>Our &nbsp Fresh &nbsp Flower &nbsp Providers</h1>
                </div>
            <div class="box-container">
               <div class="box">
                    <div class="detail">
                        <img src="img/sup1.jpg">
                        <h2>Sofhi Andria</h2>
                    </div>
                </div>
                <div class="box">
                    <div class="detail">
                        <img src="img/sup2.jpg">
                         <h2>Jose Alexender</h2>
                    </div>
                </div>
                <div class="box">
                    <div class="detail">
                        <img src="img/sup3.jpg">
                         <h2>Kathrina Feng</h2>
                    </div>
                </div>
            </div><br>
       </section>  
    
       <br><br>
        <?php include 'footer.php'?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>


</body>
</html>