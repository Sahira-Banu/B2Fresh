<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location: login.php');
    }

    // adding products to wishlist
     

     // adding products to cart
     if(isset($_POST['add_to_cart'])){
        $product_id =$_POST['product_id'];
        $product_name =$_POST['product_name'];
        $product_price =$_POST['product_price'];
        $product_image =$_POST['product_image'];
        $product_quantity = 1;
        
        $cart_number= mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'")or die('query failed');
        
        if(mysqli_num_rows($cart_number)>0){
            $message[]='product already exists in cart';
        }else{
            mysqli_query($conn, "INSERT INTO `cart` (`user_id`,`pid`, `name`, `price`,`quantity`, `image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
            $message[]='prouduct successfully added to cart';
        }
     }

     // deleting products from wishlist
     if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE id='$delete_id' ") or die('query failed');

        header('location:wishlist.php');
    }
     // deleting all products from wishlist
     if(isset($_GET['delete_all'])) {
       
       
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id='$user_id' ") or die('query failed');

        header('location:wishlist.php');
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
        <h1>my wishlist</h1>
     </div>
     <div class="title2">
            <a href="home.php">home</a> <span>/ wishlist</span>
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
       
       <div class="view">
          <?php
                $grand_total = 0;
                $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id' ") or die('query failed');
                if(mysqli_num_rows($select_wishlist)>0){
                    while($fetch_wishlist=mysqli_fetch_assoc($select_wishlist)){

           
           ?>
         <div class="view-container">
               <div class="view-box">
          
                 <center><img src="img/<?php echo $fetch_wishlist['image'];?>">
            
                     <form method="post">
                        <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id'];?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name'];?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price'];?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image'];?>"><br>
                          
                                <?php echo $fetch_wishlist['name'];?><br>
                                Rs.<?php echo $fetch_wishlist['price'];?>/= <br> </center><br>
                                <div class="button-flex">
                                    <button type="submit" name="add_to_cart" class="btn">add to cart<i class="bx bx-cart"></i></button><br> <br>
                                    <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id'] ?>" class="btn" onclick="
                                    return confirm('delete this product')">delete</a>
                                </div>
                      </form>
                 </div>
    
          </div>
                     <?php
                        
                             }
                             }else{
                             echo '<p class="empty">no products added yet!</p>';
                             }
                      ?>
       </div><br><br>



      <div class="wishlist_total">
         <!-- <p>total amount payable : <span> <?php echo $grand_total ?>/=</span></p> -->
         <a href="collections.php" class="btn">continue shopping </a>
         <a href="wishlist.php?delete_all" class="btn <?php  echo ($grand_total >1)?>" onclick="return
         confirm('do you want to delete all from wishlist')">clear wishlist</a>
      </div>
     <?php include 'footer.php';?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>