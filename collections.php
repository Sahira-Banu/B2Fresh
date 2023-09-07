<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }

    // adding products to wishlist
     if(isset($_POST['add_to_wishlist'])){
        $product_id =$_POST['product_id'];
        $product_name =$_POST['product_name'];
        $product_price =$_POST['product_price'];
        $product_image =$_POST['product_image'];
        
        $wishlist_number= mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id='$user_id'")or die('query failed');
        $cart_number= mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'")or die('query failed');
        
        if(mysqli_num_rows($wishlist_number)>0){
            $message[]='product already exists in wishlist';
        // }else if(mysqli_num_rows($cart_number)>0){
        //     $message[]='product already exists in cart';
        }else{
            mysqli_query($conn, "INSERT INTO `wishlist` (`user_id`,`pid`, `name`, `price`, `image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')");
            $message[]='product successfully added to wishlist';
        }
     }

     // adding products to cart
     if(isset($_POST['add_to_cart'])){
        $product_id =$_POST['product_id'];
        $product_name =$_POST['product_name'];
        $product_price =$_POST['product_price'];
        $product_image =$_POST['product_image'];
        $product_quantity =$_POST['product_quantity'];
        
        $cart_number= mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'")or die('query failed');
        
        if(mysqli_num_rows($cart_number)>0){
            $message[]='product already exists in cart';
        }else{
            mysqli_query($conn, "INSERT INTO `cart` (`user_id`,`pid`, `name`, `price`,`quantity`, `image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
            $message[]='product successfully added to cart';
        }
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
              <h1>our collections</h1>
          </div>
       <div class="title2">
            <a href="shop.php">home</a> <span>/ collections</span>
        </div>
       <br>
       <?php
            if(isset($message)) {
              foreach ($message as $message){
               echo '
             <div class="message">
              <span> '.$message.'</span>
              <i class="bx bx-x-circle" onclick="this.parentElement.remove()"></i>
             </div>
            ';
              }
           }   
        ?>
     <section class="products">
          <div class="box-container">
              <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products=mysqli_fetch_assoc($select_products)){

           
               ?>
                <form action="" method="post" class="box" >
                    <center><img src="img/<?php echo $fetch_products['image'];?>"></center><br>
                   
                   <center> <div class="name"><?php echo $fetch_products['name'];?></div>
                    <div class="price">Rs.<?php echo $fetch_products['price'];?>/=</div> </center>
                    
                    
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'];?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
                    <input type="hidden" name="product_quantity" value="1" min="0">
                    <div class="icon">
                        <center><button type="submit" name="add_to_wishlist" class="bx bx-heart"></button>
                        <button type="submit" name="add_to_cart" class="bx bx-cart"></button> 
                        <a href="product_detail.php?pid=<?php echo $fetch_products['id'];?>">more-details</a></center>
                        
                        
                    </div>
                    
                </form>
                <?php
                    }
                }else{
                    echo '<p class="empty">no products added yet!</p>';
                }
                ?>
          </div>
    </section>
    <br>
      <?php include 'footer.php';?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>