<?php
    include '../dbconnection.php';
    // starting session
    session_start();
    if(isset($_SESSION['a_login'])){
        
    }else{
        echo '<script>location.href="../adminlogin.php"</script>';
    }
    if(isset($_REQUEST['save'])){
        if(($_REQUEST['title']=="")||($_REQUEST['category']=="")||($_REQUEST['description']=="")||($_REQUEST['date']=="")){
            $msg = '<div class="msg" style="color:red;font-weight:bolder; ">Please fill the reqired fields</div>';
        }else{
            // taking value from file input
        if(isset($_FILES['image'])){
            $error=array();
            $file_name=$_FILES['image']['name'];
            $file_size=$_FILES['image']['size'];
            $file_type=$_FILES['image']['type'];
            $file_tmp_name=$_FILES['image']['tmp_name'];
            if(empty($error)==true){

                 move_uploaded_file($file_tmp_name,"../upload-image/".$file_name);
            }
        }
        // taking value from the variable   
        $title=$_REQUEST['title'];
        $description=$_REQUEST['description'];
        $category=$_REQUEST['category'];
        $date=$_REQUEST['date'];
        // updating record to database
        $update="UPDATE post SET post_title='".$title."', post_desc='".$description."',post_category='".$category."',post_date='".$date."',post_img='".$file_name."' WHERE post_id={$_SESSION['post_id']}";
        $result=mysqli_query($conn,$update);
        
       }


    }


    
    

?>








<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>edit Post</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='main.js'></script>
</head>
<body>
<?php include 'admin_navbar.php';   ?>

    <div class="postcontainer">
        <div class="container1">
        
        
            <div class="containera">
                
                <div class="containerb col-sm">
                <form action="" method="post" enctype="multipart/form-data">
                <h3 style="color:white;background-color:skyblue;padding:10px 0px 10px 50px;font-weight:bolder;">Edit Post</h3>
                    <div class="form-group">
                     <?php 
                        $fetch="SELECT * FROM post WHERE post_id={$_SESSION['post_id']}";
                        $result=mysqli_query($conn,$fetch);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                
                      
                      echo '<label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="'.$row['post_title'].'">
                    </div>';
                    }
                }
             ?> 
                    <div class="form-group">
                      <label for="category" disable>Category</label>
                      <select class="form-control" id="category" name="category" value="">
                                        <option value="">Select Category</option>
                                        
                        <?php
                        // fetching record for category
                            $fetch="SELECT * FROM category";
                            $result=mysqli_query($conn,$fetch);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    
                                    echo '<option>'.$row['ct_name'].'</option>';
                                }
                            }  
                        ?>
                        
                        
                      </select>
                    </div>
                <?php 
                    $fetch="SELECT * FROM post WHERE post_id={$_SESSION['post_id']}";
                    $result=mysqli_query($conn,$fetch);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            
                    
                    echo '<div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="3" name="description" value="">'.$row['post_desc'].'</textarea>
                          </div>
                          <div class="form-group">
                          <label for="date">Date</label>
                          <input type="date" name="date" value="">
                          </div>
                          <label for="image">Post Image</label>
                          <input type="file" name="image" value=""><br><br>
                          
                          <button type="submit" name="save" style="background-color:green;color:white;border:none;padding:3px 20px 3px 20px;">Save</button>';
                       }
                   }
                ?>
                <?php if(isset($msg)){ echo $msg; } ?>
                </form>

            </div>
            </div>
            
        </div>
    </div>


    <?php include '../footer.php'; ?>
<script src="../js/jquery.js"></script>
 <script src="../js/popper.js"></script>   
 <script src="../js/bootstrap.min.js"></script>  
 <script src="../js/all.min.js"></script>    
</body>
</html>