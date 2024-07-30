<?php
  // Get the current script name
  $current_page = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Zoofari - Zoo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <!-- <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div> -->
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-map-marker-alt text-primary me-2"></small>
            <small>42 Nebula Drive Starlight City, Earth Postal Code: 98765</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center py-3">
            <small class="far fa-clock text-primary me-2"></small>
            <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
          </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-phone-alt text-primary me-2"></small>
            <small>+91 9481181087</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/groups/3178079658943870"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.instagram.com/pilikula_nisargadhama/?hl=en"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <a href="index.html" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="img/icon/icon-10.png" alt="Icon" />
        <h1 class="m-0 text-primary">Interstellar Animal Kingdom</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="home.php" class="nav-item nav-link <?php echo $current_page == 'home.php' ? 'active' : ''; ?>">Home</a>
          <a href="about.php" class="nav-item nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>">About</a>
          <a href="animal.php" class="nav-item nav-link <?php echo $current_page == 'animal.php' ? 'active' : ''; ?>">Animals</a>
          <a href="adoption.php" class="nav-item nav-link <?php echo $current_page == 'adoption.php' ? 'active' : ''; ?>">Adoption</a>
          <a href="book-ticket.php" class="nav-item nav-link <?php echo $current_page == 'book-ticket.php' ? 'active' : ''; ?>">Book tickets</a>
          <a href="bookings.php" class="nav-item nav-link <?php echo $current_page == 'bookings.php' ? 'active' : ''; ?>">Bookings</a>
          <a href="contact.php" class="nav-item nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">Contact</a>
        </div>
        <a href="include/logout.php" class="btn btn-primary"
          >Logout<i class="fa fa-arrow-right ms-3"></i
        ></a>
      </div>
    </nav>
    <!-- Navbar End -->
