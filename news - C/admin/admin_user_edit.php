<?php
 include '../dbconnection.php';
 

 if(isset($_REQUEST['update'])){
     $fname=$_REQUEST['fname'];
     $lname=$_REQUEST['lname'];
     $new_password=$_REQUEST['npassword'];
     if(($_REQUEST['fname']=="")||($_REQUEST['lname']=="")||($_REQUEST['password']=="")||($_REQUEST['npassword']=="")){
         echo "all fields are must";
     }
     
     else{
        
        $update="UPDATE admin_user SET user_fname ='".$fname."', user_lname='".$lname."', user_password='".$new_password."' WHERE id = '".$_GET['$edit_id']."'";
        $result=$conn->query($update);

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
     <!-- fetching the record by passing id dynamically -->
     <?php
            
            $fetch="SELECT * FROM admin_user WHERE id = '".$_GET['$edit_id']."'";
            $result=$conn->query($fetch);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){

           echo '<form method="post">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" name = "fname"  value="'.$row['user_fname'].'">
                  
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name = "lname" value="'.$row['user_lname'].'">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name = "email" value="'.$row['user_email'].'" readonly>
                  
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name = "password" value="" placeholder="Last Password">
                </div>
                <div class="form-group">
                  <label for="lname">New Password</label>
                  <input type="password" class="form-control" name = "npassword" value="" placeholder="New Password">
                </div>
                
                
                <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
               
            </form>';
            
        }
    }
    ?>

           
        </div>
    </div>

 



    <?php include '../footer.php'; ?>
<script src="../js/jquery.js"></script>
 <script src="../js/popper.js"></script>   
 <script src="../js/bootstrap.min.js"></script>  
 <script src="../js/all.min.js"></script>    
</body>
</html>