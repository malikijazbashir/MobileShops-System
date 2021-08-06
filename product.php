<?php 
include('include/header.php');
include('include/navbar.php');
include('cons.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Online Mobile Shop
        <small>Mobile Shop</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       
      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      	<div class="form-group">
      		<label>Product Name</label>
      		<input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required>
      	</div>
      	<div class="form-group">
      		<label>Price</label>
      		<input type="text" name="pprice" class="form-control" placeholder="Enter Product Price" required>
      	</div>
      
      	<div class="form-group">
      		<label>Image</label>
      		<input type="file" name="pimage" class="form-control" required>
      	</div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="product_save" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       
      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" name="pprice" class="form-control" placeholder="Enter Product Price" required>
        </div>
      
        <div class="form-group">
          <label>Image</label>
          <input type="file" name="pimage" class="form-control" required>
        </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Main content -->
    <section class="content container-fluid">
    	<div class="card shadow mb-4">
    		<div class="card-header py-3">
    			<h6 class="m-0 font-weight-bold">Products
    			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter">Add Product</button>
    		</h6>
    			
    		</div>
    		<div class="card-body">
          <?php 
       
           if(isset($_SESSION['message'])):?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
              ?>
              
            </div>
           <?php endif;?>
    			<div class="table-responsive">
    				<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
    							<th>Sno</th>
    							<th>Product Name</th>
    							<th>Prices</th>
    				
    							<th>Image</th>
    							<th>Action</th>
    						</tr>
    					</thead>
    					<?php 
    					$sql="SELECT * from producttb";
    					$data=mysqli_query($conn,$sql);
    					while ($row = mysqli_fetch_array($data)) {
                $urlimg='upload/'.$row['product_image'];


    					?>
    					<tbody>
    						<tr>
    							<td><?php echo $row['id'];?></td>
    							<td><?php echo $row['product_name'];?></td>
    							<td><?php echo $row['product_price'];?></td> 
    							
    							<td><img src="<?php echo $urlimg ; ?>" style="height: 70px;width: 80px;"></td>
    							<td>
    								<a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-warning'>Edit
    								</a>
    								<a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" name="delete_btn">Delete</a>
    							</td>
    						</tr>

    					</tbody>
    				<?php }?>
    					
    				</table>
    				
    			</div>
    		</div>
    		
    	</div>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
<?php include('include/footer.php');?>