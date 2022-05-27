<?php


function saveImage($imagename) {
    if(isset($_FILES[$imagename]['name'])){
        // file name; use name generator
        $filename = "heehoo.jpg";
     
        // Location
        $location = '../uploads/'.$filename;
     
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
     
        // Valid extensions
        $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");
     
        $response = 0;
        if(in_array($file_extension,$valid_ext)){
           // Upload file
           if(move_uploaded_file($_FILES[$imagename]['tmp_name'],$location)){
              $response = 1;
           } 
        }
     
        echo $response;
        exit;
    }
}

function nameGenerator() {
    
}