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

if(!empty($_GET['tickets'])){

    $tickets=$_GET['tickets'];
}
if(!empty($_GET['total'])){

    $amount=$_GET['total'];
}
if(!empty($_GET['date'])){

    $visit_date=$_GET['date'];
}
if (isset($_POST['add_submit'])) {

  $cardholder = $_POST['cardholder'];
  $cardnumber = $_POST['cardnumber'];
  $expmonth = $_POST['expmonth'];
  $expyear = $_POST['expyear'];
  $payment_no = "PAY-" . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
  $ticket_no = "TIC-" . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
  $date = date('Y-m-d');

  $status = "Paid";

    if (mysqli_query($conn, "INSERT INTO payment (payment_no, payment_for, card_holder, card_no, card_exp_month, card_exp_year, 
    amount, date) VALUES ('$payment_no', '$ticket_no', '$cardholder', '$cardnumber', '$expmonth', '$expyear',
    '$amount', '$date')")) {

        if (mysqli_query($conn, "INSERT INTO ticket_booking (ticket_no, user_id, no_of_ticket, price, visit_date, create_date, status) VALUES ('$ticket_no', 
        '$userid', '$tickets', '$amount', '$visit_date', '$date', 'Active')")){

            echo "<script>alert('Payment done successfully');location.href='book-ticket.php'</script>";
        } else {

            echo "<script>alert('Unable to process your request!');</script>";
        }
    
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
        Payment
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
            Payment
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <form class="row g-5" method="POST">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
                        <b>Payment Information:</b>
                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Card hodler name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="" required name="cardholder">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Card Number<span class="text-danger"></span></label>
                                <input autocomplete='off' type="cardnumber" class="form-control" maxlength="16" value="" name="cardnumber">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label">Exp month<span class="text-danger">*</span></label>
                                <select class="form-control" name="expmonth">
                                    <option value="">Choose</option>
                                    <?php
                                    $months = [
                                        'January', 'February', 'March', 'April', 'May', 'June',
                                        'July', 'August', 'September', 'October', 'November', 'December'
                                    ];
                                    
                                    foreach ($months as $index => $month) {
                                        $monthNumber = $index + 1;
                                        echo "<option value=\"$monthNumber\">$month</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label">Exp year<span class="text-danger">*</span></label>
                                <select class="form-control" name="expyear">
                                    <option value="">Choose</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear;
                                    $endYear = $currentYear + 10; 
                                    
                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">CVV<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="cvv" class="form-control" minlength="3" maxlength="3" value="" required name="cvv">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="heading">
                            <h3>Price details</h3>
                        </div>
                        <div class="total" style="display: flex; justify-content: space-between; padding-top: 30px;">
                            <p><strong>Total :</strong></p>
                            <p>₹<?php echo number_format($amount, 2);?></p>
                        </div>
                        <div class="checkout-btn" style="margin-top: 20px; text-align: center;">
                            <button type="submit" name="add_submit" class="btn btn-primary">Pay now</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
    <!-- About End -->

    
<?php

require_once 'include/footer.php';

?>