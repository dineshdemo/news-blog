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
    <title>Category</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='main.js'></script>
</head>
<body>
<?php include 'admin_navbar.php';   ?>
<section>
    <div class="categorycontainer">
        <?php 
           $fetch="SELECT * FROM category";
           $result=mysqli_query($conn,$fetch);
           if(mysqli_num_rows($result)>0){
               while($row=mysqli_fetch_assoc($result)){

           
            echo '<div class="card col-sm-3.5" style="width: 18rem;">
                
                <div class="card-body">
                    <h5 class="card-title">'.$row['ct_name'].'</h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Category ID : '.$row['ct_id'].'</li>
                    <li class="list-group-item">Total Post : '.$row['ct_post'].'</li>
                    
                </ul>
                <div class="card-body" style="display: flex;flex-wrap;wrap;">
                    <form action="" method="post"><a href="admin_category_viewall.php?$ctg_id='.$row['ct_name'].'" class="card-link"><input type="hidden" name="all">View All</a></form>
                    <form action="" method="post"><a href="admin_category_viewyour.php?$ctg_id='.$row['ct_name'].'" class="card-link"><input type="hidden" name="self">Your Posts</a></form>
                </div>
            </div>';
            }
            }
            
            
            ?>
            
    </div>
</section>
<?php include '../footer.php'; ?>


<script src="../js/jquery.js"></script>
 <script src="../js/popper.js"></script>   
 <script src="../js/bootstrap.min.js"></script>  
 <script src="../js/all.min.js"></script>    
</body>
</html>