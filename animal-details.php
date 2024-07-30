<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<?php
if(!empty($_GET['id'])){
    $animal_id = $_GET['id'];
}

$sql = "SELECT * FROM animal_master where animal_id = '$animal_id'";
$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0) {
    $row = mysqli_fetch_array($res);
}
?>
    <!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
        Animal details
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
            Animal details
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>Category : <?php echo $row['category'];?></p>
            <h1 class="display-5 mb-4">
              <span class="text-primary"><?php echo $row['animal_name'];?></span>
            </h1>
            
            <h5 class="mb-3">Scientific name : <?php echo $row['scientific_name'];?></h5>
            <h5 class="mb-3">No of animals : <?php echo $row['no_of_animal'];?></h5>
            <h5 class="mb-3">Adaption amount : <?php echo $row['adaption_amount'];?></h5>
            
            <p class="mb-4"><?php echo $row['description'];?></p>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="ani-img" style="border: 5px solid #2eb872; border-radius: 5px;">
                <img class="img-fluid" src="admin/images/<?php echo $row['image'];?>" alt="" />
            </div>
        </div>
        </div>
      </div>
    </div>
    <style>
.custom-cardinal .img-fluid {
    width: 100%;  
    height: 300px; 
    max-width: 500px; 
}
</style>

    <!-- About End -->
<?php

require_once 'include/footer.php';

?>