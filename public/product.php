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
        require 'php/imagehandler.php';
        require 'php/cartscript.php';

        function productfetch($id) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM product WHERE id='".$id."'";
            $result = mysqli_query($conn, $sql);
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $product[0];

        }

        function sellernamefetch($id) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM member WHERE id='".$id."'";
            $result = mysqli_query($conn, $sql);
            $seller = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $seller[0]['sellername'];
        }

        function getrating($id) {
            // ADD CODE LATER
            // returns in from 0 to 5'
            return 3;
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
            if (isset($_POST['addcart'])) {
                $product = productfetch($_GET['id']);
                if(cartexist($_SESSION['user']['activecart_id'])) {
                    if (checkcredential($_SESSION['user']['id'], $product['id'],$_POST['quan'])) {
                        addtocart($_SESSION['user']['id'],
                                $_SESSION['user']['activecart_id'],
                                $product['id'],
                                $_POST['quan'],
                                $product['price']);
                    } else {
                        // INSERT SOME SORT OF ERROR PROMPT THAT YOU CANT BUY THIS ITEM
                    }
                } else {
                    if (checkcredential($_SESSION['user']['id'], $product['id'],$_POST['quan'])){
                        initcart($_SESSION['user']['id']);
                        addtocart($_SESSION['user']['id'],
                                $_SESSION['user']['activecart_id'],
                                $product['id'],
                                $_POST['quan'],
                                $product['price']);
                    } else {
                        // INSERT SOME SORT OF ERROR PROMPT THAT YOU CANT BUY THIS ITEM
                    }
                }
            }
        }

        $product = productfetch($_GET['id']);

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
            <a href="addproduct.php">Sell on Tinda</a>
        </div>
        <div class="searchbar">
            <form>
            <input type="text" placeholder="  Look for great finds on Tinda!">
            <button type="submit" class="search"><img src="resources/images/search.png" alt=""></button>
            </form>
        </div>
        <div class="cart">
            <a href="cart.php"><img src="resources/images/cart.png" alt="Cart" class="carti"><a>
        </div>   
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['user']['id'])) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    '<div class="accs">
                            <div class="acdrop">
                                <a href="editprofile.php"class="ep">' . $user['username'] . '</a>
                                <div class="dropcont">
                                    <a href="purchasehistory.php" class="vp">View Purchases</a>
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
                <?php
                    $imagearray = retrieveImages($product['id']);
                    for($i = 1; $i <= count($imagearray); $i++ ) {
                        echo "<a href='#slide-".$i."'>".$i."</a>";

                    }
                    echo "<div class='slides'>";
                    foreach($imagearray as $imagepath) {
                        echo "<div id='slide-".(array_search($imagepath, $imagearray)+1)."'><img src='".$imagepath."' height=400px></div>";
                    }
                    echo "</div>"
                ?>
            </div>

            <div class="description">
                <b>Description</b>
                <?php
                    echo 
                    "<p class='desc'>".$product['description']."</p>";
                ?>
            </div>
        </div>

        <div class="prodDets">
            <?php
                echo "<p class='subheading'>".$product['name']."</p>";
            ?>
            <a href="#" class="seller"><p class="caption">
                <?php
                    echo sellernamefetch($product['sellerid']);
                ?>
            </p></a>

            <p class="rating"><?php echo getrating($product['id']);?></p>
            <div class="stars">
                <?php
                    for ($i = 0; $i<getrating($product['id']); $i++) {
                        echo "<div class='star'></div>";
                    }
                ?>
            </div>

            <br>

            <p class="price">&#8369;
                <?php
                    echo $product['price'];
                ?>
            </p>
            <span class="caption2">Color</span> <span class="color">
            <?php
                    echo $product['color'];
                ?>
            </span><br><br><br><br>
            <span class="caption2">Size</span> <span class="size">
                <?php
                    echo $product['size'];
                ?>
                </span><br><br><br><br>
            <span class="caption2">Quantity</span>  

            <form id="product" class="product" action="" method="post">
                <span class="quantity buttons_added">
                    <input type="button" value="-" class="minus"><input type="number" name="quan" step="1" min="1" max="
                    <?php
                        echo $product['quantity'];
                    ?>
                    " name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                </span>
                <p class="qty">
                    <?php
                        echo $product['quantity'];
                    ?> left</p>
            <input type="submit" value="Add to cart" name='addcart' class="btn">
            <!-- <input type="submit" value="Buy Now" class="btn1"> -->
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