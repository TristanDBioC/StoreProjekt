<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Sign Up</title>

    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/bg-icon.css">
    <link rel="stylesheet" href="stylesheets/signup.css">
</head>
<body>
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
                displayError();
            }
        }

        function addtoDB() {
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
                                $displayname."','".
                                $isseller."','".
                                $displayname."','0')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('Location: signin.php');
            } else {
                echo "Failed";
                // do something
            }

        }

    ?>
    <div class="wrap">
    <div class="icon">
        <img src="resources/images/6.png" alt="Tinda Logo">
    </div>
    <div class="signupform">
            <h1 class="title">Sign Up</h1>
        <div class="inputs">
            <form method="POST" action="">
                <input type="text" name="username" id="em" placeholder="Username" pattern="^[\S]{1,16}$" title="Up to 16 characters, no spaces.">
                <input type="text" name="contactnum" id="cn" placeholder="Contact Number (Optional)" pattern="^[0-9]+$">
                <input type="text" name="address" id="ad" placeholder="Address">
                <input type="password" name="password" id="pw" placeholder="Password" pattern="^(?=.*\d)(?=.*[A-Z]).{8,}$" title="Requires 1 capital letter, 1 number, and is at least 8 characters long.">    
                <input type="submit" name="submit" value="SIGN UP">
                

                <?php
                    function displayError() {
                        echo "<div class='err'><p>Username is taken!</p></div>";
                    }
                ?>
            </form>
        </div>
        <p class="old">Already have an account? <a href="signin.php" class="signin">Sign In</a></p>
    </div>
    </div>
    </div>
</body>
</html>