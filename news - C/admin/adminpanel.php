<?php 

include '../dbconnection.php';
session_start();
if(isset($_SESSION['a_login'])){
      

}else{
  echo '<script>location.href="../adminlogin.php"</script>';
}

// for deleting record
if(isset($_REQUEST['delete'])){
    $delete=$_REQUEST['delete'];
    
    $delete="DELETE FROM admin_user WHERE id = '".$delete."'";
    $result=$conn->query($delete);
    
}



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src='main.js'></script>
</head>
<body>
<?php include 'admin_navbar.php' ?>

<!-- start main container -->
<section>
    <div class="maincontainer" >
        <div class="container">
             <table class="table">
                <thead >
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
            <?php
            $fetch="SELECT * FROM admin_user WHERE main_admin = '".$_SESSION['author_id']."'";
            $result=$conn->query($fetch);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
            
                echo '<tbody>
                    <tr>
                    <th scope="row">'.$row['id'].'</th>
                    <td>'.$row['user_fname'].'</td>
                    <td>'.$row['user_lname'].'</td>
                    <td>'.$row['user_email'].'</td>
                    <td><form method="post"><input type="hidden" name ="delete" value="'.$row['id'].'"><button class="delete">DELETE</button></form></td>
                    <td><a href="admin_user_edit.php?$edit_id='.$row['id'].'"><button class ="edit">EDIT</button></form></a></td>
                    
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