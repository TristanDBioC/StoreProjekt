<?php

    function updateMember($username, $contact, $displayname, $sellername, $address) {
        $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
        $sql = "UPDATE member SET contact='".$contact."', displayname='".$displayname."', sellername='".$sellername.
        "', address='".$address.
        "' WHERE username='".$username."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Changes saved.";
            // Move to next page
        } else {
            echo "Failed";
            // do something
        }
        $_SESSION['user']['displayname'] = $displayname;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['contact'] = $contact;
        $_SESSION['user']['sellername'] = $sellername;
    }

    function becomeSeller($username) {
        $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
        $sql = "UPDATE member set isseller='1' WHERE username='".$username."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo $result;
            return $result;
        }
    }



?>