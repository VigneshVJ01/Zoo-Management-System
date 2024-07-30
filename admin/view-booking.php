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
        <h1 class="h3 mb-3">Bookings</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Booking details</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ticket no</th>
                                    <th scope="col">User</th>
                                    <th scope="col">No of ticket</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Visit date</th>
                                    <th scope="col">Booking date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM ticket_booking";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$row[ticket_no]</td>";
                                            $sql2 = "SELECT username FROM registration where user_id = '$row[user_id]'";
                                            $res2 = mysqli_query($conn,$sql2);

                                            if(mysqli_num_rows($res2) > 0) {
                                                $row2 = mysqli_fetch_array($res2);
                                            }
                                            echo "<td>$row2[username]</td>";
                                            echo "<td>$row[no_of_ticket]</td>";
                                            echo "<td>$row[price]</td>";
                                            echo "<td>$row[visit_date]</td>";
                                            echo "<td>$row[create_date]</td>";
                                            echo "<td>$row[status]</td>";
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
