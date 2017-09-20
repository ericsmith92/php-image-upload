<?php

if(isset($_POST['submit'])) {

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileErr = $file['error'];
    $fileType = $file['type'];

    //take apart string at punctuation to get extension
    $fileExt = explode('.', $fileName);
    //lowercase extension
    $fileExtLow = strtolower(end($fileExt));

    //put acceptable file extensions in an array
    $allowed = array('jpg', 'jpeg', 'png');

    //check if extension matches one specified in array
    if(in_array($fileExtLow, $allowed)){
        //check if there are any errors uploading file
        if($fileErr === 0){
            if($fileSize <= 2000000){
                $fileNameNew = uniqid('', true) . " . " . $fileExtLow;

                $fileDestination = '../uploads/' . $fileNameNew;

                //move file from temporary destination to new
                move_uploaded_file($fileTmpName, $fileDestination);

                echo  'Upload Successful';
            }else{
                echo  'File size cannot exceed 2mb.';
            }
        }else{
            echo 'There was an error uploading your file.';
        }
    }else{
        echo  'Only files with extensions .jpg, .jpeg, or .png are accepted.';
    }
}//end isset($_POST[])
