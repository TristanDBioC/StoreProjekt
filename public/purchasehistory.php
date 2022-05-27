<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Purchase history page.">
    <link rel="stylesheet" href="stylesheets/purchasehistory.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Edit Profile | Tinda</title>
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
        <div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>
        <div class="accs"><a href="editprofile.php"class="ep"></a></div>
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