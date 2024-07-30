<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="./static/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Zoo - Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="./static/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">Admin</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<?php
					$current_page = basename($_SERVER['PHP_SELF']);
					?>

					<li class="sidebar-item <?php if($current_page == 'home.php') echo 'active'; ?>">
						<a class="sidebar-link" href="home.php">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-item <?php if($current_page == 'animal.php') echo 'active'; ?>">
						<a class="sidebar-link" href="animal.php">
                            <i class="align-middle" data-feather="sun"></i> <span class="align-middle">Animal master</span>
                        </a>
					</li>

					<li class="sidebar-item <?php if($current_page == 'zoo-master.php') echo 'active'; ?>">
						<a class="sidebar-link" href="zoo-master.php">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Zoo master</span>
                        </a>
					</li>

					<li class="sidebar-item <?php if($current_page == 'view-adoption.php') echo 'active'; ?>">
						<a class="sidebar-link" href="view-adoption.php">
                            <i class="align-middle" data-feather="link"></i> <span class="align-middle">Adoption</span>
                        </a>
					</li>

					<li class="sidebar-item <?php if($current_page == 'view-booking.php') echo 'active'; ?>">
						<a class="sidebar-link" href="view-booking.php">
                            <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Booking</span>
                        </a>
					</li>
					<li class="sidebar-item <?php if($current_page == 'payments.php') echo 'active'; ?>">
						<a class="sidebar-link" href="payments.php">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Payment</span>
                        </a>
					</li>
					<li class="sidebar-item <?php if($current_page == 'feedback.php') echo 'active'; ?>">
						<a class="sidebar-link" href="feedback.php">
                            <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Feedback</span>
                        </a>
					</li>
					<li class="sidebar-item <?php if($current_page == 'enquiry.php') echo 'active'; ?>">
						<a class="sidebar-link" href="enquiry.php">
                            <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Enquiry</span>
                        </a>
					</li>
					<li class="sidebar-item <?php if($current_page == 'customers.php') echo 'active'; ?>">
						<a class="sidebar-link" href="customers.php">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Customer</span>
                        </a>
					</li>

					<li class="sidebar-item <?php if($current_page == 'logout.php') echo 'active'; ?>">
						<a class="sidebar-link" href="include/logout.php">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                        </a>
					</li>

					
				</ul>

				
			</div>
		</nav>
