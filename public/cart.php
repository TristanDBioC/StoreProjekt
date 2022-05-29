<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tinda's shopping cart page.">
    <link rel="stylesheet" href="stylesheets/cart.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Shopping Cart | Tinda</title>
</head>
<body>
<?php

        function getallcartitems() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM `cart-product` WHERE cartid='".$_SESSION['user']['activecart_id']."'";
            $result = mysqli_query($conn, $sql);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Logout'])){
                logoutUser();
            }
        }
    ?>

    <div class="header">
        <div class="icon">
            <a href="index.php"></a><img src="resources/images/3.png" alt="Tinda" style=""></a>
        </div>
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
        <?php
            if(!isset($user)) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    '<div class="accs">
                            <div class="acdrop">
                                <a href="editprofile.php"class="ep">' . $user['username'] . '</a>
                                <div class="dropcont">
                                    <a href="#" class="vp">View Purchases</a>
                                    <form method="POST">
                                        <input type="submit" value="Logout" name="Logout" class="logout">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
        ?>
        <span class="subheading">Shopping Cart</span>
    </div>
    
    <div class="main_content">
        <form id='cart' class='cart' action='' method='post'>
                    <!-- Checkbox -->
                    <div class="selectall">
                        <input type="checkbox" id="selectall" name="selectall">
                        <label for="selectall"> Select All </label>
                    </div>

                    <!-- Insert button to uncheck all checkboxes -->
                    <div class="clearselection" id="clear">
                        Clear Selection
                    </div>
                </div>

                <button class="btn2" id="deleteProduct"><img src = "resources/images/trash.png" class = "delete"> &nbsp;Delete</button>
                
                
                <!-- Display Table -->
                <div class="container" id="carttable">
                    <table class="cart" id="cart">
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
                        <tr>
                            <td><input type="checkbox" id="product1" name="product1" value="product1"></td>
                            <td><a href="product.php"><img src = "resources/images/1.png" style="width: 10em; float:left; margin: 20px;"><br><br><br><b>Cotton T-shirt</b></a></td>
                            <td>&#8369; 100</td>
                            <td>5</td>
                            <td>&#8369; 500</td>
                        </tr>
                        
                        <!-- Insert events from database -->
                        <tbody id="cartdata">
                            <tr>
                                <td colspan="5" class="loading_message"><br><br><br>LOADING DATA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <span class="checkout"><input type="submit" value="Check out"></span>
            <span class="total">&#8369; 500</span>
            <span class="subHeader">Subtotal </span>        
            
        </form>
    </div>

</body>
</html>