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
        <h1 class="h3 mb-3">Enquiry</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Enquiry details</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM enquiry";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$row[name]</td>";
                                            echo "<td>$row[email]</td>";
                                            echo "<td>$row[subject]</td>";
                                            echo "<td>$row[message]</td>";
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
