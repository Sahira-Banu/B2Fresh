<?php
 include 'connection.php';
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
    <div class="banner">
        <h1>contact details</h1>
       </div>
       <div class="title2">
            <a href="home.php">home</a> <span>/contact details</span>
        </div>
        <br><br>
        <div class="address">
                <div class="title">
                    
                    <img src="img/contact.jpg">
                </div>
                <div class="box-container">
                    <div class="box">
                     <div>
                            <h4>address</h4>
                            <p>B2fresh, Galle Road, Colombo 04</p>
                        </div>
                    </div>
                        <div class="box">
                         <div>
                                <h4>phone number</h4>
                                <p>+94761049698</p>
                            </div>
                        </div>
                        <div class="box">
                         <div>
                                <h4>email</h4>
                                <p>www.b2fresh@gmail.com</p>
                            </div>
                        </div>
                </div>
            </div>
            <section class="services">
            <div class="box-container">
            <div class="box">  
                    <div class="detail">
                        <h1>great savings</h1>
                        <p>save big in every order</p>
                    </div>
                </div>
                <div class="box">
                    <div class="detail">
                    <h1>24*7 support</h1>
                    <p>one-on-one support</p>
                    </div>
                </div>
                <div class="box">
                <div class="detail">
                    <h1>gift vouchers</h1>
                    <p>vouchers on every festival</p>
                    </div>
                </div>
                <div class="box">
                  <div class="detail">
                    <h1>islandwide fast delivery</h1>
                    <p>within two days</p>
                    </div>
                </div>
            </div>
        </section>
            
       <?php include 'footer.php'?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>