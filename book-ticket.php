<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<?php
if (isset($_POST['add_submit'])) {
    $total_tickets = $_POST['total_tickets'];
    $total_amount = $_POST['total_amount'];
    $ticket_date = $_POST['date'];

    if($total_tickets > 0){

        echo "<script>alert('Proceed with payment');location.href='ticket-payment.php?tickets=$total_tickets&total=$total_amount&date=$ticket_date'</script>";

    } else {
        echo "<script>alert('Please select ticket!');location.href='book-ticket.php'</script>";
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
        Book tickets
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
            Book tickets
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <form class="row" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 mb-5">
                    <div class="row">
                        <div class="col-md-5"><h4>Select date for visiting</h4></div>
                        <div class="col-md-2"><input name="date" required class="form-control" type="date" ></div>

                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><h4>Entry Fees &amp; Other Charges</h4></div>
                        <div class="col-md-3"><h4>Price</h4></div>
                        <div class="col-md-2"><h4>Quantity</h4></div>
                        <div class="col-md-2"><h4>Amount</h4></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Child (5 - 12 Years)</p></div>
                        <div class="col-md-3"><p>Rs.40</p></div>
                        <div class="col-md-2"><input name="quantity_child" min="1.0" max="20.0" class="form-control" type="number" id="quantity_child"></div>
                        <div class="col-md-2"><input class="form-control" type="text" id="amount_child" value="0.00" name="amount_child" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Adult Indian</p></div>
                        <div class="col-md-3"><p>Rs.80</p></div>
                        <div class="col-md-2"><input name="quantity_adult_indian" min="1.0" max="20.0" class="form-control" type="number" id="quantity_adult_indian"></div>
                        <div class="col-md-2"><input class="form-control" type="text" value="0.00" name="amount_adult_indian" id="amount_adult_indian" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Senior Citizen (60 yrs. & above)</p></div>
                        <div class="col-md-3"><p>Rs.40</p></div>
                        <div class="col-md-2"><input name="quantity_senior_citizen" min="1.0" max="20.0" class="form-control" type="number" id="quantity_senior_citizen"></div>
                        <div class="col-md-2"><input class="form-control" type="text" value="0.00" name="amount_senior_citizen" id="amount_senior_citizen" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Adult (Foreign)</p></div>
                        <div class="col-md-3"><p>Rs.400</p></div>
                        <div class="col-md-2"><input name="quantity_adult_foreign" min="1.0" max="20.0" class="form-control" type="number" id="quantity_adult_foreign"></div>
                        <div class="col-md-2"><input class="form-control" type="text" value="0.00" name="amount_adult_foreign" id="amount_adult_foreign" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Child (Foreigner)</p></div>
                        <div class="col-md-3"><p>Rs.200</p></div>
                        <div class="col-md-2"><input name="quantity_child_foreign" min="1.0" max="20.0" class="form-control" type="number" id="quantity_child_foreign"></div>
                        <div class="col-md-2"><input class="form-control" type="text" value="0.00" name="amount_child_foreign" id="amount_child_foreign" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5"><p>Privilege Ticket</p></div>
                        <div class="col-md-3"><p>Rs.400</p></div>
                        <div class="col-md-2"><input name="quantity_privilege_ticket" min="1.0" max="20.0" class="form-control" type="number" id="quantity_privilege_ticket"></div>
                        <div class="col-md-2"><input class="form-control" type="text" value="0.00" name="amount_privilege_ticket" id="amount_privilege_ticket" readonly></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"><p>Total Number of Tickets</p></div>
                        <div class="col-md-2"><input class="form-control" type="text" name="total_tickets" id="total_tickets" value="0" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><p>Total Amount</p></div>
                        <div class="col-md-2"><input class="form-control" type="text" name="total_amount" id="total_amount" value="0.00" readonly></div>
                    </div>
                </div>
                <div>
                    <!-- <a href="ticket-payment.php?tickets=&total=" class="btn btn-primary">Continue</a> -->
                    <button type="submit" name="add_submit" class="btn btn-primary">Continue</button>

                </div>

            </form>
        </div>
    </div>
    <!-- About End -->

<script>
    function calculateAmount(quantityInputId, price, amountInputId) {
        var quantity = parseFloat(document.getElementById(quantityInputId).value);
        var amount = quantity * price;
        document.getElementById(amountInputId).value = amount.toFixed(2);
        calculateTotal();
    }

    function calculateTotal() {
        var totalTickets = 0;
        var totalAmount = 0;
        
        var ticketTypes = ['child', 'adult_indian', 'senior_citizen', 'adult_foreign', 'child_foreign', 'privilege_ticket'];
        ticketTypes.forEach(function(type) {
            var quantity = parseFloat(document.getElementById('quantity_' + type).value);
            var amount = parseFloat(document.getElementById('amount_' + type).value);
            if (quantity > 0) {
                totalTickets += quantity; 
            }
            totalAmount += amount;
        });

        document.getElementById('total_tickets').value = totalTickets;
        document.getElementById('total_amount').value = totalAmount.toFixed(2);
    }

    document.getElementById('quantity_child').addEventListener('input', function() {
        calculateAmount('quantity_child', 40, 'amount_child');
    });

    document.getElementById('quantity_adult_indian').addEventListener('input', function() {
        calculateAmount('quantity_adult_indian', 80, 'amount_adult_indian');
    });

    document.getElementById('quantity_senior_citizen').addEventListener('input', function() {
        calculateAmount('quantity_senior_citizen', 40, 'amount_senior_citizen');
    });

    document.getElementById('quantity_adult_foreign').addEventListener('input', function() {
        calculateAmount('quantity_adult_foreign', 400, 'amount_adult_foreign');
    });

    document.getElementById('quantity_child_foreign').addEventListener('input', function() {
        calculateAmount('quantity_child_foreign', 200, 'amount_child_foreign');
    });

    document.getElementById('quantity_privilege_ticket').addEventListener('input', function() {
        calculateAmount('quantity_privilege_ticket', 400, 'amount_privilege_ticket');
    });
</script>


<?php

require_once 'include/footer.php';

?>