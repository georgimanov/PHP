<?php
$dir = "uploads/";

//Loop through each file
for($i=0; $i<count($_FILES['file']['name']); $i++) {
    //Get the temp file path
    $tmpFilePath = $_FILES['file']['tmp_name'][$i];

    //Make sure we have a filepath
    if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = $dir . $_FILES['file']['name'][$i];

        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            move_uploaded_file($tmpFilePath, $newFilePath);
        }
    }
}