<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tinda's checkout page.">
    <link rel="stylesheet" href="stylesheets/checkout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Checkout | Tinda</title>
</head>
<body>
    <?php
        echo $_POST['cartid'];   
        
        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Logout'])){
                logoutUser();
            }
        }
    ?>
    <a href=""><img src="resources/images/3.png" class="logo"></a>
    <p class="header">Checkout</p>
    
    
    <br><br><br><br>
    <hr>
    <!--<img src="resources/images/location.png" class="location">-->
    <p class="subheading">Delivery Address</p>
    <br><br>
    <p class="userAddress">Hibbard Ave, 6200 Dumaguete City, Negros Oriental, 6200</p><br>
    <p class="userContactNumber">09123456789</p>
    <hr class="line">
    <p class="subheading">Products Ordered</p>


    <br><br><br><br><br>
   
    <!-- Display Table -->
    <div class="container" id="checkouttable">
        <table class="checkout" id="checkout">
            <colgroup>
                <col class="Product">
                <col class="Unit_Price">
                <col class="QTY">
                <col class="Subtotal">
            </colgroup>
                <tr>
                    <th></th>
                    <th>Unit Price</th>
                    <th>QTY</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <th><a href=""><img src="resources/images/1.png" style="width: 10em; float: left; margin: 20px;"><br><br><br>Orange Shirt</a></th>
                    <th>&#8369; 100</th>
                    <th>3</th>
                    <th>&#8369; 300</th>
                </tr>
            <!-- Insert events from database -->
            <tbody id="checkoutdata">
                <tr>
                    <td colspan="4" class="loading_message"><br><br><br>LOADING DATA</td>
                </tr>
            </tbody>
        </table>
    </div>


    <!--Payment Method-->
    <br>
    <hr>
    <p class="subheading">Payment Method</p>
    <br><br><br><br><br>

    <form id="newsletter" class="newsletter" action="" method="post">
        <label class="form-control">
            <input type="radio" name="paymentMethod" value="BDO"/>
            BDO
        </label>

        <label class="form-control">
            <input type="radio" name="paymentMethod" value="BPI"/>
            BPI
        </label>

        <label class="form-control">
            <input type="radio" name="paymentMethod" value="">
            <input type="text" name="other_paymentMethod" placeholder="Other payment method"/>
        </label>

        <br><br>

        <!--Payment breakdown-->
        <p class="paymentHeading">Merchandise Subtotal</p><p class="sub_total">&#8369; 400</p>
        <br><br>
        <p class="paymentHeading">Shipping Total</p><p class="shipping">&#8369; 50</p>
        <br><br>
        <p class="paymentHeading">Total Payment</p><p class="total">&#8369; 450</p>


        <input type="submit" value="Place Order">

    </form>
</body>
</html>