<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Page where seller can add a product.">
    <link rel="stylesheet" href="stylesheets/product.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Product Details | Tinda</title>
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="header">
        <div class="icon">
            <img src="resources/images/3.png" alt="Tinda" style="">
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
        <div class="accs">
            <a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a>
        </div>
    </div>

    <div class="main_content">
        <div class="prodInfo">
            <img src="resources/images/1.png" alt="product image" class="prodImg">
            <div class="description">
                <b>Description</b>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta eget augue a accumsan. Quisque mollis rhoncus risus sit amet congue. Vivamus euismod eu lacus ut pulvinar. Sed in sem id quam egestas tincidunt quis sed mi. Vestibulum aliquet purus turpis. Nam consectetur, leo nec eleifend vulputate, lacus erat ultrices felis, sed mollis dolor turpis non libero. Fusce fringilla dui non nisi commodo, feugiat imperdiet libero faucibus. Pellentesque commodo vel massa commodo convallis. Ut venenatis lacus a vulputate ornare. Quisque tempor, ligula non eleifend convallis, justo felis cursus mauris, a efficitur risus justo et nisi. Nulla odio ligula, ultrices sed ipsum sed, suscipit ornare mi. Nam elit libero, luctus sit amet leo in, euismod fringilla neque. Proin ac posuere ligula.</p>
            </div>
        </div>

        <div class="prodDets">
            <p class="subheading">Cotton T-shirt Dress (i dont even know if this is actually a thing lol)</p>
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
                <script src="script.js"></script>
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
   
</body>
</html>