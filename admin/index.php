<?php include("includes/header.php"); ?>

      <?php if(!$session->is_signed_in()){
        redirect('login.php');
      }
?>


<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            

            <?php include("includes/top_nav.php");   ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/sidebar_nav.php"); ?>



      <?php include("includes/admin_content.php");?>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>