<?php

function getreviews($productid) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $sql = "SELECT * FROM review WHERE productid='".$productid."'";
    $result = mysqli_query($conn,$sql);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $reviews;
}

function averagerating($reviews) {
    $total = 0;
    $totalcount = 0;

    foreach($reviews as $review) {
        $total += (float)$review['rating'];
        $totalcount += 1;
    }
    if ($totalcount == 0) {
        return number_format((float)$total,1,'.','');
    } else {
        return number_format((float)$total/$totalcount,1,'.','');
    }
}

function fetchreviewername(&$reviews) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    for ($i=0;$i<count($reviews);$i++) {
        $sql = "SELECT * FROM member WHERE id='".$reviews[$i]['memberid']."'";
        $result = mysqli_query($conn,$sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $reviews[$i]['displayname'] = $users[0]['displayname'];
    }
}
