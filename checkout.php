<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }

     // order placed
     if(isset($_POST['order_btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $method= mysqli_real_escape_string($conn, $_POST['method']);
        $address= mysqli_real_escape_string($conn, $_POST['address']);
       
        $placed_on = date('d-M-Y');
        $cart_total = 0;
        $cart_products[]='';
        $cart_query =mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'")or die('query failed');

        if(mysqli_num_rows($cart_query)>0){
            while($cart_item= mysqli_fetch_assoc($cart_query)){
                $cart_products[] = $cart_item['name'].'('.$cart_item['quantity'].')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total+=$sub_total;
            }
        }
        $total_products = implode(', ',$cart_products);
        mysqli_query($conn, "INSERT INTO `orders`(`user_id`,`name`,`number`,`email`,`method`,`address`,
                `total_products`,`total_price`, `placed_on`) VALUES ('$user_id','$name','$number','$email','$method',
                '$address','$total_products','$cart_total','$placed_on')");
                mysqli_query($conn, "DELETE  FROM `cart` WHERE user_id='$user_id'");
                $messsage[]='order placed successfully';
                header('location:order.php');
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
    <div class="banner">
        <h1>check out</h1>
       </div>
       <div class="title2">
            <a href="home.php">home</a> <span>/ checkout</span>
        </div>
       
    <section class="checkout">
    <div class="checkout-form">
        <h1 class="title">Billing Details</h1>
        
        <div class="display-order">
            <?php 
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id' ")or die('query failed');
               $total = 0;
               $grand_total=0;
               if(mysqli_num_rows($select_cart)>0){
                while($fetch_cart =mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price']*$fetch_cart['quantity']);
                    $grand_total = $total += $total_price;
            ?>
            <span><?= $fetch_cart['name'];?>(<?=$fetch_cart['quantity'];?>)</span>
            <?php
                }
               };
            ?>
            <span class="grand-total">Total amount payable : Rs. <?php echo $grand_total;?></span>
        </div>
        <form method="post">
             <div class="input-field">
                
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="input-field">
                
                <input type="text" name="number" placeholder="enter your number" required maxlength=10>
            </div>
            <div class="input-field">
                
                <input type="text" name="email" placeholder="enter your email" required>
            </div>
            <div class="input-field">
            <input type="text" name="method" placeholder="type 'cash on delivery' here">
            </div>
            
            <div class="input-field">
                <input type="textarea" name="address" placeholder="address">
            </div>
            
            <input type="submit" name="order_btn" class="btn" value="place order">
        </form>
     </div>
       
   </section>
  
       <?php include 'footer.php'?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>


</body>
</html>
