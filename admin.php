<?php
 include 'connection.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('location: login.php');
    }
?>
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
<?php include 'admin_header.php';?>
    <div class="main">
    <div class="banner">
        <h1>dashboard</h1>
       </div>
       <div class="title2">
            <a href="admin.php">home</a> <span> / dashboard</span>
        </div>
<br>
<br>
    <section class="dashboard">
        
        <div class="box-container">
            <div class="box">
                <?php
                    $total_pendings = 0;
                    $select_pendings = mysqli_query($conn, "SELECT* FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                    $total_pendings = mysqli_num_rows($select_pendings);
                    
                ?>
                <h3> <?php echo $total_pendings; ?></h3>
                <p>total pendings</p>
            </div>

            <div class="box">
                <?php
                    $total_completed = 0;
                    $select_completed = mysqli_query($conn, "SELECT* FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                    $total_completed = mysqli_num_rows($select_completed);
                  
                ?>
                <h3> <?php echo $total_completed; ?></h3>
                <p>total completed</p>
            </div>

            <div class="box">
                <?php
                    $select_orders = mysqli_query($conn, "SELECT* FROM `orders` ") or die('query failed');
                    $num_of_orders = mysqli_num_rows($select_orders);
                ?>
                <h3><?php echo $num_of_orders; ?></h3>
                <p>order placed</p>
            </div>

            <div class="box">
                <?php
                    $select_products = mysqli_query($conn, "SELECT* FROM `products` ") or die('query failed');
                    $num_of_products = mysqli_num_rows($select_products);
                ?>
                <h3><?php echo $num_of_products; ?></h3>
                <p>product added</p>
            </div>

            <div class="box">
                <?php
                    $select_users = mysqli_query($conn, "SELECT* FROM `users` WHERE user_type = 'user' ") or die('query failed');
                    $num_of_users = mysqli_num_rows($select_users);
                ?>
                <h3><?php echo $num_of_users; ?></h3>
                <p>registered users</p>
            </div>

            <div class="box">
                <?php
                    $select_admins = mysqli_query($conn, "SELECT* FROM `users` WHERE user_type = 'admin' ") or die('query failed');
                    $num_of_admins = mysqli_num_rows($select_admins);
                ?>
                <h3><?php echo $num_of_admins; ?></h3>
                <p>total admins</p>
            </div>
            
            <div class="box">
                <?php
                    $select_totaluser = mysqli_query($conn, "SELECT* FROM `users`") or die('query failed');
                    $num_of_totaluser = mysqli_num_rows($select_totaluser);
                ?>
                <h3><?php echo $num_of_totaluser; ?></h3>
                <p>total users</p>
            </div>

            
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>