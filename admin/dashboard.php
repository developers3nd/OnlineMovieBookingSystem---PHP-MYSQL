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
    <title>Dashboard</title>
</head>
<body>



<?php include('header.php')  ?>


<div class="container text-center">
<h4>Welcome to Admin dashboard!!</h4>

  <div class="row ">

    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>CATEGORIES</h5>
              <?php
                  $sql = "SELECT count(catid) as 'category' FROM `categories`";
                  $res  = mysqli_query($con, $sql);
                  $catdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$catdata['category']?></h6>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>MOVIES</h5>
              <?php
                  $sql = "SELECT count(movieid) as 'total_movies' FROM `movies`";
                  $res  = mysqli_query($con, $sql);
                  $moviedata = mysqli_fetch_array($res);

              ?>
              <h6><?=$moviedata['total_movies']?></h6>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>THEATER</h5>
              <?php
                  $sql = "SELECT count(theaterid) as 'total_theater' FROM `theater`";
                  $res  = mysqli_query($con, $sql);
                  $theaterdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$theaterdata['total_theater']?></h6>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>BOOKING</h5>
              <?php
                  $sql = "SELECT count(bookingid) as 'total_booking' FROM `booking` where status = 1";
                  $res  = mysqli_query($con, $sql);
                  $bookingdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$bookingdata['total_booking']?></h6>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>USERS</h5>
              <?php
                  $sql = "SELECT count(userid) as 'total_users' FROM `users` where roteype=2";
                  $res  = mysqli_query($con, $sql);
                  $userdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$userdata['total_users']?></h6>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4 mb-2">
        <div class="card">
          <div class="card-body">
            <div class="card-text">
              <h5>SALES</h5>
              <?php
                  $sql = "select sum(theater.price) as 'total_sale', booking.status 
                  from booking
                  inner join theater on theater.theaterid = booking.theaterid
                  where booking.status = 1";
                  $res  = mysqli_query($con, $sql);
                  $salesdata = mysqli_fetch_array($res);

              ?>
              <h6><?=$salesdata['total_sale']?></h6>
            </div>
          </div>
        </div>
    </div>
  </div>
  
</div>

<?php include('footer.php')  ?>

</body>
</html>
