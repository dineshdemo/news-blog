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
            <h3><?php echo $_GET['$ctg_id']; ?></h3>
            
            
            <div class="container-table col-sm-10">
                
              <table class="table table-striped">
                  
                  <thead>
                    <tr>
                      <th scope="col">P-ID</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">DESCRIPTION</th>
                      
                      <th scope="col">DATE</th>
                      <th scope="col">AUTHOR-ID</th>
                      <th scope="col">IMAGE</th>
                      
                    </tr>
                  </thead>
                  <?php  
                    $fetch="SELECT * FROM post WHERE post_category = '".$_GET['$ctg_id']."'";
                    $result=mysqli_query($conn,$fetch);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){

                
                     echo '<tbody>
                                <tr>
                                <th scope="row">'.$row['post_id'].'</th>
                                <td>'.$row['post_title'].'</td>
                                <td class="post-desc">'.$row['post_desc'].'</td>
                                
                                <td>'.$row['post_date'].'</td>
                                <td>'.$row['post_author'].'</td>
                                <td>'.$row['post_img'].'</td>
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
