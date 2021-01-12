<?php
 include '../dbconnection.php';
 session_start();
 
 if(isset($_SESSION['a_login'])){
        
 }
 else{
     echo '<script>location.href="../adminlogin.php"</script>';
 }

//  delete post from record

 if(isset($_REQUEST['delete'])){
     $post_id=$_REQUEST['hiddenid'];
     $del="DELETE FROM post WHERE post_id='".$post_id."'";
     $result=mysqli_query($conn,$del);
 }
//  for ediing the post
 if(isset($_REQUEST['edit'])){
     $post_id=$_REQUEST['hiddenid'];
     $_SESSION['post_id']=$post_id;
     
     echo '<script>location.href="admin_edit_post.php"</script>';
 }



?>






<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>post</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='main.js'></script>
</head>
<body>
<?php include 'admin_navbar.php';   ?>

    <section class="postsection">
        <div class="postview">
                <h3>POST</h3>
                <a href="admin_add_post.php">ADD POST</a>
                <a href="admin_all_post.php" class="view-all-post">VIEW ALL POST</a>
            <div class="container-table col-sm-10">
                
              <table class="table table-striped">
                  
                  <thead>
                    <tr>
                      <th scope="col">P-ID</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">DESCRIPTION</th>
                      <th scope="col">CATEGORY</th>
                      <th scope="col">DATE</th>
                      <th scope="col">ACTION</th>
                    </tr>
                  </thead>
                <?php
                    $fetch="SELECT * FROM post WHERE post_author = '".$_SESSION['author_id']."' ORDER BY post_id DESC";
                    $result=$conn->query($fetch);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){

                
                        echo '<tbody>
                                <tr>
                                <th scope="row">'.$row['post_id'].'</th>
                                <td>'.$row['post_title'].'</td>
                                <td class="post-desc">'.$row['post_desc'].'</td>
                                <td>'.$row['post_category'].'</td>
                                <td>'.$row['post_date'].'</td>
                                <td><form  method="post"><input type="hidden" name="hiddenid" value="'.$row['post_id'].'"><input class="edit" type="submit" name="edit" value="edit"><input class="delete" type="submit" name="delete" value="delete"></form></td>
                                
                                </tr>
                                
                            </tbody>';
                }
            }
        ?>
                </table>

            </div>
        </div>

    </section>


    <?php include '../footer.php'; ?>
<script src="../js/jquery.js"></script>
 <script src="../js/popper.js"></script>   
 <script src="../js/bootstrap.min.js"></script>  
 <script src="../js/all.min.js"></script>    
</body>
</html>