<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Purchase history page.">
    <link rel="stylesheet" href="stylesheets/purchasehistory.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Edit Profile | Tinda</title>
</head>
<body>
<?php
        function getallpurchases() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM sales WHERE buyerid='".$_SESSION['user']['id']."'";
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
            <a href="index.php"><img src="resources/images/3.png" alt="Tinda" style=""></a>
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
            if(!isset($user)) {
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

    <!--BODY-->
    <div class="main_content">
        <p class='subheading'>My Purchases</p>

    <!-- Display Table -->
    <div class="container" id="eventtable">
                <table class="events" id="events">
                    <colgroup>
                        <col class="Product">
                        <col class="Unit_Price">
                        <col class="QTY">
                        <col class="Subtotal">
                        <col class="Review">
                    </colgroup>
                    <tr>
                        <th></th>
                        <th>Unit Price</th>
                        <th>QTY</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                    <?php
                        $products = getallpurchases();
                        $total = 0;
                        if (count($products) == 0) {
                            echo 
                            "<tbody id='eventsdata'>
                                <tr>
                                    <td colspan='6' class='loading_message'>
                                    <br><br><br>No Purchases</td>
                                </tr>
                            </tbody>";
                        } else {
                            foreach($products as $product) {
                                $prodpathname = getnameandimage($product['productid']);
                                $name = $prodpathname['name'];
                                $path = $prodpathname['imagepath'];
                                echo
                                    "<tr>
                                        <td><a href='product.php?id=".$product['productid']."'><img src = '".$path."' style='width: 10em; float:left; margin: 20px;'>
                                        <br><br><br><b class='clearselection'>".$name."</b></a></td>
                                        <td>&#8369; ".$product['total']/$product['quantity']."</td>
                                        <td>".$product['quantity']."</td>
                                        <td>&#8369; ".$product['total']."</td>
                                        <td><a href='review.php?id=".$product['productid']."'>Review</td>
                                    </tr>";
                            }
                        }                        
                        ?>
                                            
                    <!-- Insert events from database -->
                </table>

    </div>
</body>
</html>