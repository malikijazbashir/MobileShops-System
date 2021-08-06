<?php
session_start();
if(!isset($_SESSION['uname'])){
  header("Location:login.php");
  exit();
}
?>


  <!-- Left side column. contains the logo and sidebar -->
 <?php 
include('include/header.php');
 include('include/navbar.php');?>


<?php include('include/dashboard.php');?>


  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php include('include/footer.php');?>