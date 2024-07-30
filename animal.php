<?php
session_start();
require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';
?>

<!-- Page Header Start -->
<div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
            Our Animals
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-white" href="home.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-white" href="#">Pages</a>
                </li>
                <li class="breadcrumb-item text-primary active" aria-current="page">
                    Our Animals
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Animal Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-6">
                <p><span class="text-primary me-2">#</span>Our Animals</p>
                <h1 class="display-5 mb-0">
                    Let's See Our <span class="text-primary">Zoofari</span> Awesome Animals
                </h1>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a class="btn btn-primary py-3 px-5" href="">Explore More Animals</a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                <?php
                $sql = "SELECT * FROM animal_master where status = 'Active'";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $customClass = ($row['animal_id'] == 7) ? 'custom-cardinal' : '';
                ?>
                    <div class="col-4 <?php echo $customClass; ?>">
                        <a class="animal-item" href="animal-details.php?id=<?php echo $row['animal_id']; ?>">
                            <div class="position-relative">
                                <img class="img-fluid" src="admin/images/<?php echo $row['image']; ?>" alt="" />
                                <div class="animal-text p-4">
                                    <p class="text-white small text-uppercase mb-0"><?php echo $row['category']; ?></p>
                                    <h5 class="text-white mb-0"><?php echo $row['animal_name']; ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Animal End -->

<?php
require_once 'include/footer.php';
?>

<style>
.custom-cardinal .img-fluid {
    width: 100%;  
    height: 300px; 
    max-width: 500px; 
}
</style>
