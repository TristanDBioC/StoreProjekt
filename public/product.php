<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Page where seller can add a product.">
    <link rel="stylesheet" href="stylesheets/product.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Product | Tinda</title>
    
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
            <a href="#">Sell on Tinda</a>
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
    </div>

    <div class="main_content">
        <div class="prodInfo">
            
            <div class="slider">
                <a href="#slide-1">1</a>
                <a href="#slide-2">2</a>
                <a href="#slide-3">3</a>
                <a href="#slide-4">4</a>
                <a href="#slide-5">5</a>
                <div class="slides">
                    <div id="slide-1"><img src="resources/images/1.png"></div>
                    <div id="slide-2"><img src="resources/images/2.png"></div>
                    <div id="slide-3"><img src="resources/images/1.png"></div>
                    <div id="slide-4"><img src="resources/images/2.png"></div>
                    <div id="slide-5"><img src="resources/images/1.png"></div>
                </div>
            </div>

            <div class="description">
                <b>Description</b>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta eget augue a accumsan. Quisque mollis rhoncus risus sit amet congue. Vivamus euismod eu lacus ut pulvinar. Sed in sem id quam egestas tincidunt quis sed mi. Vestibulum aliquet purus turpis. Nam consectetur, leo nec eleifend vulputate, lacus erat ultrices felis, sed mollis dolor turpis non libero. Fusce fringilla dui non nisi commodo, feugiat imperdiet libero faucibus. Pellentesque commodo vel massa commodo convallis. Ut venenatis lacus a vulputate ornare. Quisque tempor, ligula non eleifend convallis, justo felis cursus mauris, a efficitur risus justo et nisi. Nulla odio ligula, ultrices sed ipsum sed, suscipit ornare mi. Nam elit libero, luctus sit amet leo in, euismod fringilla neque. Proin ac posuere ligula.</p>
            </div>
        </div>

        <div class="prodDets">
            <p class="subheading">Cotton T-shirt</p>
            <a href="#" class="seller"><p class="caption">Tinda ni Linda</p></a>

            <p class="rating">5</p>
            <div class="stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
            </div>

            <br>

            <p class="price">&#8369; 300</p>
            <span class="caption2">Color</span> <span class="color">Pink</span><br><br><br><br>
            <span class="caption2">Color</span> <span class="size">S</span><br><br><br><br>
            <span class="caption2">Quantity</span>  

            <form id="product" class="product" action="" method="post">
                <span class="quantity buttons_added">
                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                </span>
                <p class="qty">50 left</p>
            <input type="submit" value="Add to cart" class="btn">
            <input type="submit" value="Buy Now" class="btn1">
            </form> 
            <br>
            <div class="reviews">
                <b style="font-size: 20px">Reviews</b>
                <br><br>
                <p class="user">Display Name</p><br>
                <div class="stars2">
                    <div class="star2"></div>
                    <div class="star2"></div>
                    <div class="star2"></div>
                    <div class="star2"></div>
                    <div class="star2"></div>
                </div>
                <p class="comment">Wow Amazing superb</p>
            </div>
        </div>
        
    </div>
    <script src="bundles/product.js"></script>
</body>
</html>