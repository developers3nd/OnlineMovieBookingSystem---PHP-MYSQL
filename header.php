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


  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="dashboard.php">Movies System<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
         <?php
         
          if(!isset($_SESSION['uid'])){
           
            echo '
            <li><a class="nav-link scrollto" href="allmovies.php">Movies</a></li>
            <li><a class="nav-link scrollto" href="alltheater.php">Theater</a></li>
            <li><a class="nav-link scrollto" href="login.php">Login</a></li>
            <li><a class="nav-link scrollto" href="register.php">Register</a></li>
            ';
          }else{
            $type = $_SESSION['type'];
             if($type == 2){
              echo '
              <li><a class="nav-link scrollto" href="movies.php">Movies</a></li>
              <li><a class="nav-link scrollto" href="alltheater.php">Theater</a></li>
              <li><a class="nav-link scrollto" href="viewuserbooking.php">Booking</a></li>
              <li><a class="nav-link scrollto" href="viewprofile.php">Profile</a></li>
         
              <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
             
              ';
             }
          }

         ?>
        
       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>