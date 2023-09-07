
<style type="text/css">
    <?php include 'admin.css';?>
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
    <header class="header">
    <div class="flex">
    <a href="home.php" class="logo"> Admin Panel </a>
     <nav class="navbar">
        <a href="admin.php">Dashboard</a>
        <a href="admin_products.php">Products</a>
        <a href="admin_orders.php">Orders</a>
        <a href="admin_user.php">users</a>
        
     </nav>
     <div class="icons">
        <i class="bx bxs-user" id="user-btn"></i>
        <i class="bx bx-list-plus" id="menu-btn" style="font-size:2rem;"></i>
    </div>
    <div class="user-box">
        <p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
        <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
        <form method="post">
            <a href="login.php" name="logout" class="btn">logout</a>   
        </form>
    </div>
    </div>
   </header> 
    </body>
    </html>