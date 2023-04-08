<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add to cart functionality in php and mysql</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<style>

    form{
        height: 90vh;
    }
  h2, h3 {
    margin-top: 0px;
    padding-top: 0px;
  }
  td {
    border-top: none !important;
  }


  .form-checkout input{
    margin: 10px 0px;
    padding: 10px 7px;
    border-radius:5px;
  }
</style>
</head>
<body>

  <?php 
    session_start();

    require_once('db/DbConnect.php');
    $db   = new DbConnect();
    $conn = $db->connect();

    require 'classes/customer.class.php';
    $objCustomer = new customer();
    $objCustomer->setId($_SESSION['cid']);
    $customer = $objCustomer->getCustomerById();

    require 'classes/cart.class.php';
    $objCart = new cart($conn);
    $objCart->setCid($customer['id']);
    $cartItems = $objCart->getAllCartItems();
    $cartPrices = $objCart->calculatePrices($cartItems);
    
  ?>

  <div class="container well">
    <center><h3 style="margin:25px;">Game X Checkout</h3></center>
    <hr>
   <?php

//    if(!empty($_POST["send"])){
//     $userName = $_POST['userName'];
//     $userEmail = $_POST['userEmail'];
//     $userMobile = $_POST['mobile'];
//     $userAddress = $_POST['address'];
//     $userCity = $_POST['city'];
//     $userState = $_POST['state'];
//     $userZip = $_POST['zip'];
//     $userCountry = $_POST['country'];
//     $toEmail = $_POST["georgejoeemmanuel@gmail.com"];

//     $mailHeaders = "Name " . $userName .
//     "\r\n Email " . $userEmail .
//     "\r\n Mobile " . $userEmail .
//     "\r\n Address " . $userEmail .
//     "\r\n City " . $userEmail .
//     "\r\n State " . $userEmail .
//     "\r\n Zip " . $userEmail .
//     "\r\n Country " . $userEmail . "\r\n";

//     if(mail($toEmail, $userName, $mailHeaders)){
//         $message = "Your order has been recieved successfully.";
//     }

//    }

    if(isset($_POST['send'])){
        require 'PHPMailerAutoload.php';
        require 'credential.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(EMAIL, 'Game x');
        $mail->addAddress($_POST['userEmail']);     // Add a recipient 

        $mail->addReplyTo(EMAIL);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Game x customer order";
        $mail->Body    = '<div style="border:2px solis red;">This is the HTML message body <b>in bold!</b></div>';
        $mail->AltBody = $_POST['country'];

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
   
   ?> 
  <form method="post" name="emailContent" class="form-horizontal">
    
    <!-- <input type="hidden" name="tid" id="tid" readonly />
    <input type="hidden" name="merchant_id" value=""/>
    <input type="hidden" name="order_id" value=""/>
    <input type="hidden" name="amount" value="10.00"/> -->
    <input type="hidden" name="currency" value="INR"/>
    <input type="hidden" name="redirect_url" value="http://tutorials.lcl/cart/ccavenue/ccavResponseHandler.php"/>
    <input type="hidden" name="cancel_url" value="http://tutorials.lcl/cart/ccavenue/ccavResponseHandler.php"/>
    <input type="hidden" name="language" value="EN"/>

    <div class="row">
      <div class="col-md-7 well form-checkout">
        <h3>Billing Address</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <input class="form-control" type="text" id="billing_name" name="userName" placeholder="Username" value="<?= $customer['name']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-envelope"></span>
            </div>
            <input class="form-control" type="text" id="billing_email" name="userEmail" placeholder="123@abc.com" value="<?= $customer['email']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-earphone"></span>
            </div>
            <input class="form-control" type="text" id="billing_tel" name="mobile" placeholder="123456789" value="<?= $customer['mobile']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_address" name="address" placeholder="11, Abc road" value="<?= $customer['address']; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_city" name="city" placeholder="City" value="City">
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon addon-diff-color">
                    <span class="glyphicon glyphicon-home"></span>
                </div>
                <input class="form-control" type="text" id="billing_state" name="state" placeholder="State" value="State">
              </div>
            </div>
          </div>
          <div class="col-md-5 col-md-offset-2">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon addon-diff-color">
                    <span class="glyphicon glyphicon-map-marker"></span>
                </div>
                <input class="form-control" type="text" id="billing_zip" name="zip" placeholder="10001" value="10001">
              </div>
            </div>
          </div> 
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon addon-diff-color">
                <span class="glyphicon glyphicon-home"></span>
            </div>
            <input class="form-control" type="text" id="billing_country" name="country" placeholder="Country" value="Country">
          </div>
        </div>
      </div>
      <div class="col-md-4 col-md-offset-1 well">
        <div class="text-right">
          <h3>Your Items</h3>
          <h4><span class="glyphicon glyphicon-shopping-cart"></span><sup id="itemCount"><?= $cartPrices['itemCount']; ?></sup></h4>
          <table class="table">
            <tbody>
              <?php 
                foreach ($cartItems as $key => $cartItem) { 
               ?>    
                <tr>
                  <td align="right" width="85%">
                    <a href="#"><?= $cartItem['title']; ?></a>
                  </td>
                  <td width="15%">
                    <strong><span>&#x20b9;</span><?= ($cartItem['price']*$cartItem['quantity']); ?></strong>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <hr style="border: 1px dotted gray;">
          <p>Total: <strong>
              <span>&#x20b9;</span><?= $cartPrices['finalPrice']; ?>
            </strong>
          </p>
        </div>
        <div class="text-right">
          <input type="submit" name="send" value="Pay Now" class="btn btn-success btn-block">
          <?php if(!empty($message)){?>
            <strong><?php echo $message; ?></strong>
            <?php } ?>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>
