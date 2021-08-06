<?php
include('cons.php');

$id=$_GET['id'];
$sql="DELETE FROM producttb where id='$id'";
$res=mysqli_query($conn,$sql);
if($res){
	echo "Deleted...";
	header("Location:product.php");
}
else
{
	echo "Try Again";
}
?>