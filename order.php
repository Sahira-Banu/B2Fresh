<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }



    // deleting  order from wishlist
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn, "DELETE  FROM `orders` WHERE id='$delete_id' ") or die('query failed');

        header('location:order.php');
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
                mysqli_query($conn, "DELETE * FROM ` cart` WHERE user_id='$user_id'");
                $messsage[]='order placed successfully';
                header('location:checkout.php');
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
        <h1>order summaries</h1>
       </div>
       <div class="title2">
            <a href="home.php">home</a> <span>/ order summaries</span>
        </div>
      <br> 
   <section class="order">
       <div class="box-container">
       <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id='$user_id'") or die('query failed');
            if(mysqli_num_rows($select_orders)>0){
                while($fetch_orders=mysqli_fetch_assoc($select_orders)){
                
            ?>   
            <div class="box">
                <p>placed on : &nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['placed_on']?></span>  </p>
                <p>name :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['name']?></span></p>    
                <p>number :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span><?php echo $fetch_orders['number']?></span></p>    
                <p>email :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['email']?></span></p>    
                <p>address :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['address']?></span></p>    
                <p>payment method : &nbsp <span><?php echo $fetch_orders['method']?></span></p>    
                <p>orders :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['total_products']?></span></p>    
                <p>total price :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>Rs.<?php echo $fetch_orders['total_price']?></span>/=</p>    
                <p>payment status :  &nbsp&nbsp&nbsp<span><?php echo $fetch_orders['payment_status']?></span></p>    <br>
                <center><a href="order.php?delete=<?php echo $fetch_orders['id']; ?>" class="btn" onclick="
                      return confirm('delete this')">Delete</a>  </center>
                      
            </div>
            <?php 
                }
            }else{
                echo '
                <div class="empty">
                  <p>no orders place yet</p>
                </div>

            ';
            }
            ?>
       </div>
   </section>
   
  <br>
       <?php include 'footer.php'?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>


</body>
</html>
