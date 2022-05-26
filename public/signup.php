<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="icon">

    </div>
    <div class="signupform">
        <div class="title">

        </div>
        <div class="inputs">
            <form action="" method="POST">
                Username: <input type="text" name="username" id="em"> <br>
                Contact: <input type="text" name="contactnum" id="cn"> <br>
                Address: <input type="text" name="address" id="ad"> <br>
                Password: <input type="password" name="password" id="pw"> <br>
                <input type='submit' name='submit'>
            </form>
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
                echo "Successfully added to DB";
                // Move to next page
            } else {
                echo "Failed";
                // do something
            }

        }

    ?>

</body>
</html>