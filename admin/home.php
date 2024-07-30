<?php

session_start();

require_once '../include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}
require_once 'include/sidebar.php';
require_once 'include/header.php';

?>
            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
									<?php
                                $qry = "SELECT count(animal_id ) as total FROM animal_master";
                                $resul = mysqli_query($conn, $qry);

                                if ($resul) {
                                    $rowss = mysqli_fetch_assoc($resul);
                                        $total = $rowss['total'];
                                    
                                }
                                ?>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Animals</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="sun"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $total; ?></h1>
												
											</div>
										</div>
									</div>
									<div class="col-sm-6">
									<?php
                                $qry = "SELECT count(adoption_id ) as total FROM animal_adoption";
                                $resul = mysqli_query($conn, $qry);

                                if ($resul) {
                                    $rowss = mysqli_fetch_assoc($resul);
                                        $total2 = $rowss['total'];
                                    
                                }
                                ?>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Adoptions</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="link"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $total2; ?></h1>
												
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xxl-5 d-flex">
						<?php
                                $qry = "SELECT count(ticket_id ) as total FROM ticket_booking";
                                $resul = mysqli_query($conn, $qry);

                                if ($resul) {
                                    $rowss = mysqli_fetch_assoc($resul);
                                        $total3 = $rowss['total'];
                                    
                                }
                                ?>
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="plus-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $total3; ?></h1>
												
											</div>
										</div>
									</div>
									<div class="col-sm-6">
									<?php
                                $qry = "SELECT count(customer_id ) as total FROM customer_details";
                                $resul = mysqli_query($conn, $qry);

                                if ($resul) {
                                    $rowss = mysqli_fetch_assoc($resul);
                                        $total4 = $rowss['total'];
                                    
                                }
                                ?>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Customers</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="user-plus"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $total4; ?></h1>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					

					
				</div>
			</main>

<?php
require_once 'include/footer.php';
?>
