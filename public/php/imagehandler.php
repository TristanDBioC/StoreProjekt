<?php


function saveImage($imagename, $count) {
    $patharray = [];
        for ($i = 0; $i<$count; $i++) {

            // file name; use name generator
            $filename = nameGenerator($_FILES[$imagename]['name'][$i], $i);
            
            // Location
            $location = '../uploads/'.$filename;
            
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            
            // Valid extensions
            $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");
            
            if(in_array($file_extension,$valid_ext)){
                // Upload file
                if(move_uploaded_file($_FILES[$imagename]['tmp_name'][$i],$location)){
                    $patharray[] = $location;
                } 
            } 
        }
    return $patharray;
}

function savePathtoDB($prodid, $path) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $id = 0;

    $sql = "INSERT INTO image VALUES ('".
                                $id."','".
                                $prodid."','".
                                $path."')";
    $result = mysqli_query($conn, $sql);
}


function nameGenerator($orignalfilename, $number) {
    $extension = substr($orignalfilename, -4);
    $concat = $orignalfilename.$number.rand(0, 2048);
    $filename = hash('sha256', $concat, false);
    return $filename.$extension;
}