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
        <h1 class="h3 mb-3">View adoption</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Adoption details</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Animal</th>
                                    <th scope="col">Adoptor image</th>
                                    <th scope="col">Adoptor</th>
                                    <th scope="col">Adoptor info</th>
                                    <th scope="col">Adoption from date</th>
                                    <th scope="col">Adoption To date</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM animal_adoption";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            $sql2 = "SELECT animal_name FROM animal_master where animal_id = '$row[animal_id]'";
                                            $res2 = mysqli_query($conn,$sql2);

                                            if(mysqli_num_rows($res2) > 0) {
                                                $row2 = mysqli_fetch_array($res2);
                                            }
                                            echo "<td>$row2[animal_name]</td>";
                                            echo "<td><img src='../images/" . $row['image'] . "' width='100' height='100'></td>";
                                            echo "<td>$row[adopter_name]</td>";
                                            echo "<td>";
                                            echo " <a type='button' data-bs-toggle='modal' data-bs-target='#description$row[adoption_id]' class='primary'>View details</a>";
                                            echo "</td>";
                                            echo "<td>$row[adoption_from_date]</td>";
                                            echo "<td>$row[adoption_to_date]</td>";
                                            echo "<td>$row[amount]</td>";
                                            echo "</tr>";
                                            $i++;
                                            ?>

                                            
                                            <div class="modal fade" id="description<?php echo $row["animal_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content" style="width: 500px;">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addLabel">Description</h1>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <p>Adoptor name : <strong><?php echo $row["adopter_name"]; ?></strong></p>
                                                                    <p>DOB : <strong><?php echo $row["adopter_name"]; ?></strong></p>
                                                                    <p>Nationality : <strong><?php echo $row["nationality"]; ?></strong></p>
                                                                    <p>Address : <strong><?php echo $row["address"]; ?></strong></p>
                                                                    <p>Email : <strong><?php echo $row["email"]; ?></strong></p>
                                                                    <p>Phone : <strong><?php echo $row["phone"]; ?></strong></p>
                                                                    <p>Description : <strong><?php echo $row["description"]; ?></strong></p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
