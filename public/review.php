<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is Tinda's product review page.">
    <link rel="stylesheet" href="stylesheets/review.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Leave a Review | Tinda</title>
</head>
<body>
    <?php
        function reviewexist($productid, &$rating, &$review) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM review WHERE memberid='".$_SESSION['user']['id']."' AND productid='".$productid."'";
            $result = mysqli_query($conn,$sql);
            $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (count($reviews) == 0) {
                return FALSE;
            } else {
                $rating = $reviews[0]['rating'];
                $review = $reviews[0]['review'];
                return TRUE;
            }
        }

        function postreview($productid) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "INSERT INTO review VALUE('0',
                                            '".$_SESSION['user']['id']."',
                                            '".$productid."',
                                            '".$_POST['rating']."',
                                            '".$_POST['review']."',
                                            '".time()."')";
            mysqli_query($conn,$sql);
        }

        function updatereview($productid) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "UPDATE review SET rating='".$_POST['rating']."', review='".$_POST['review']."',
                timestamp='".time()."' WHERE memberid='".$_SESSION['user']['id']."' AND productid='".$productid."'";
            mysqli_query($conn,$sql);
        }

        function productfetch($id) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM product WHERE id='".$id."'";
            $result = mysqli_query($conn, $sql);
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $product[0];
        }

        function getnameandimage($prodid) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT name, imagepath FROM product WHERE id='".$prodid."'";
            $result = mysqli_query($conn, $sql);
            $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $prod[0];
        }

        function sellernamefetch($id) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM member WHERE id='".$id."'";
            $result = mysqli_query($conn, $sql);
            $seller = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $seller[0]['sellername'];
        }

        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        $product = productfetch($_GET['id']);
        $rating = 0;
        $review = "None";
        $reviewexists = reviewexist($product['id'],$rating, $review );


        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Logout'])){
                logoutUser();
            }
            if (isset($_POST['submit'])) {
                if ($reviewexists) {
                    updatereview($product['id']);
                } else {
                    postreview($product['id']);
                }
                header('Location: purchasehistory.php');
            }
        }

        $product = productfetch($_GET['id']);
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
            <input type="text" name='search' placeholder="  Look for great finds on Tinda!">
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

    <?php
        $prodpathname = getnameandimage($product['id']);
        $name = $prodpathname['name'];
        $path = $prodpathname['imagepath'];
        $sellername = sellernamefetch($product['sellerid']);
        echo
            "<img src='".$path."' alt='Product image' class=''
            style='width: 10em; float:left; margin: 20px;'>
            <p class='prodName'>".$name."</p>
            <p class='sellerName'>".$sellername."</p> <br>
            <p class=''>".$product['description']."</p>";
    
    ?>

    <br>

    <div class="main_content">
        <form id="rating" class="rating" action="" method="post">
            <p class="label">Rate your order:</p>
            <div class="rate">
                <input type="radio" id="star5" name="rating" value="5"<?php if ($reviewexists && $rating==5) {echo 'checked';} ?> />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4"<?php if ($reviewexists && $rating==4) {echo 'checked';} ?> />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3"<?php if ($reviewexists && $rating==3) {echo 'checked';} ?> />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2"<?php if ($reviewexists && $rating==2) {echo 'checked';} ?> />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1"<?php if ($reviewexists && $rating==1) {echo 'checked';} ?> />
                <label for="star1" title="text">1 star</label>
            </div>
            <div class="comment">
                <p class="label">Leave a comment:</p><br>
                <textarea required="required" class="desc" name="review"><?php
                    if ($reviewexists) {
                        echo $review;
                    }
                    ?></textarea><br>
            </div>
            <br><br><br><br>
            <input type="submit" value="SUBMIT" name='submit' class="review">
        </form>
    </div>
</body>
</html>