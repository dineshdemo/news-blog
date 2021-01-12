<?php
session_start();
if(isset($_SESSION['a_login'])){
      

}else{
  echo '<script>location.href="../adminlogin.php"</script>';
}


if(isset($_REQUEST['submit'])){
    // including database
    include "../dbconnection.php";
    
    // taking variable value
    $fname=mysqli_real_escape_string($conn,$_REQUEST['fname']);
    $lname=mysqli_real_escape_string($conn,$_REQUEST['lname']);
    $email=$_REQUEST['email'];
    $password=mysqli_real_escape_string($conn,md5($_REQUEST['password']));
    $cpassword=mysqli_real_escape_string($conn,md5($_REQUEST['cpassword']));
    
    // form validation
    if(($_REQUEST['fname']=="")||($_REQUEST['lname']=="")||($_REQUEST['email']=="")
    ||($_REQUEST['password']=="")||($_REQUEST['cpassword']=="")){
        $msg = '<div class="msg" style="color:red;"><b>Please fill all Fields</b></div>';
    }
    elseif(($_REQUEST['password'])!=($_REQUEST['cpassword'])){
        $msg = '<div class="msg" style="color:red;"><b>Yor password is not Matching</b></div>';
    }
    else{
        //  validating record already inserted or not
         $fetch="SELECT user_email FROM admin_user WHERE user_email='".$_REQUEST['email']."'";
         $result=mysqli_query($conn,$fetch);
         if(mysqli_num_rows($result)>0){
            $msg = '<div class="msg" style="color:green;"><b>Account Already Registered</b></div>';
         }
         else{
        // inserting record into table

        $insert="INSERT INTO admin_user(user_fname,user_lname,user_email,user_password,main_admin)
        VALUES('$fname','$lname','$email','$password','".$_SESSION['author_id']."')";
        $result=mysqli_query($conn,$insert);
         }
    }
        
    
    
}


?>




<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add user</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='main.js'></script>
</head>
<body>
    <?php include 'admin_navbar.php' ?>
    
    <div class="maincontainer">
        <div class="containera">
            <form method="post">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" name = "fname"  value="">
                  
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name = "lname" value="">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name = "email" value="">
                  
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name = "password" value="">
                </div>
                <div class="form-group">
                  <label for="lname">Confirm Password</label>
                  <input type="password" class="form-control" name = "cpassword" value="">
                </div>
                
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <?php if(isset($msg)){ echo $msg;} ?>
            </form>
        </div>
    </div>

 



    <?php include '../footer.php'; ?>
<script src="../js/jquery.js"></script>
 <script src="../js/popper.js"></script>   
 <script src="../js/bootstrap.min.js"></script>  
 <script src="../js/all.min.js"></script>    
</body>
</html>