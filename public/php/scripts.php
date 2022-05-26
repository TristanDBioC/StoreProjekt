<?php

    function updateMember($username, $contact, $displayname, $sellername) {
        $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
        $sql = "UPDATE member SET contact='".$contact."', displayname='".$displayname."', sellername='".$sellername.
        "' WHERE username='".$username."'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Updated";
            // Move to next page
        } else {
            echo "Failed";
            // do something
        }
    }

    function becomeSeller($username, $isseller) {
        $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
        $sql = "UPDATE member set isseller=".$isseller." WHERE username='".$username."'";
        echo $sql;
    }

   

?>