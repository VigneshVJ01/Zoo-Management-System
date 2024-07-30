<?php
    session_start();

    require_once 'include/config.php';
    date_default_timezone_set('Asia/Kolkata');
?>
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
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Login</title>

	<link href="admin/static/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<?php

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password' AND NOT usertype = 'Admin'";

        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_assoc($result);

            $_SESSION['isLogin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['type'] = $row['usertype'];
            $_SESSION['user_id'] = $row['user_id'];

            echo "<script>alert('You have logged in successfully');location.href='home.php'</script>";
        } else{
            
            echo "<script>alert('Invalid credentials you have entered')</script>";
        }
    }
?>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
                                        <h2><strong>User login</strong></h2>
									</div>
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<small>
                                            </small>
										</div>
										<div>
											<label class="form-check">
                                                <a href="register.php">Dont have an account?..Register here</a>
                                            </label>
										</div>
										<div class="text-center mt-3">
											<button type="submit" name="login" class="btn btn-lg btn-primary">Login</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="admin/static/js/app.js"></script>

</body>

</html>