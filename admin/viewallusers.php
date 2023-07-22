<?php 
include('../connect.php');

if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='../login.php';  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>


<?php include('header.php')  ?>


<div class="container">
   
<div class="row">
 
  <div class="col-lg-12">
  
     <table class="table">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role Type</th>      
        <th>Action</th>
      </tr>
      
      <?php
      $sql = "SELECT * FROM `users`";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
            <td><?= $data['userid'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?> </td>
            <td><?= $data['password'] ?> </td>       
            <td>

             <?php

               if($data['roteype'] == 1){
                echo "ADMIN";
               }else{
                echo "USER";
               }

             ?>

            </td>
     
          
           
            <td>
              <a href="viewallusers.php?userid=<?= $data['userid'] ?>" class="btn btn-danger"> Delete </a>
            
          </td>
          </tr>


       <?php
        }
      }else{
        echo 'no user found';
      }
    

      ?>


     </table>

  </div>
</div>
  

</div>


<?php include('footer.php')  ?>

</body>
</html>

<?php

if(isset($_GET['userid'])){

  $userid = $_GET['userid'];

  $sql = "delete from users WHERE userid ='$bookingid'";

  if(mysqli_query($con, $sql)){
    echo "<script> alert('user deleted successfully')</script>";
    echo "<script> window.location.href='viewallusers.php' </script>";
  }else{
    echo "<script> alert('user not deleted')</script>";
  }

}



?>
