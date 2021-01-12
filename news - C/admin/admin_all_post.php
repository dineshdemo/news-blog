<?php
 include '../dbconnection.php';
 session_start();
 
 if(isset($_SESSION['a_login'])){
        
 }
 else{
     echo '<script>location.href="../adminlogin.php"</script>';
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
                <a href="admin_postview.php" class="view-all-post">YOUR POST</a>
            <div class="container-table col-sm-10">
                
              <table class="table table-striped">
                  
                  <thead>
                    <tr>
                      <th scope="col">P-ID</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">DESCRIPTION</th>
                      <th scope="col">CATEGORY</th>
                      <th scope="col">DATE</th>
                      <th scope="col">AUTHOR-ID</th>
                    </tr>
                  </thead>
                <?php
                    $fetch="SELECT * FROM post  ORDER BY post_id DESC";
                    $result=$conn->query($fetch);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){

                
                        echo '<tbody>
                                <tr>
                                <th scope="row">'.$row['post_id'].'</th>
                                <td>'.$row['post_title'].'</td>
                                <td class="post-desc" >'.$row['post_desc'].'</td>
                                <td>'.$row['post_category'].'</td>
                                <td>'.$row['post_date'].'</td>
                                <td>'.$row['post_author'].'</td>
                                
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