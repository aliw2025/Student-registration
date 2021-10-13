<?php
// Ch}eck if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $filename = $_FILES["photo"]["name"];
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        echo "file found ";
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        echo "name: ".$filename;
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) {
            echo "Error: Please select a valid file format.";
        }
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../upload/" . $filename)){
                echo $filename . " is already exists.";
                header('Location: ./thankyou.php');
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $filename);
                echo "Your file was uploaded successfully.";
                header('Location: ./thankyou.php');
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>