<?php
include 'dbconnection.php';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>admin signup</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='main.js'></script>
</head>
<body style="background-color: whitesmoke;">
    

  <?php include 'a_navbar.php';  ?>

  
 
  <?php  include 'header.php'; ?>

  <?php echo '<h2 style="font-weight:bolder;text-transform: uppercase;color: grey;border-bottom:1px solid grey;text-align:center">'.$_GET['$c_name'].'</h2>' ?>
  <div class="content-container">
      <div class="leftbar ">
          <!-- for left container -->
          <?php
             $sql="SELECT * FROM post WHERE post_category = '{$_GET['$c_name']}' ORDER BY post_id DESC";
             $result=mysqli_query($conn,$sql);
             if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){    
        echo '<div class="box1">
                <div class="img">
                    <img src='."upload-image/".$row['post_img'].' alt="">
                </div>
                <div class="n-content">
                    <h4>'.$row['post_title'].'</h4>
                        <div class="author_date">
                            <h6>'.$row['post_category'].'</h6>
                            <span>'.$row['post_date'].'</span></h6>
                        </div>
                     <p>'.$row['post_desc'].'</p>
                
                </div>
                </div>
                <a href="readmore.php?$read_id='.$row['post_id'].'"><button value="abc">Read More</button></a>';
                // end of left container
                }
            }

        ?>
        

      </div>
      <div class="rightbar ">
            <div class="search-box">
              <form action="search.php" method="post"><input type="text" name="search" value=""><button type="submit" name="src_button">Search</button></form>
            </div>
          <h5>Recent Post</h5>
          <?php
          $sql="SELECT * FROM post WHERE post_category='".$_GET['$c_name']."' ORDER BY post_date DESC LIMIT 5 ";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
             while($row=mysqli_fetch_assoc($result)){ 

          
           echo '<div class="recent-post-box">
              <div class="r-img">
                  <img src='."upload-image/".$row['post_img'].' alt="">
              </div>
              <div class="r-content">
                  <h6>'.$row['post_title'].'</h6>
                  <span style="grey">'.$row['post_category'].'</span>
                  <span>'.$row['post_date'].'</span>
                  <a href="readmore.php?$read_id='.$row['post_id'].'"><button value="abc">Read More</button></a>
              </div>
          </div>';
        }
    }
  ?>
           </div>
      </div>
  </div>
  <?php include 'footer.php'; ?>
  



    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>