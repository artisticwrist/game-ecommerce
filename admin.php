<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

include 'connect.php';?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>School Project -  Game store</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/signup.css?v=1'>
    <style>
        /* admin table */
        table{
            margin-top: 70px;
            width: 60%;
        }

        th,td{
            text-align:center;
        }

        button{
            border:none;
            background:red;
            padding: 5px;
            border-radius:5px;
        }

        table button a{
            color:white;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <nav class='display__flex align__center justify__space_between'>
        <h3>Dashbooard</h3>
        <button><a href="signup.php" class="text-light">Register User</a></button>
        <button>
            <a href="logout.php" class="text-light">Logout</a>
        </button>
    </nav>
    <h1>welcome <?php echo $_SESSION['user_name']?></h1>
    <table class="table ">
        <thead>
            <tr >
                <th scope="col">Sl no</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>


            <?php
            
            $sql="Select * from `customers`";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $name=$row['name'];
                    $email=$row['email'];
                    $pass=$row['passcode'];
                    echo '
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$pass.'</td>
                        <td>
                            <button class="btn"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                            <button class="btn"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                        </td>
                    </tr> ';

                }
            
            }

            
            ?>
        </tbody>
</table>
</body>
</html>
<?php

}else{
    header("Location: adminlogin.php?error=Incorrect admin name or password");
    exit();  
}

?>