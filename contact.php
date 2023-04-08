<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $checkUser = "SELECT * from `contactmessage` where email='$email'";
    $result=mysqli_query($con,$checkUser);
    $count = mysqli_num_rows($result);

        $sql="insert into `contactmessage` (name,email,message)
        values('$name','$email','$message')";
        if($con->query($sql)){
            header("Location: contact.php?error=Message recieved successfully.");
        }else{
            die(mysqli_error($con));
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
    <link rel='stylesheet' type='text/css' media='screen' href='./css/signup.css'>
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


    <form  method="post">
        <h1>Contact Us</h1>
        <?php if(isset($_GET['error'])){ ?>
            <p class='error' style='background:#F2DEDE; color: #A94442; padding: 10px;width: 60%; border-radius: 5px; margin-top:10px;'><?php  echo $_GET['error']; ?></p>
        <?php }   ?>
        <input type="text" placeholder="Full Name" name="name">
        <input type="text" placeholder="Email Address" name="email">
        <input type="text" placeholder="Write your message here." name="message" style="height:100px;;">
        <button  type='submit' name='submit'>Submit</button>
    </form>

    <!-- FOOTER -->
    <footer>
        <p>copyright reserved. School project.</p>
    </footer>
</body>
</html>