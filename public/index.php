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
    ?>

    <div class="header">
        <div class="icon">
            <a href="index.php"></a><img src="resources/images/3.png" alt="Tinda" style=""></a>
        </div>
        <div class="hcatscont">
            <div class="hcats">
                <p class="drop">Categories</p>
                <div class="dropcont">
                    <a href="#">Men</a>
                    <a href="#">Women</a>
                    <a href="#">Children</a>
                </div>
            </div>
        </div>
        <div class="SoT">
            <!-- MAKE THIS CONDITIONAL IF USER IS SELLER -->
            <a href="addproduct.php">Sell on Tinda</a>  
        </div>
        <div class="searchbar">
            <form>
            <input type="text" placeholder="  Look for great finds on Tinda!">
            <button type="submit" class="search"><img src="resources/images/search.png" alt=""></button>
            </form>
        </div>
        <div class="cart">
            <a href=#><img src="resources/images/cart.png" alt="Cart" class="carti"><a>
        </div>   
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['user'])) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    "<div class='accs'>
                            <div class='acdrop'>
                                <a href='editprofile.php'class='ep'>" . $user['username'] . "</a>
                                <div class='dropcont'>
                                    <a href='#' class='vp'>View Purchases</a>
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
                <img src="resources/images/category - women.png" alt="Women">
            </div>
            <div class="men">
                <img src="resources/images/category - men.png" alt="Men">
            </div>
            <div class="children">
                <img src="resources/images/category - children.png" alt="Children">
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="divider">

        </div>
        <h1 class="subbox"><a href="newsletter.php" class="sub">Subscribe to our Newsletter</a></h1>
    </div>
</body>
</html>