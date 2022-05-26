<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/bg-icon.css">
    <link rel="stylesheet" href="stylesheets/signup.css">
</head>
<body>
    <div class="wrap">
    <div class="icon">
        <img src="resources/images/6.png" alt="Tinda Logo">
    </div>
    <div class="signupform">
            <h1 class="title">Sign Up</h1>
        <div class="inputs">
            <form method="POST">
                <input type="text" name="username" id="em" placeholder="  Username">
                <input type="text" name="contactnum" id="cn" placeholder="  Contact Number">
                <input type="text" name="address" id="ad" placeholder="  Address">
                <input type="password" name="pw" id="pw" placeholder="  Password">
                <input type="submit" name="submit" value="SIGN UP">
            </form>
        </div>
        
    </div>
    </div>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            verifyUser();
        }
        function verifyUser() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            $username = $_POST['username'];
            $sql = "SELECT * FROM member WHERE username='". $username. "'";
            $result = mysqli_query($conn, $sql);
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (count($users) == 0) {
                addtoDB();

            } else {
                echo 'alert("Username already exists ")';
            }
        }

        function addtoDB() {
            echo "adding to db";
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            // set varuabkes
            $id = 0;
            $username = $_POST['username'];
            $pass = hash('sha256', $_POST['password'], false);
            $address = $_POST['address'];
            $contact = $_POST['contactnum'];
            $displayname = $username;
            $isseller = 0;

            // SQL statment
            $sql = "INSERT INTO member VALUES ('".
                                $id."','".
                                $username."','".
                                $pass."','".
                                $address."','".
                                $contact."','".
                                $displayname."',".
                                $isseller.",'')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                print_r("hello word");
                // Move to next page
            } else {
                echo "Failed";
                // do something
            }

        }

    ?>

</body>
</html>