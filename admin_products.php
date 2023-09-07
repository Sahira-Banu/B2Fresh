<?php
    include 'connection.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('location: login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('location: login.php');
    }


    
    /* adding products to database*/
    if(isset($_POST['add_product'])) {
        $product_name = mysqli_real_escape_string($conn, $_POST['name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['price']);
        $product_detail = mysqli_real_escape_string($conn, $_POST['product_detail']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'img/'.$image;

        $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$product_name' ") or die('query failed');
        if(mysqli_num_rows($select_product_name) >0){
            $message[] = 'product name already exist';
        }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `products`(`name`, `price`, `product_detail`, `image` )
            VALUES('$product_name', '$product_price', '$product_detail', '$image' )") or die('query failed');
            if($insert_product){
                if ($image_size > 2000000) {
                    $message[] = 'product image is too large';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'product added successfully';
                }
            }
        }
     }
 
    //  deleting products from database
     
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id='$delete_id' ") or die('query failed');
        // $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
        // unlink('img/'.$fetch_delete_image['image']);

        mysqli_query($conn, "DELETE FROM `products` WHERE id='$delete_id' ") or die('query failed');
        // mysqli_query($conn, "DELETE FROM `cart` WHERE pid='$delete_id' ") or die('query failed');
        // mysqli_query($conn, "DELETE FROM `whishlist` WHERE pid='$delete_id' ") or die('query failed');

        header('location:admin_products.php');
    }
 
    // update products
    if(isset($_POST['update_product'])) {
        $update_p_id= $_POST['update_p_id'];
        $update_p_name= $_POST['update_p_name'];
        $update_p_price= $_POST['update_p_price'];
        $update_p_detail= $_POST['update_p_detail'];
        $update_p_img= $_FILES['update_p_image']['name'];
        $update_p_image_tmp_name= $_FILES['update_p_image']['tmp_name'];
        $update_p_image_folder = 'img/'.$update_p_img;

        $update_query = mysqli_query($conn, "UPDATE `products` SET id='$update_p_id', name='$update_p_name', price='$update_p_price',
        product_detail='$update_p_detail',image='$update_p_img' WHERE id='$update_p_id' ") or die('query failed');

        if($update_query) {
            move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
            $message[]='product updated successfully';
            header('location: admin_products.php');
        }else{
            $message='product could not upload successfully';
        }
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
        <title>Document</title>
    </head>
<body>
<?php include 'admin_header.php';?>
    <div class="main">
            <div class="banner">
                <h1>products</h1>
            </div>
            <div class="title2">
                    <a href="home.php">home</a> <span>/products</span>
            </div>

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
            <!-- add product section -->
            <section class="add-products">
                <form method="post" action="admin_products.php" enctype="multipart/form-data">
                    <h1 class="title">add new product</h1>
                    <div class="input-field">
                        <label>product name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="input-field">
                        <label>product price</label>
                        <input type="text" name="price" required>
                    </div>
                    <div class="input-field">
                        <label>product detail</label>
                        <textarea name="product_detail" required></textarea>
                    </div>
                    <div class="input-field">
                        <label>image</label>
                        <input type="file" name="image" accept= "image/jpg, image/png, image/jpeg, image/webp" required>
                    </div>
                    <input type="submit" name="add_product" value="add product" class="btn">
                </form>
            </section>


            <!-- update product section -->
        <section class="update-container">
            <?php
                if(isset($_GET['edit'])) {
                    $edit_id = $_GET['edit'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$edit_id")or die('query failed');
                    if(mysqli_num_rows($edit_query)>0){
                        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
            ?>
            <form method="post" action="admin_products.php" enctype="multipart/form-data">
                <img src ="img/<?php echo $fetch_edit['image'];?>">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id'];?>">
                <input type="text" name="update_p_name" value="<?php echo $fetch_edit['name'];?>">
                <input type="number" min ="0" name="update_p_price" value="<?php echo $fetch_edit['price'];?>">
                <textarea name="update_p_detail"><?php echo $fetch_edit['product_detail'];?></textarea>
                <input type="file" name="update_p_image" accept="img/png, img/jpg, img/jpeg, img/webp" >
                <input type="submit" name="update_product" value="update" class="edit">
                <!-- <input type="reset" value="cancel" class="edit" id="close-edit" > -->
                
            </form>
            <?php               
                        }
                    }
                    echo "<script>document.querySelector('.update-container').style.display='block';</script>";
                }
            ?>
        </section>
        

      <!-- show products section -->
        <section class="show-products">
            <div class="box-container">
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products =mysqli_fetch_assoc($select_products)){
                    
                ?>
                <div class="box">
                    <img src="img /<?php echo $fetch_products['image']; ?>">
                    <p>Rs. <?php echo $fetch_products['price']; ?></p>
                    <h4><?php echo $fetch_products['name']; ?></h4>
                    <p class="detail"><?php echo $fetch_products['product_detail']; ?></p>
                    <a href="admin_products.php?edit=<?php echo $fetch_products['id'] ?>" class="btn">edit</a>
                    <a href="admin_products.php?delete=<?php echo $fetch_products['id'] ?>" class="btn" onclick="
                    return confirm('delete this product')">delete</a>
                </div>
                <?php
                    
                    }
                }
                ?>
            </div>
        </section>
       
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>