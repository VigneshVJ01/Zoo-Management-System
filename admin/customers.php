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
        <h1 class="h3 mb-3">Customer</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Customers details</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">dob</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM customer_details";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$row[customer_name]</td>";
                                            echo "<td>$row[phone]</td>";
                                            echo "<td>$row[email]</td>";
                                            echo "<td>$row[age]</td>";
                                            echo "<td>$row[address]</td>";
                                            echo "<td>$row[gender]</td>";
                                            echo "<td>$row[dob]</td>";
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
