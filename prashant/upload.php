<?php
if (!empty($_FILES['file']['name'])) {
    $imgExt = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
    $image = time() . "." . $imgExt;
    if (in_array($imgExt, $valid_extensions)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], 'images/' . $image);
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>
