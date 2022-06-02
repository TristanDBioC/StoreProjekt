<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="List of seller's products.">
    <link rel="stylesheet" href="stylesheets/productssold.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>My Products | Tinda</title>
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
            if (isset($_POST['Logout'])){
                logoutUser();
            }
        }

        function getallproducts() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $sql = "SELECT * FROM product WHERE sellerid='".$_SESSION['user']['id']."'";
            $result = mysqli_query($conn, $sql);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;

        }
    ?>

    <div class="header">
        <div class="icon">
            <a href="index.php"><img src="resources/images/3.png" alt="Tinda" style=""></a>
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
        <p class='subheading'>My Products</p>
                <br>
                <a href = "addproduct.php"><button class="btn">Add Product +</button></a>
                

            <!-- Display Table -->
            <div class="container" id="productstable">
                <table class="products" id="products">
                    <colgroup>
                        
                        <col class="Product">
                        <col class="Price">
                        <col class="QTY">
                        <col class="Sales">
                    </colgroup>
                    <tr>
                        
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stocks</th>
                        <th>Sales</th>
                    </tr>
                    <?php
                        $products=getallproducts();
                        if (count($products) == 0) {
                            echo
                            "<tbody id='productsdata'>
                                <tr>
                                    <td colspan='4' class='loading_message'><br><br><br>NO DATA FOUND</td>
                                </tr>
                            </tbody>";
                        } else {

                            foreach ($products as $product) {
                                echo
                                "<tr>
                                
                                <td><a href='product.php?id=".$product['id']."'><img src = '".$product['imagepath']."' style='width: 10em; float:left; margin-top: 10px;'>
                                <br><br><br>
                                <b class='clearselection'style='margin-left: 20px;'>".$product['name']."</b></a></td>
                                <td>&#8369; ".$product['price']."</td>
                                <td>".$product['quantity']."</td>
                                <td>".$product['amount_sold']."</td>
                                <tr>";
                            }
                        }
                    ?>
                </table>
            </div>
</body>
</html>