<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['passcode'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    $checkUser = "SELECT * from `customers` where email='$email'";
    $result=mysqli_query($con,$checkUser);
    $count = mysqli_num_rows($result);


    if($count>0){
        header("Location: signup.php?error=User already exist");
    }else{
        $sql="insert into `customers` (name,email,mobile,address,passcode)
        values('$name','$email','$mobile','$address','$pass')";
        if($con->query($sql)){
            header('Location:registersuccess.php');
        }else{
            die(mysqli_error($con));
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>School Project -  Game store</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/signup.css?v=1'>
</head>
<body>
    <nav>
        <a href="./index.php"><h1>Gamezone <span>X</span></h1></a>
        <ul>
            <li class="home-btn"><a href="./index.php">Home</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./signup.php">Signup</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- LOG IN FORM -->
    <form method="post">
        <h2>Signup Now</h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class='error' style='background:#F2DEDE; color: #A94442; padding: 10px;width: 60%;text-align:center; border-radius: 5px; margin-top:10px;'><?php  echo $_GET['error']; ?></p>
        <?php }   ?>
        <input type="email" placeholder="abc@mail.com" name="email">
        <input type="text" placeholder="name" name="name">
        <input type="text" placeholder="address" name="address">
        <input type="text" placeholder="mobile" name="mobile">
        <input type="password" placeholder="Password" name="passcode">
        <button type='submit' name='submit'>Signup</button>
        <p>Already have an account ? <a href="./login.php">login now.</a></p>
    </form>

</body>
</html>