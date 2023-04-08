<?php
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['email']) ) {

include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>School Project -  Game store</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/product.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/img.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        body{
            background: rgb(36, 38, 41);
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        .alert, #loader {
            display: none;
        }
        /* SCROLL ANIMATION */

        .alert{
            background:red;
            text-align:center;
            position: relative;
            margin:0px 10px;
            border-radius:5px;
            padding:20px;
        }

        .alert button{
            position: absolute;
            right:0%;
            top: 0%;
            background:none;
            border:none;
            color:white;
            margin:6px;
            font-size:20px;
            cursor:pointer;
        }

        button.header-product{
            position: relative;
        }

        button.header-product span{
            position: absolute;
            top: -10%;
            right: 0;
            background:white;
            height: 25px;
            color:black;
            width: 25px;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:5px;
            border-radius:50%;
        }

        .game-box{
            width: 30%;
            margin: 10px;
            height: 50vh;
        }

        .game-box h3, .game-box p, .game-box button{
            margin: 5px 0px;
        }

        .game-box button{
            background:red;
            padding: 10px;
            border-radius:4px;
            color:white;
            border:none;
            cursor: pointer;
        }

        .game-box img{
            width: 100%;
            height: 200px;
        }


        .hidden{
            opacity: 0;
            transition: all 1s;
            filter: blur(5px);
            transform: translateX(-100%);
        }

        .show{
            filter: blur(0);
            transform: translateX(0);
            opacity: 1;
        }

        .logo:nth-child(2){
            transition-delay: 200ms;
        }

        .logo:nth-child(3){
            transition-delay: 300ms;
        }

        .logo:nth-child(4){
            transition-delay: 600ms;
        }

        @media only screen and (max-width:768px){

            .game-box{
                width: 100% !important;
                height: 60vh;
            }
            .game-box img{
            width: 100%;
            height: 270px;
        }
        }
    
    </style>
</head>
<body>
    <nav>
        <h1>Game <span>X</span></h1>
        <button><a href="./logout.php">Logout</a></button>
    </nav>
    <?php            
	require 'classes/customer.class.php';
    $emailUser = $_SESSION['email'];
    $objCustomer = new customer;
    $objCustomer->setEmail($emailUser);
    $customer = $objCustomer->getCustomerByEmailId();
    $_SESSION['cid'] = $customer['id'];
    require 'classes/cart.class.php';
    $objCart = new cart;
    $objCart->setCid($customer['id']);
    $cartItems = $objCart->getAllCartItems();
    ?>

    <header class="header-box">
        <h1 class="header-product hidden logo">Welcome <?php echo $customer['name']; ?></h1>
        <input type="search" placeholder="Search here" onkeyup="searchs()" class="search-input hidden logo">
        <button class="header-btn hidden logo"><a href="cart.php">View Cart</a><span id="itemCount"><?php echo count($cartItems)?></span></button>
    </header>

    <!-- ALL GAMES IN GAME X -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-dismissible alert-box" role="alert" id="alert-box">
                <button type="button" class="close" data-dismiss="alert" onclick="closeAlert()" aria-label="Close">x</button>
                <div id="result">Added to cart</div>
            </div>
        </div>
    </div>

    <section  class="product-game all-product">
        <h2 class="hidden">All Games</h2>
        <div class="sale-box">
        <?php

            require 'classes/workshop.class.php';
		    $objWorkshop = new workshop();
		    $workshops = $objWorkshop->getAllWorkshops();
		    foreach ($workshops as $key => $workshop) {
        ?>
            <div class="game-box bg">
                    <img src="images/<?= $workshop['image']; ?>" alt="" >
                    <h3><?= $workshop['title']; ?></h3>
                    <p>$<?= number_format( $workshop['price'], 2 ); ?></p>
                    <?php
                        $disButton = '';
                        if(array_search($workshop['id'], array_column($cartItems,'pid')) !==false){
                            $disButton = "disabled";
                        }
                    ?>
                    <button id="cartBtn_<?=$workshop['id'];?>" <?php echo $disButton ?> class="btn btn-danger" onclick="addToCart(<?=$workshop['id'];?>, this.id)" role="button">Add to Cart</button>
            </div>
            <?php } ?>
        </div>
    </section>
        <!-- FOOTER -->
    <footer>
        <p>copyright reserved. School project.</p>
    </footer>

    <script src="./js/app.js"></script>
    <script src="./js/scroll.js"></script>
    <script src="./js/search.js"></script>
    <script type="text/javascript">

        function closeAlert(){
            var alertBox = document.querySelector(".alert");
            alertBox.style.display ="none";
        }

        function addToCart(wId, btnId) {
            $.ajax({
                url: "action.php",
                data: "wId=" + wId + "&action=add",
                method: "post"
            }).done(function(response) {
                var data = JSON.parse(response);
                $('.alert').show();
                if(data.status == 0) {
				$('.alert').addClass('alert-danger');
				$('#result').html(data.msg);
			    } else {
				$('.alert').addClass('alert-success');
				$('#result').html(data.msg);
                $('#'+btnId).prop('disabled',true);
				$('#itemCount').text( parseInt( $('#itemCount').text() ) + 1);
			}
            })
        }
    </script>
</body>
</html>


<?php
}else {
    header("Location: login.php");
    exit();
}

?>