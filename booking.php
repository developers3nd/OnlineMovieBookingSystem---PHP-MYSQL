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
    <title>Ticket Booking</title>
    <!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
    
<?php


    $theaterid = $_GET['id'];

?>

<section id="team" class="team section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>Ticket Booking for Theater</h2>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <form action="booking.php" method="post" >
              <div class="row">

                <input type="hidden" name="theaterid" value="<?=$theaterid?>">
                
                <div class="col form-group mb-3">
                  <input type="text" class="form-control" name="person"  placeholder="Enter no of People" required="">
                </div>
              </div>
                <div class="col form-group mb-3">
                  <input type="date" class="form-control" name="date"  required="">
                </div>

             
          

              <div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div>
            </form>
          </div>

        

        </div>

      </div>
</section>

</body>
</html>

<?php

if(isset($_POST['ticketbook'])){

  $person     = $_POST['person'];
  $date       = $_POST['date'];
  $theaterid  = $_POST['theaterid'];

  $uid = $_SESSION['uid'];

  //print_r($_POST);

  $sql = "INSERT INTO `booking`(`theaterid`, `bookingdate`, `person`, `userid`) VALUES ('$theaterid','$date','$person','$uid')";

  if(mysqli_query($con, $sql)){
     echo "<script> alert('Ticket book successfully!!') </script>";
     echo "<script> window.location.href='index.php';  </script>";

  }else{
    echo "<script> alert('ticket not book')";
  }

}

?>


