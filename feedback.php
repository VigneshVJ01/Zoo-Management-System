<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<?php

if(!empty($_GET['tic_no'])){

    $ticket_no=$_GET['tic_no'];
}
if (isset($_POST['add_submit'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    if (mysqli_query($conn, "INSERT INTO feedback (name, ticket_no, message) VALUES ('$name', '$ticket_no', 
    '$message')")) {

        echo "<script>alert('feedback added successfully');location.href='feedback.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='feedback.php'</script>";
    }

}
?>
    <!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
        Feedback
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
            Feedback
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p><span class="text-primary me-2">#</span>Feedback</p>
                    <h1 class="display-5 mb-4">Give feedback about visiting us!</h1>
                    
                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" name="name" placeholder="Your Name" />
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-light border-0" placeholder="Leave a message here" name="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" name="add_submit">Send feedback</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Contact End -->




<?php

require_once 'include/footer.php';

?>