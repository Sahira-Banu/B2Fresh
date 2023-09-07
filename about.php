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
               <h1>about us</h1>
          </div>
            <div class="title2">
                <a href="home.php">home</a> <span>/about</span>
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
       <div class="about-box">
            <div class="title">
                 <h1 style="color:darkgreen;">How we do our process</h1>
                <center><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, 
                    omnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque 
                    odit dolore suscipit similique maiores qui nulla blanditiis quae! Lorem ipsum dolor 
                    sit amet consectetur adipisicing elit. Unde autem harum nesciunt fugit tempore nostrum! 
                    Commodi possimus voluptas laboriosam maxime, ipsam, aspernatur eligendi doloremque omnis 
                    aperiam voluptatum quae, natus cum!</p></center>
           </div><br>
            <div class="about">
                <div class="row">
                     <center><img src="img/process.jpg" style="width:60%; height:50%; border-radius:5px;"></center> 
                </div>
            </div>
       </div><br><br>
     <div class="testimonial-container">
            <div class="title">
                 <h2 style="color:darkgreen;">what people say </h2><br>
                 <p style="color:gray;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet autem, recusandae magni officiis quasi, officia natus consectetur tempora perspiciatis alias aspernatur tenetur, cum numquam accusamus unde minima voluptate commodi voluptatibus?</p>
            </div>
            <div class="container">
                 <div class="testimonial-item active">
                      <h1>Katheeln Myers</h1>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, maiores itaque. Cupiditate ratione excepturi sed reiciendis minima consequatur neque iure distinctio, modi animi, consectetur incidunt ex eos quia consequuntur pariatur?</p>
                 </div>
                 <div class="testimonial-item">
                      <h1>Mark Smith</h1>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, maiores itaque. Cupiditate ratione excepturi sed reiciendis minima consequatur neque iure distinctio, modi animi, consectetur incidunt ex eos quia consequuntur pariatur?</p>
                 </div>
                 <div class="testimonial-item">
                      <h1>John Bell</h1>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, maiores itaque. Cupiditate ratione excepturi sed reiciendis minima consequatur neque iure distinctio, modi animi, consectetur incidunt ex eos quia consequuntur pariatur?</p>
                 </div>
                        <div class="left-arrow" onClick="nextSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                        <div class="right-arrow" onClick="prevSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
                       <br><br>
      </div>
    </div><br>
    <?php include 'footer.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>


</body>
</html>