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
                    <tr>
                        <td><a href="product.php"><img src="resources/images/1.png" class="prod"><p class="prodName">Cotton T-shirt</p></a></td>
                        <td>&#8369; 100</td>
                        <td>2</td>
                        <td>&#8369; 200</td>
                        <td><a href="review.php">Review</td>
                    </tr>
                    
                    <!-- Insert events from database -->
                    <tbody id="eventsdata">
                        <tr>
                            <td colspan="6" class="loading_message"><br><br><br>LOADING DATA</td>
                        </tr>
                    </tbody>
                </table>

    </div>
</body>
</html>