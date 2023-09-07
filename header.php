<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Document</title>
    </head>
    <body>
    <header class="header">
    <div class="flex">
    <a href="home.php" class="logo"> Blooms & Blossoms </a>
     <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="collections.php">Collections</a>
        <a href="order.php">Orders</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
     </nav>
     <div class="icons">
        <i class="bx bxs-user" id="user-btn"></i>
        <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i></a>
        <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i></a>
        <i class="bx bx-list-plus" id="menu-btn" style="font-size:2rem;"></i>
    </div>
    <div class="user-box">
        <p>username : <span><?php echo $_SESSION['user_name'];?></span></p>
        <p>email : <span><?php echo $_SESSION['user_email'];?></span></p>
        <!-- <a href="login.php" class="btn">login</a><br><br> -->
        <form method="post">
            <a href="login.php" name="logout" class="btn">logout</a>   
        </form>
    </div>
    </div>
   </header> 
    </body>
    </html>