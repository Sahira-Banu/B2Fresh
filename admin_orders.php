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

    //  deleting order details from database
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
       
        mysqli_query($conn, "DELETE  FROM `orders` WHERE id='$delete_id' ") or die('query failed');

        header('location:admin_orders.php');
    }
  
    //update order details
    if(isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];

        mysqli_query($conn, "UPDATE `orders` SET payment_status='$update_payment' WHERE id='$order_id' ")or die('query failed');
        $message[] = 'payment status updated successfully';

        header('location:admin_orders.php');
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
        <h1>total placed orders</h1>
       </div>
       <div class="title2">
            <a href="home.php">home</a> <span>/orders</span>
        
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
        <section class="order-container">
        <div class="box-container">
            <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders` ") or die('query failed');
                if(mysqli_num_rows($select_orders)>0) {
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)) {
                
            ?>
            <div class="box">
                <p>user name: &nbsp&nbsp<span><?php echo $fetch_orders['name']; ?></span></p>
                <p>user id:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['user_id']; ?></span></p>
                <p>placed On:&nbsp&nbsp <span><?php echo $fetch_orders['placed_on']; ?></span></p>
                <p>number: &nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['number']; ?></span></p>
                <p>email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['email']; ?></span></p>
                <p>total price: &nbsp<span>Rs.<?php echo $fetch_orders['total_price']; ?> /= </span></p>
                <p>method: &nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['method']; ?></span></p>
                <p>address:&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_orders['address']; ?></span></p>
                <p>total packages: <span><?php echo $fetch_orders['total_products']; ?></span></p>
                <form method="post">
                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                    <select name="update_payment">
                        <option disabled selected><?php echo $fetch_orders['payment_status'];?></option>
                        <option value="pending" >Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                    <input type="submit" name="update_order" value="update" class="btn">
                    <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="btn" onclick="
                      return confirm('delete this')">Delete</a>
                </form>
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