<?php

session_start();

require_once '../include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}
require_once 'include/sidebar.php';
require_once 'include/header.php';

?>

<?php

?>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Payments</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Payment details</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Payment no</th>
                                    <th scope="col">Payment for</th>
                                    <th scope="col">Card holder</th>
                                    <th scope="col">Card no</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM payment";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$row[payment_no]</td>";
                                            echo "<td>$row[payment_for]</td>";
                                            echo "<td>$row[card_holder]</td>";
                                            echo "<td>$row[card_no]</td>";
                                            echo "<td>$row[amount]</td>";
                                            echo "<td>$row[date]</td>";
                                            echo "</tr>";
                                            $i++;
                                            ?>

                                            
                                            
                                            <?php
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</main>

<?php
require_once 'include/footer.php';
?>
