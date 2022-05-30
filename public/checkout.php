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
        require 'php/cartscript.php';
        function getallcartitems($cartid) {
            if (!cartexist($_SESSION['user']['activecart_id'])) {
                return array();
            }
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM `cart-product` WHERE cartid='".$cartid."'";
            $result = mysqli_query($conn, $sql);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        function getnameandimage($prodid) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT name, imagepath FROM product WHERE id='".$prodid."'";
            $result = mysqli_query($conn, $sql);
            $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $prod[0];
        }

        function getseller($prodid) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT sellerid FROM product WHERE id='".$prodid."'";
            $result = mysqli_query($conn, $sql);
            $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $prod[0]['sellerid'];
        }

        function checkout() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            // Set Sellersales
            $prods = getallcartitems($_SESSION['user']['activecart_id']);
            $grandtotal = 0;
            foreach($prods as $product) {
                $sellerid =  getseller($product['productid']);
                $buyerid = $_SESSION['user']['id'];
                $productid = $product['productid'];
                $quantity = $product['quantity'];
                $total = $product['total'];
                $timestamp = time();
                $sql = "INSERT INTO sales VALUES ('0','".
                                                $sellerid."','".
                                                $buyerid."','".
                                                $productid."','".
                                                $quantity."','".
                                                $total."','".
                                                $timestamp."')";
                mysqli_query($conn, $sql);
                $grandtotal += $total;
            }
            $sql = "UPDATE cart SET ischeckedout='1', total='".$grandtotal."' WHERE id='".$_SESSION['user']['activecart_id']."'";
            $result = mysqli_query($conn, $sql);
            
            return $result;
        }
        
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
            if (isset($_POST['checkout'])) {
                if(checkout()) {
                    header('Location: index.php');
                }
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
                <?php
                    $products = getallcartitems($_SESSION['user']['activecart_id']);
                    $total = 0;
                    if (count($products) == 0) {
                        header('Location: cart.php');
                    } else {
                        foreach ($products as $product) {
                            $prodpathname = getnameandimage($product['productid']);
                            $name = $prodpathname['name'];
                            $path = $prodpathname['imagepath'];
                            $total += $product['total'];
                            echo
                            "<tr>
                                <th><a href='product.php?id=".$product['productid']."'>
                                <img src='".$path."' style='width: 10em; float: left; margin: 20px;'>
                                <br><br><br>Orange Shirt</a></th>
                                <th>&#8369; ".$product['total']/$product['quantity']."</th>
                                <th>".$product['quantity']."</th>
                                <th>&#8369; ".$product['total']."</th>
                            </tr>";
                        }
                    }
                ?>
            <!-- Insert events from database -->
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
        <p class="paymentHeading">Merchandise Subtotal</p><p class="sub_total">&#8369; <?php echo $total;?></p>
        <br><br>
        <p class="paymentHeading">Shipping Total</p><p class="shipping">&#8369; 50</p>
        <br><br>
        <p class="paymentHeading">Total Payment</p><p class="total">&#8369; <?php echo $total+50;?></p>


        <input type="submit" name='checkout' value="Place Order">

    </form>
</body>
</html>