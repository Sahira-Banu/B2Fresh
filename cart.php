<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }

    // update products to cart - need to solve
    if(isset($_POST['update_quantity_btn'])){
        $update_quantity_id = $_POST['update_quantity_id'];
        $update_value =$_POST['update_quantity'];

        $update_query =mysqli_query($conn, "UPDATE `cart` SET quantity='$update_value' WHERE id='$update_quantity_id'")or die('query failed');
        if($update_query){
            header('location:cart.php');
        }
     }
     
     // adding products to cart
    //  if(isset($_POST['add_to_cart'])){
    //     $product_id =$_POST['product_id'];
    //     $product_name =$_POST['product_name'];
    //     $product_price =$_POST['product_price'];
    //     $product_image =$_POST['product_image'];
    //     $product_quantity = $_POST['product_quantity'];
        
    //     $cart_number= mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'")or die('query failed');
        
    //     if(mysqli_num_rows($cart_number)>0){
    //         $message[]='product already exists in cart';
    //     }else{
    //         mysqli_query($conn, "INSERT INTO `cart` (`user_id`,`pid`, `name`, `price`,`quantity`, `image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
    //         $message[]='prouduct successfully added to cart';
    //     }
    //  }
    

     // deleting products from cart
     if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn, "DELETE FROM `cart` WHERE id='$delete_id' ") or die('query failed');

        header('location:cart.php');
    }
     // deleting all products from cart
     if(isset($_GET['delete_all'])) {
       
       
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id' ") or die('query failed');

        header('location:cart.php');
    }
?>
<style type="text/css">
    <?php include 'style.css';?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Document</title>
</head>
<body>
     <?php include 'header.php';?>
     <div class="main">
     <div class="banner">
        <h1>my cart</h1>
     </div>
     <div class="title2">
            <a href="home.php">home</a> <span>/ cart</span>
        </div>
        <br>
      
      <h1 class="title">products  added in cart</h1>
      
      <div class="view">
          <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id' ") or die('query failed');
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){

           
           ?>
         <div class="view-container">
               <div class="view-box">
          
                 <center><img src="img/<?php echo $fetch_cart['image'];?>">
            
                     <form method="post">
                          <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']?>">
                          <div class="qty">
                                <center><input type="text" min="1" name="update_quantity" value="<?php echo $fetch_cart['quantity']?>">
                                <input type="submit" name="update_quantity_btn" value="update" style="font-size:17px; text-transform:uppercase;"></center>
                                <br>
                          </div>
                               <?php echo $fetch_cart['name'];?> <br>
                               Rs.<?php echo $fetch_cart['price'];?>/= 
                                </center>
                                <?php $total_amt = $fetch_cart['price']*$fetch_cart['quantity'];?>
                                <center> Total Amount : Rs.<span><?php echo $total_amt ?></span>
                                <a href="cart.php?delete=<?php echo $fetch_cart['id'] ?>" class="btn" onclick="
                                return confirm('delete this product')">delete</a></center> 
                      </form>
                 </div>
    
          </div>
                     <?php
                         $grand_total+= $total_amt;
                             }
                             }else{
                             echo '<p class="empty">no products added yet!</p>';
                             }
                      ?>
       </div><br><br>

            <div class="dlt">
                    <center><a href="cart.php?delete_all" class="btn" onclick="return
                        confirm('do you want to delete all from cart')">clear cart</a></center> 
            </div>
                <div class="wishlist_total">
                        <p>total amount payable : Rs.<span> <?php echo $grand_total ?>/=</span></p>
                        <a href="collections.php" class="btn">continue shopping</a>
                        <a href="checkout.php" class="btn <?php  echo ($grand_total >1)?>">proceed to checkout</a>
                </div>
      
     <?php include 'footer.php';?>
     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>