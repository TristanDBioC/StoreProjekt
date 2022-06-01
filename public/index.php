<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Welcome to Tinda</title>

    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/index.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
</head>
<body>
    <?php
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            logoutUser();
        }

        if(isset($_GET['purchased'])) {
            echo    "<div class='modalbg' id='modal'>
                        <div class='modal'>
                            <h1>Checkout Successful!</h1>
                            <button id='modalClose' class='modalClose'>Close</button>
                        </div>
                    </div>";
        }

    ?>

    

    <div class="header">
        <div class="icon">
            <a href="index.php"><img src="resources/images/3.png" alt="Tinda" style=""></a>
        </div>
        <div class="hcatscont">
            <div class="hcats">
                <p class="drop">Categories</p>
                <div class="dropcont">
                    <a href="productpage.php?category=men">Men</a>
                    <a href="productpage.php?category=women">Women</a>
                    <a href="productpage.php?category=children">Children</a>
                </div>
            </div>
        </div>
        <div class="SoT">
            <!-- MAKE THIS CONDITIONAL IF USER IS SELLER -->
            <a href="addproduct.php">Sell on Tinda</a>  
        </div>
        <div class="searchbar">
            <form method='get' action='productpage.php'>
            <input type="text" name='search' laceholder="Look for great finds on Tinda!">
            <button type="submit" class="search"><img src="resources/images/search.png" alt=""></button>
            </form>
        </div>
        <div class="cart">
            <a href="cart.php"><img src="resources/images/cart.png" alt="Cart" class="carti"><a>
        </div>   
        <?php
            if(!isset($_SESSION['user'])) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    "<div class='accs'>
                            <div class='acdrop'>
                                <a href='editprofile.php'class='ep'>" . $user['username'] . "</a>
                                <div class='dropcont'>
                                    <a href='purchasehistory.php' class='vp'>View Purchases</a>
                                    <form method='POST'>
                                        <input type='submit' value='Logout' name='Logout' class='logout'>
                                    </form>
                                </div>
                            </div>
                        </div>";
            }
        ?>
    </div>
    
    <div class="body">
        <div class="title">
            <h1>Categories</h1>
        </div>
        <div class="bcats">
            <div class="women">
                <a href="productpage.php?category=women"><img src="resources/images/category - women.png" alt="Women"></a>
            </div>
            <div class="men">
                <a href="productpage.php?category=men"><img src="resources/images/category - men.png" alt="Men"></a>
            </div>
            <div class="children">
                <a href="productpage.php?category=children"><img src="resources/images/category - children.png" alt="Children"></a>
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="divider">

        </div>
        <h1 class="subbox"><a href="newsletter.php" class="sub">Subscribe to our Newsletter</a></h1>
    </div>

    <script src="bundles/checkout.js"></script>
</body>
</html>