<?php
 include 'connection.php';

 if(isset($_POST['submit-btn'])) {
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

   $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' ") or die('query failed');

   if(mysqli_num_rows($select_user) > 0) {
    $message[] = 'user already exist';
   } else{
    if($password != $cpassword) {
        $message[] = 'wrong password';
    } else{
        mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')") or die ('query failed');
        $message[] = 'successfully registered';
        header('location: login.php');
    }
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
   
<section class="form-container">
<div class="title">
            <h3>Don't have an account? register now</h3>
               
            <form action="" method="post">
            <input type="text" name="name" placeholder="enter your name" required maxlength="50">
            <input type="email" name="email" placeholder="enter your email" required>
            <input type="password" name="password" placeholder="enter your password" required maxlenth="4">
            <input type="password" name="cpassword" placeholder="re-enter your password" required maxlength="4">
            <input type="submit" name="submit-btn" class="btn" value="register now">
            <p>Already have an account ? <a href="login.php">login </a></p>
        </form>
</div>
    </section>
   
</body>
</html>