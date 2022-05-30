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
    <!-- Checkbox -->
    <div class="selectall">
        <input type="checkbox" id="selectall" name="selectall">
        <label for="selectall">Select All</label>
    </div>

    <!-- Insert button to uncheck all checkboxes -->
        <div class="clearselection" id="clear">
        Clear Selection
        </div>
    

    <!-- Display Table -->
    <div class="container" id="eventtable">
        <table class="events" id="events">
            <colgroup>
                <col class="tick">
                <col class="Product">
                <col class="Unit_Price">
                <col class="QTY">
                <col class="Subtotal">
            </colgroup>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Unit Price</th>
                    <th>QTY</th>
                    <th>Subtotal</th>
                </tr>
            <!-- Insert events from database -->
            <tbody id="eventsdata">
                <tr>
                    <td colspan="5" class="loading_message"><br><br><br>LOADING DATA</td>
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