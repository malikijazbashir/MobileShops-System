<?php
 include 'cons.php';
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];
   
    $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and pass='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['id'];
        $_SESSION["Email"]=$row['email'];
        $_SESSION["uname"]=$row['uname'];


        header("Location: admin.php"); 
    }
    else
    {
        echo '<script>alert("Login faild check email address and password")</script>';
             header("Location: login.php");
    }
}

if(isset($_POST['product_save'])){
    $pname=$_POST['pname'];
    $price=$_POST['pprice'];
    $pimg=$_FILES['pimage']['name'];
    
    $query="INSERT INTO producttb(product_name,product_price,product_image) values('$pname','$price','$pimg')";
    $data=mysqli_query($conn,$query);
    if($data)
    {
       move_uploaded_file($_FILES['pimage']['tmp_name'], 'upload/'.$pimg);
            $_SESSION['message']="Data inserted successfully";
            $_SESSION['msg_type']="success";
         header("Location: product.php"); 

    }else{
            $_SESSION['message']="Plz Try Again";
            $_SESSION['msg_type']="danger";
    }
}



?>