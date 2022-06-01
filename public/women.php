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
    <title>Tinda | Womens</title>

    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/categories.css">
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
                    <a href="men.php">Men</a>
                    <a href="women.php">Women</a>
                    <a href="children.php">Children</a>
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
        <div class="sidebar">
            <form method="post">
                <label for="sort">Sort By:</label>
                <select name="sort" id="sort" class="sort">
                    <optgroup label="Name">
                        <option value="1" selected>Name - Ascending</option>
                        <option value="2">Name - Descending</option>
                    </optgroup>
                    <optgroup label="Price">
                        <option value="3">Price - Ascending</option>
                        <option value="4">Price - Descending</option>
                    </optgroup>
                    <optgroup label="Ratings">
                        <option value="5">Ratings - Ascending</option>
                        <option value="6">Ratings - Descending</option>
                    </optgroup>
                </select>
                <div class="typef">
                    <h2>Type</h2>
                    <input type="checkbox" name="type1" id="type" value="top">
                    <label for="type1">Tops</label><br>
                    <input type="checkbox" name="type2" id="type" value="bot">
                    <label for="type2">Bottoms</label><br>
                </div>
                <div class="colorf">
                    <h2>Color</h2>
                    <input type="checkbox" name="color1" id="color" value="red">
                    <label for="color1">Red</label><br>
                    <input type="checkbox" name="color2" id="color" value="orange">
                    <label for="color2">Orange</label><br>
                    <input type="checkbox" name="color3" id="color" value="yellow">
                    <label for="color3">Yellow</label><br>
                    <input type="checkbox" name="color4" id="color" value="green">
                    <label for="color4">Green</label><br>
                    <input type="checkbox" name="color5" id="color" value="blue">
                    <label for="color5">Blue</label><br>
                    <input type="checkbox" name="color6" id="color" value="indigo">
                    <label for="color6">Indigo</label><br>
                    <input type="checkbox" name="color7" id="color" value="violet">
                    <label for="color7">Violet</label><br>
                </div>
                <div class="sizef">
                    <h2>Size</h2>
                    <input type="checkbox" name="size1" id="size" value="L">
                    <label for="size1">Large</label><br>
                    <input type="checkbox" name="size2" id="size" value="M">
                    <label for="size2">Medium</label><br>
                    <input type="checkbox" name="size3" id="size" value="S">
                    <label for="size3">Small</label><br>
                </div>

                <input type="submit" value="Apply Filter" class="filtSub" name="filtsub">
            </form>
        </div>
        <div class="content">
            <div class="breadcrumbs">
                <a href="index.php" class="home">Home</a> > Women
            </div>
            <h1 class="catTitle">Women</h1>
            <div class="products">
                <div class="item"> <!-- this is the product block template -->
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div> <!-- up to here only -->
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemPic">
                        <img src="resources/images/1.png" alt="Placeholder">
                    </div>
                    <div class="itemDesc">
                        <p class="prodName">Name of Item</p>
                        <p class="sellName">Seller Name</p>
                        <p class="price">Price: P000.00</p>
                        <p class="rating">Rating: 5/5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>