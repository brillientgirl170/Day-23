<?php
    $link = mysqli_connect("localhost", "root", "", "image_upload");

if (isset($_POST['btn'])) {
    $fileName = $_FILES['image_file']['name'];
    $directory = 'images/';
    $imageUrl = $directory.$fileName;
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES['image_file']['tmp_name']);
    if ($check) {
        if (file_exists($imageUrl)) {
            die("This file is already exist,, Please chose another one. Thanks !!!");
        } else {
            if ($_FILES['image_file']['size'] > 500000) {
                die("Your file size is too large, Please select with in 10kb !!!");
            } else {
                if ($fileType !='jpg' && $fileType != 'png' && $fileType != 'JPG') {
                   die("File type is not supported,, please input jpg Or png" );
                } else {
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);
                    $sql = "INSERT INTO images (image_file) VALUES ('$imageUrl')";
                    mysqli_query($link, $sql);
                    echo "Image save & upload succefully";
                }
            }
        }
    } else {
        die("Please upload an image file ,,thanks !!");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Select File</th>
            <td><input type="file" name="image_file"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="SubmiT"></td>
        </tr>
    </table>
</form>

<hr/>

<?php
    $sql = "SELECT * FROM images";
    $queryResult = mysqli_query($link, $sql);
?>

<table>
    <?php while ($img = mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><img src="<?php echo $img['image_file']; ?>" alt="Images" height="100" width="100"></td>
    </tr>
    <?php } ?>
</table>
