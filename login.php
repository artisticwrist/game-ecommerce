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
    <form method="post" action="loginscript.php">
        <?php if(isset($_GET['error'])){ ?>
            <p class='error' style='background:#F2DEDE; color: white; padding: 10px;width: 60%; border-radius: 5px; margin-top:10px;'><?php  echo $_GET['error']; ?></p>
        <?php }   ?>
        <h2>Login Now</h2>
        <input type="email" placeholder="abc@mail.com" name="email">
        <input type="password" placeholder="Password" name="passcode">
        <button>Login</button>
        <p>Don't have an account yet ? <a href="./signup.php">signup now.</a></p>
        <p>Login as <a href="./adminlogin.php">admin</a></p>
    </form>

</body>
</html>