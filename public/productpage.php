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
    <title>Tinda | Storefront</title>

    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/categories.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
</head>
<body>
<?php
        require 'php/filterscripts.php';
        require 'php/reviewscripts.php';

        function getallproducts() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM product WHERE quantity>'0'" ;
            $result = mysqli_query($conn, $sql);
            $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $prod;
        }

        function fetchsellername(&$products) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            //print_r($products);
            for ($i=0;$i<count($products);$i++) {
                $sql = "SELECT * FROM member WHERE id='".$products[$i]['sellerid']."'";
                $result = mysqli_query($conn,$sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $products[$i]['sellername'] = $users[0]['sellername'];
            }
        }

        function fetchratings(&$products) {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            for ($i=0;$i<count($products);$i++) {
                $rating = averagerating(getreviews($products[$i]['id']));
                $products[$i]['rating'] = $rating;
            }
        }

        function sortproducts(&$products, $sortype) {
            switch ($sortype) {
                case 1: 
                    array_multisort(array_column($products, 'name'), SORT_ASC, $products);
                break;
                case 2:
                    array_multisort(array_column($products, 'name'), SORT_DESC, $products);
                break;
                case 3:
                    array_multisort(array_column($products, 'price'), SORT_ASC, $products);
                break;
                case 4:
                    array_multisort(array_column($products, 'price'), SORT_DESC, $products);
                break;
                case 5:
                    array_multisort(array_column($products, 'rating'), SORT_ASC, $products);
                break;
                case 6:
                    array_multisort(array_column($products, 'rating'), SORT_DESC, $products);
                break;
                default:
                    echo "Sort value not recognized";
            }

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
        
        $products = getallproducts();
        fetchsellername($products);
        fetchratings($products);
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            filterbycategory($products, $category);
        } else {
            $category = 'all';
        }
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            filterbytype($products, $type);
        }
        if (isset($_GET['color'])) {
            $color = $_GET['color'];
            filterbycolor($products, $color);
        }
        if (isset($_GET['size'])) {
            $size = $_GET['size'];
            filterbysize($products, $size);
        }
        if (isset($_GET['sort'])) {
            sortproducts($products, $_GET['sort']);
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo $search;
            //unset($_GET['search']);
            filterbysearch($products, $search);
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
        <div class="sidebar">
            <form method="get" action=''>
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
                    <input type="checkbox" name="type[]" id="type" value="Top"
                    <?php
                        if (isset($_GET['type'])) {
                            if (in_array('Top', $_GET['type']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="type1">Tops</label><br>
                    <input type="checkbox" name="type[]" id="type" value="Bottom"
                    <?php
                        if (isset($_GET['type'])) {
                            if (in_array('Bottom', $_GET['type']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="type2">Bottoms</label><br>
                </div>
                <div class="colorf">
                    <h2>Color</h2>
                    <input type="checkbox" name="color[]" id="color" value="Red" 
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Red', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color1">Red</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Orange"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Orange', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color2">Orange</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Yellow"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Yellow', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color3">Yellow</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Green"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Green', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color4">Green</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Blue"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Blue', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color5">Blue</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Indigo"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Indigo', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color6">Indigo</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Violet"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Violet', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color7">Violet</label><br>

                    <input type="checkbox" name="color[]" id="color" value="Black"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Black', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color8">Black</label><br>
                    <input type="checkbox" name="color[]" id="color" value="White"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('White', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color9">White</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Brown"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Brown', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color10">Brown</label><br>
                    <input type="checkbox" name="color[]" id="color" value="Grey"
                    <?php
                        if (isset($_GET['color'])) {
                            if (in_array('Grey', $_GET['color']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="color11">Grey</label><br>
                </div>
                <div class="sizef">
                    <h2>Size</h2>
                    <input type="checkbox" name="size[]" id="size" value="XL"
                    <?php
                        if (isset($_GET['size'])) {
                            if (in_array('XL', $_GET['size']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="size1">Extra Rice</label><br>
                    <input type="checkbox" name="size[]" id="size" value="L"
                    <?php
                        if (isset($_GET['size'])) {
                            if (in_array('L', $_GET['size']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="size1">Large</label><br>
                    <input type="checkbox" name="size[]" id="size" value="M"
                    <?php
                        if (isset($_GET['size'])) {
                            if (in_array('M', $_GET['size']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="size2">Medium</label><br>
                    <input type="checkbox" name="size[]" id="size" value="S"
                    <?php
                        if (isset($_GET['size'])) {
                            if (in_array('S', $_GET['size']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="size3">Small</label><br>
                    <input type="checkbox" name="size[]" id="size" value="XS"
                    <?php
                        if (isset($_GET['size'])) {
                            if (in_array('XS', $_GET['size']) ) {
                                echo "checked";
                            }
                        }
                    ?>>
                    <label for="size4">Extra Small</label><br>
                </div>
                <?php
                    if (isset($_GET['category'])) {
                        echo
                        "<input type='hidden' name='category' value='".$_GET['category']."'>";
                    }
                        
                ?>
                <input type="submit" value="Apply Filter" class="filtSub" name="filtsub">
            </form>
        </div>
        <div class="content">
            <div class="breadcrumbs">
                <a href="index.php" class="home">Home</a> > <?php echo $category?>
            </div>
            <h1 class="catTitle"><?php echo $category?></h1>
            <div class="products">
                <?php
                    foreach($products as $product) {
                        echo
                        "<div class='item'>
                            <div class='itemPic'>
                                <img src='".$product['imagepath']."' alt='Placeholder'>
                            </div>
                            <div class='itemDesc'>
                                <p class='prodName'>".$product['name']."</p>
                                <p class='sellName'>".$product['sellername']."</p>
                                <p class='price'>Price: &#8369; ".$product['price']."</p>
                                <p class='rating'>Rating: ".$product['rating']."/5</p>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>