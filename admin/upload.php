<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}

$message = "";

if (!empty($_POST['submit'])) {

    $photo = new Photo();
    $photo->title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $photo->set_file($_FILES['file_upload']);

    if ($photo->save()) {
        $message = "SAVED";
    } else {
        $message = join("<br>", $photo->custom_errors);
    }
}

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include("includes/top_nav.php"); ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/sidebar_nav.php"); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-6">
                        <?php echo $message ?>
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit">
                            </div>
                        </form>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div
