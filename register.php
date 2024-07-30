<?php
    session_start();

    require_once 'include/config.php';
    date_default_timezone_set('Asia/Kolkata');
?>

<?php
if(isset($_POST['register'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $userrole = "Customer";

    $insertQuery = "INSERT INTO customer_details (customer_name, phone, email, age, address, gender, dob) VALUES 
    ('$name', '$phone', '$email', '$age', '$address', '$gender', '$dob')";

    if (mysqli_query($conn, $insertQuery)) {

        $insertQuery2 = "INSERT INTO registration (username, phone, email, password, usertype) VALUES 
        ('$name', '$phone', '$email', '$password', '$userrole')";
        
        if (mysqli_query($conn, $insertQuery2)) {

            echo "<script>alert('Customer registered successfully');location.href='index.php'</script>";
        } else {
            echo "<script>alert('Unable to process your request!');location.href='register.php'</script>";
        }
        
    } else {
        echo "<script>alert('Unable to process your request!');location.href='register.php'</script>";
    }
}
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Register</title>

	<link href="admin/static/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Registration</h1>
							<p class="lead">
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form class="row" method="POST">
										<div class="col-lg-6 mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Phone</label>
											<input class="form-control form-control-lg" type="tel" name="phone" placeholder="Enter your phone no" />
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
                                        <div class="col-lg-6 mb-3">
											<label class="form-label">Age</label>
											<input class="form-control form-control-lg" type="number" name="age" placeholder="Enter your age" />
										</div>
                                        <div class="col-lg-6 mb-3">
											<label class="form-label">Date of birth</label>
											<input class="form-control form-control-lg" type="date" name="dob" placeholder="Enter your DOB" />
										</div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control form-control-lg">
                                                <option value="">Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mb-3">
											<label class="form-label">Address</label>
											<input class="form-control form-control-lg" type="address" name="address" placeholder="Enter your Address" />
										</div>
										<div class="col-lg-6 mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
                                        <div>
											<label class="form-check">
                                                <a href="index.php">Already have an account?..Login here</a>
                                            </label>
										</div>
										<div class="text-center mt-3">
											<button type="submit" name="register" class="btn btn-lg btn-primary">Register</button>
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