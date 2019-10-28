<?php
session_start();
if ($_SESSION['id'] == null) {
    header("Location: index.php");
}

require_once '../vendor/autoload.php';
$login = new \App\classes\Login();
$blog = new \App\classes\Blog();

$queryResult = $blog->getAllPublishedCatagoryInfo();


if (isset($_GET['logout'])) {
    $login->adminLogout();
}



$id = $_GET['id'];
$queryResult = $blog->getBlogInfoById($id);
$edit= mysqli_fetch_assoc($queryResult);

if (isset($_POST['btn'])) {
     $blog->updateBlog($_POST);
}




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include "includes/menu.php" ?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Catagory Name</label>
                            <div class="col-sm-9">
                                <select name="catagory_id" class="form-control"><?php echo $edit['id']; ?>
                                    <option>---Select Catagory Name---</option>
                                    <?php while ($catagories = mysqli_fetch_assoc($queryResult) ) { ?>
                                        <option value="<?php echo $catagories['id']; ?>"><?php echo $catagories['catagory_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="blog_title" value="<?php echo $edit['blog_title']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"><?php echo $edit['short_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="long_description" cols="20" rows="5"><?php echo $edit['long_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*" value="<?php echo $edit['blog_image']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="<?php echo $edit['id']; ?>">published
                                <input type="radio" name="status" value="<?php echo $edit['id']; ?>">unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Blog Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>























































































<?php
//session_start();
//if ($_SESSION['id'] == null) {
//    header("Location: index.php");
//}
//
//require_once '../vendor/autoload.php';
//$login = new \App\classes\Login();
//$blog = new \App\classes\Blog();
//
//
//if (isset($_GET['logout'])) {
//    $login->adminLogout();
//}
//
//
//
//$id = $_GET['id'];
//$queryResult = $blog->getBlogInfoById($id);
//$edit= mysqli_fetch_assoc($queryResult);
//
//if (isset($_POST['btn'])) {
//     $blog->updateBlog($_POST);
//}
//
//?>
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Dashboard</title>-->
<!--    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">-->
<!--</head>-->
<!--<body>-->
<?php //include "includes/menu.php" ?>
<!---->
<!--<div class="container" style="margin-top: 10px;">-->
<!--    <div class="row">-->
<!--        <div class="col-sm-8 mx-auto">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <form action="" method="post">-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputEmail3" class="col-sm-3 col-form-label">Catagory Name</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <select name="catagory_name" class="form-control">-->
<!--                                    --><?php //echo $edit['catagory_name']; ?>
<!--                                    <option>---Select Catagory Name---</option>-->
<!--                                    <option value="1"></option>-->
<!--                                </select>-->
<!--                                <input type="hidden" class="form-control" name="id" value="--><?php //echo $edit['id']; ?><!--"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input type="text" class="form-control" name="blog_title" value="--><?php //echo $edit['blog_title']; ?><!--"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <textarea class="form-control" name="short_description">--><?php //echo $edit['short_description']; ?><!--</textarea>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <textarea class="form-control" name="long_description" cols="20" rows="5">--><?php //echo $edit['long_description']; ?><!--</textarea>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input type="file" name="blog_image" accept="image/*"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input type="radio" name="status" value="1" value="--><?php //echo $edit['status']; ?><!--">published-->
<!--                                <input type="radio" name="status" value="0" value="--><?php //echo $edit['status']; ?><!--">unpublished-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <div class="col-sm-3"></div>-->
<!--                            <div class="col-sm-9">-->
<!--                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Blog Info</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->
<!--<script src="../assets/js/jquery-3.4.1.min.js"></script>-->
<!--<script src="../assets/js/bootstrap.bundle.js"></script>-->
<!--<script src="../assets/js/bootstrap.min.js"></script>-->
<!--</body>-->
<!--</html>-->
<!---->
