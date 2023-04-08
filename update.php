<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `customers` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$address=$row['address'];
$pass=$row['passcode'];



if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $pass=$_POST['passcode'];
   

    $sql="update `customers` set id='$id',name='$username',email='$email',address='$address',mobile='$mobile',passcode='$pass' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('Location:admin.php');
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
    <title>Update user admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/register.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/signup.css?v=1'>
</head>
<body>
            <form method="post">
                <h2>Update Profile</h2>
                <input type="email" placeholder="abc@mail.com" name="email" value=<?php echo $email?>>
                <input type="text" placeholder="Name" name="Name" value=<?php echo $name?>>
                <input type="text" placeholder="Mobile" name="mobile" value=<?php echo $mobile?>>
                <input type="text" placeholder="Address" name="address" value=<?php echo $address?>>
                <input type="password" placeholder="Password" name="passcode" value=<?php echo $pass?>>
                <button type='submit' name='submit'>Update</button>
            </form>
    <script src="js/app.js"></script>
</body>
</html>