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
       
        mysqli_query($conn, "DELETE FROM `users` WHERE id='$delete_id' ") or die('query failed');

        header('location:admin_user.php');
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
        <h1>total registered users</h1>
       </div>
       <div class="title2">
            <a href="home.php">home</a> <span>/ users</span>
        </div>
   <br>
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
    <section class="user-container">
        
        <div class="box-container">
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users` ") or die('query failed');
                if(mysqli_num_rows($select_users)>0) {
                    while($fetch_users = mysqli_fetch_assoc($select_users)) {
                
            ?>
            <div class="box">
                  <p>user id : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_users['id'];?></span></p>
                  <p>username : &nbsp<span><?php echo $fetch_users['name'];?></span></p>
                  <p>email : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span><?php echo $fetch_users['email'];?></span></p>
                  <p>user type : &nbsp<span style="color :<?php if($fetch_users['user_type']=='admin'){echo 'orange';};?>">
                  <?php echo $fetch_users['user_type'];?></span></p>
                  <br>
                  <a href="admin_user.php?delete=<?php echo $fetch_users['id'];?>" class="btn" onclick="return
                      confirm('delete this')">Delete</a> 
            </div>
             <?php
                }
            }
            ?>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>
</html>