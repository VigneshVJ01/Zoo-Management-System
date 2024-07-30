<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<?php

$userid = $_SESSION['user_id'];

if (isset($_POST['update'])) {

    $status = "Canceled";
    $ticket_id = $_POST['ticket_id'];
  

    if (mysqli_query($conn, "UPDATE ticket_booking SET status = '$status' WHERE ticket_id = '$ticket_id'")){

        echo "<script>alert('Ticket cancelled successfully');location.href='bookings.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');</script>";
    }
      
  }
?>
<style>
    .card {
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .recepie_area {
            padding-top: 80px;
            padding-bottom: 70px;
        }
        .total p{
            font-size: 18px;
        }
        .heading {
            border-bottom: 1px solid #ddd; 
            padding: 10px 0;
        }
        .card-body b{
            color: black;
        }
</style>
    <!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
        Bookings
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
            Bookings
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-3" method="POST">
            <?php
            $sql = "SELECT * FROM ticket_booking";
            $res = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($res)>0) {
                while($row = mysqli_fetch_array($res)){
            
            ?>
                <form method="POST" class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="img/ticket.png" alt="" width="200px" height="100px">
                                </div>
                                <div class="col-md-3">
                                    <p>Ticket No : <?php echo $row['ticket_no']; ?></p>
                                    <p>No of ticket : <?php echo $row['no_of_ticket']; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p>Price : <?php echo $row['price']; ?></p>
                                    <p>Visit date : <?php echo $row['visit_date']; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p>Booked on : <?php echo $row['create_date']; ?></p>
                                    <?php
                                    $date = date('Y-m-d');
                                    
                                    if ($row['status'] == "Active" && strtotime($row['visit_date']) > strtotime($date)) {
                                        echo "<input type='hidden' name='ticket_id' value='$row[ticket_id]' />";
                                        echo '<button class="btn btn-danger" onClick="return confirm(' . "'Are you sure you want to Cancel?'" . ')"type="submit" name="update">Cancel</button>';
                                    } 
                                    elseif ($row['status'] == "Canceled") {
                                        echo "The ticket is canceled";
                                    }
                                    elseif (strtotime($row['visit_date']) == strtotime($date)) {
                                        echo "<p style='color: #2eb872;'>Open To Visit</p>";
                                    } 
                                    else {
                                        echo "<a href='feedback.php?tic_no=$row[ticket_no]' class='btn btn-primary'>Give feedback</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
                }
            }
            ?>
            
        </div>
      </div>
    </div>
    <!-- About End -->

    
<?php

require_once 'include/footer.php';

?>