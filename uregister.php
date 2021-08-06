<?php

include('cons.php');

if(isset($_POST['register'])){
	$name=$_POST['uname'];
	$emails=$_POST['email'];
	$passw=$_POST['pass'];
	$cpass=$_POST['cpass'];
	if($passw!=$cpass){
		echo '<script>alert("Password not Match")</script>';
	}else{
		$sql=" insert into users(uname,email,pass) values('$name','$emails','$passw')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo '<script>alert("Thanks you for Registration")</script>';
			header("Location: login.php");
		}
		else{
		echo '<script>alert("Plz Try Again for Registration")</script>';		}
	}

}
?>