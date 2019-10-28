<?php
$directory = "images/";
$imageUrl = $directory.$_FILES['image_file']['name'];
$fileType = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
$check = getimagesize($_FILES['image_file']['tmp_name']);
if ($check) {
    if (file_exists($imageUrl)) {
        die("sorry ,,this file is already exist,, chose an another one!!!!");
    } else {
        if ($_FILES['image_file']['size'] > 50000) {
            die("your file is too large,,, chose with in 10kb please !!");
        } else {
           if ($fileType != 'png' && $fileType != 'jpg') {
               die("this is not supported ,,, please chose png or jpg");
           } else {

           }
        }
    }

} else {
    die("Please chose an image file,, thanks!!");
}



//move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);


?>

<form action="" method="post">
    <table>
        <tr>
            <th>Select Image</th>
            <td><input type="file" name="image_file"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="SubmiT"></td>
        </tr>
    </table>
</form>
