<?php
    include '../dbconnection.php';
    // session start
    session_start();
    if(isset($_SESSION['a_login'])){
        
    }else{
        echo '<script>location.href="../adminlogin.php"</script>';
    }
    // session end


    if(isset($_REQUEST['save'])){
        // validation for field
        if(($_REQUEST['title']=="")||($_REQUEST['category']=="")||($_REQUEST['description']=="")||($_REQUEST['date']=="")){
            $msg = '<div class="msg" style="color:red;font-weight:bolder; ">Please fill the reqired fields</div>';
        }else{

        // uploaded image to serever on main post   imageupload folder

        $error=array();
        $file_name=$_FILES['image']['name'];
        $file_temp_name=$_FILES['image']['tmp_name'];
        $file_size=$_FILES['image']['size'];
        $file_type=$_FILES['image']['type'];

        // validating image file

            if($file_size > 2097152){
                $msg = '<div class="msg" style="color:red;font-weight:bolder; ">File should be 2MB or less than 2MB</div>';
            }
            elseif(empty($error)==true){
                 move_uploaded_file($file_temp_name,"../upload-image/".$file_name);
            }else{
                $msg = '<div class="msg" style="color:red;font-weight:bolder; ">Unable to upload file</div>';
            }
    
        
        
        // uploaded image to serever on sub post on sub imageupload folder
        // sub post 1
        $error_s1=array();
        $file_name_s1=$_FILES['sub_image1']['name'];
        $file_temp_name_s1=$_FILES['sub_image1']['tmp_name'];
        $file_size_s1=$_FILES['sub_image1']['size'];
        $file_type_s1=$_FILES['sub_image1']['type'];
            // validating image file
            if($file_size_s1 > 2097152){
                $msg = '<div class="msg" style="color:red;font-weight:bolder; ">File should be 2MB or less than 2MB</div>';
            }
            elseif(empty($error_s1)==true){
                 move_uploaded_file($file_temp_name_s1,"../upload-subimage/".$file_name_s1);
            }
        //  sub post 2
        $error_s2=array();
        $file_name_s2=$_FILES['sub_image2']['name'];
        $file_temp_name_s2=$_FILES['sub_image2']['tmp_name'];
        $file_size_s2=$_FILES['sub_image2']['size'];
        $file_type_s2=$_FILES['sub_image2']['type'];
            // validating image file
            if($file_size_s2 > 2097152){
                $msg = '<div class="msg" style="color:red;font-weight:bolder; ">File should be 2MB or less than 2MB</div>';
            }
            elseif(empty($error_s2)==true){
                 move_uploaded_file($file_temp_name_s2,"../upload-subimage/".$file_name_s2);
            }
        // for sub post 3
        
        $error_s3=array();
        $file_name_s3=$_FILES['sub_image3']['name'];
        $file_temp_name_s3=$_FILES['sub_image3']['tmp_name'];
        $file_size_s3=$_FILES['sub_image3']['size'];
        $file_type_s3=$_FILES['sub_image3']['type'];
            // validating image file
            if($file_size_s3 > 2097152){
                $msg = '<div class="msg" style="color:red;font-weight:bolder; ">File should be 2MB or less than 2MB</div>';
            }
            elseif(empty($error_s3)==true){
                 move_uploaded_file($file_temp_name_s3,"../upload-subimage/".$file_name_s3);
            }
        // for end sub post
               
        $title=$_REQUEST['title'];
        $title_s1=$_REQUEST['sub_title1'];
        $title_s2=$_REQUEST['sub_title2'];
        $title_s3=$_REQUEST['sub_title3'];
        $category=$_REQUEST['category'];
        $description=$_REQUEST['description'];
        $description_s1=$_REQUEST['sub_description1'];
        $description_s2=$_REQUEST['sub_description2'];
        $description_s3=$_REQUEST['sub_description3'];
        $date= $_REQUEST['date'];
        $author=$_SESSION['author_id'];
        
        // INSERTING RECORD TO DATA BASE

        $insert="INSERT INTO post(post_title,post_desc,post_category,post_author,post_date,post_img,post_subtitle1,post_subdesc1,post_subimg1,post_subtitle2,post_subdesc2,post_subimg2,post_subtitle3,post_subdesc3,post_subimg3)
        VALUES('$title','$description','$category','$author','$date','$file_name','$title_s1','$description_s1','$file_name_s1','$title_s2','$description_s2','$file_name_s2','$title_s3','$description_s3','$file_name_s3')";
        $result=mysqli_query($conn,$insert);
        // inserting category count dynamically
        $update="UPDATE category SET ct_post=ct_post + 1 WHERE ct_name = '".$category."'";
        $result=mysqli_query($conn,$update);

        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add post</title>
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
                    <h3 style="color:white;background-color:teal;padding:10px 0px 10px 50px;font-weight:bolder;">Add Post</h3>
                    <div class="form-group">
                      <label for="title">Main Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" id="category" name="category" value="">
                                        <option value="" disable>Select Category</option>
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
                    
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" rows="3" name="description" value=""></textarea>
                    </div>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="date" name="date" value="">
                    </div>
                    <label for="image">Post Image</label>
                    <input type="file" name="image" value=""><br><br>
                    <div class="sub-post">
                        <div class="form-group">
                          <label for="title">sub-Title 1</label>
                          <input style="width: 43vw;" type="text" class="form-control" id="title" name="sub_title1" value="">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="3" name="sub_description1" value=""></textarea>
                        </div>
                        <label for="image">Post Image</label>
                        <input style="width: 43vw;" type="file" name="sub_image1" value=""><br><br>
                        <div class="form-group">
                          <label for="title">sub-Title 2</label>
                          <input style="width: 43vw;" type="text" class="form-control" id="sub_title2" name="sub_title2" value="">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="3" name="sub_description2" value=""></textarea>
                        </div>
                        <label for="image">Post Image</label>
                        <input style="width: 43vw;" type="file" name="sub_image2" value=""><br><br>
                        <div class="form-group">
                          <label for="title">sub-Title 3</label>
                          <input style="width: 43vw;" type="text" class="form-control" id="title" name="sub_title3" value="">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="3" name="sub_description3" value=""></textarea>
                        </div>
                        <label for="image">Post Image</label>
                        <input style="width: 43vw;" type="file" name="sub_image3" value=""><br><br>
                    </div>
                    <?php if(isset($msg)){ echo $msg; } ?>
                    <button type="submit" name="save" >Save</button>
                    
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