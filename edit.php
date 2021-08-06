  <?php 
include('include/header.php');
include('include/navbar.php');
include('cons.php');

$id=$_GET['id'];
$_SESSION['pid']=$id;
$sql="SELECT *FROM producttb where id='$id'";
$res=mysqli_query($conn,$sql);
$data=mysqli_fetch_array($res);
$img='upload/'.$data['product_image'];

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <form method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label>Product Name</label>
          <input type="hidden" name="myid" id="myid" value="<?php echo $data['id']; ?>">
          <input type="text" name="editpname" class="form-control" placeholder="Enter Product Name" value="<?php echo($data['product_name']);?>" required>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" name="editpprice" class="form-control" placeholder="Enter Product Price" value="<?php echo($data['product_price']);?>"  required>
        </div>
      
        <div class="form-group">
          <label>Image</label>
          <img src="<?php echo $img;?>" style="width: 80px;height: 70px;">
          <input type="file" name="editpimage"   class="form-control" required>
        </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_data" class="btn btn-primary">Update</button>
      </div>
      </form>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>


      <?php 



      if(isset($_POST['update_data'])){ 
$id=$_POST['myid'];
$editpname=$_POST['editpname'];
$editpprice=$_POST['editpprice'];
$editpimage=$_FILES['editpimage']['name'];
$query="UPDATE producttb set product_name='$editpname',product_price='$editpprice',product_image='$editpimage' where id='$id'";
$res=mysqli_query($conn,$query);
if($res){
   move_uploaded_file($_FILES['editpimage']['tmp_name'], 'upload/'.$editpimage);
   echo "<script>alert('Data Updated');</script>";
   header("Location:product.php");
}else{
  echo "<script>alert('Try Again.....');</script>";
}

}



      include('include/footer.php');?>