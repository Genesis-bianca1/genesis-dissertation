<?php
$target_directory = "uploads/";
$target_file = $target_directory . basename($_FILES["file_to_upload"]["name"]);
$upload_works = 1;
$img_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file_to_upload"]["temp_name"]);
    if($check != false) {
        echo "File is an image - " . $check["mime"] .  ".";
        $upload_works = 1;
    } else {
        echo "File is not an image.";
        $upload_works = 0;
    }
}

//Checks if file exists
if (file_exists($target_file)) {
    echo "File already exists";
    $upload_works = 0;
}

//Checks size
if ($_FILES["file_to_upload"]["size"] > 500000) {
    echo "File is too large";
    $upload_works = 0;
}

//File type criteria
if ($img_file_type != "jpg" && $img_file_type != "png" && $img_file_type != "jpeg" && $img_file_type != "gif") {
    echo "Only upload JPEG, JPG, PNG & GIF files!";
    $upload_works = 0;
}

//Check upload works
if ($upload_works == 0) {
    echo "File was not uploaded";
    //everything is ok, upload file
} else {
    if (move_uploaded_file($_FILES["file_to_upload"]["temp_name"], $target_file))
    {
        echo "File" . htmlspecialchars(basename($_FILES["file_to_upload"]["name"])). " uploaded.";
    } else {
        echo "Error uploading file";
    }
}
?>