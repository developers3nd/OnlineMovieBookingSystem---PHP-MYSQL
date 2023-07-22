<?php 
include('connect.php');

if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='login.php';  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking</title>
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
        <th>Category</th>
        <th>Date</th>
        <th>Days/Time</th>
        <th>Ticket</th>
        <th>Location</th>
        <th>User</th>
        <th>Status</th>
      </tr>
      
      <?php

      $uid = $_SESSION['uid'];

      $sql = "select booking.bookingid, booking.bookingdate, booking.person, theater.theater_name, theater.timing, theater.days, theater.price, theater.location, movies.title,  categories.catname, users.name as 'username',
      booking.status
      from booking
      inner join theater on theater.theaterid = booking.theaterid
      inner join users on users.userid = booking.userid
      inner join movies on movies.movieid = theater.movieid
      inner join categories on categories.catid = movies.catid 
      where booking.userid = '$uid'
      ";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

          <tr>
            <td><?= $data['bookingid'] ?></td>
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
            <td><?= $data['days'] ?> - <?= $data['timing'] ?></td>       
            <td><?= $data['price'] ?></td>
            <td><?= $data['bookingdate'] ?></td>
            <td><?= $data['location'] ?></td>
            <td><?= $data['username'] ?></td>
     
            <td>

              <?php

              if($data['status'] == 0){
                echo "<a href='#' class='btn btn-warning' > Pending </a>";
              }else{
                echo "<a href='#' class='btn btn-success' > Approved </a>";
              }

              ?>


            </td>
           
          </tr>


       <?php
        }
      }else{
        echo 'no booking found';
      }
    

      ?>


     </table>

  </div>
</div>
  

</div>


<?php include('footer.php')  ?>

</body>
</html>


