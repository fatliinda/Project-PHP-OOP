<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){
        redirect('login.php');
      }

      ?>

      <?php
        $photos=Photo::find_all();

        


?>



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            

            <?php include("includes/top_nav.php");   ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/sidebar_nav.php"); ?>


           <div id="page-wrapper">
           <div class="container-fluid">

<!-- Page Heading -->




<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Photos
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
           </div>



           <div class="col-md-12">

                <table class='table table-hover'>
                <thead>
                    <tr>
                     

                            <th>Photo</th>
                            <th>id</th>
                            <th>file name</th>
                            <th>title</th>
                            <th>size</th>


                    </tr>
                    <thead>
                        <tbody>
                        <?php
                        foreach($photos as $photo) : ?>
                





                        <tr>
                            
                        <td><img src='<?php echo $photo->picture_path()?>'</td>
                            <div class="pictures-link">



                            <a href='delete_photo.php'> Delete </a>

                            </div>
                        
                        <td><?php echo $photo->photo_id ?></td>
                        <td><?php echo $photo->filename ?></td>
                        <td><?php echo $photo->size ?></td>



                        </tr>

                        <?php endforeach; ?>
                        </tbody>





                </table>




           </div>

  <?php include("includes/footer.php"); ?>