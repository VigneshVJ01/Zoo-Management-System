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
if (isset($_POST['add_submit'])) {

    $animal_name = $_POST['animal_name'];
    $scientific_name = $_POST['scientific_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $no_of_animal = $_POST['no_of_animal'];
    $amount = $_POST['amount'];

    $status = "Active";
    $imagePath = time() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imagePath)) {

        if (mysqli_query($conn, "INSERT INTO animal_master (animal_name, scientific_name, category, image, no_of_animal, adaption_amount, description, 
                status) VALUES ('$animal_name', '$scientific_name', '$category', '$imagePath', '$no_of_animal','$amount', '$description', '$status')")) {

            echo "<script>alert('Animal added successfully');location.href='animal.php'</script>";
        } else {

            echo "<script>alert('Unable to process your request!');location.href='animal.php'</script>";
        }
    } else {

        echo "<script>alert('Unable to upload image on server.');</script>";
    }
}

if (isset($_POST['update'])) {

    $animal_name = $_POST['animal_name'];
    $scientific_name = $_POST['scientific_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $no_of_animal = $_POST['no_of_animal'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    if (!empty($_FILES['image']['name'])) {

        $imagePath = time() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imagePath)) {

            if (mysqli_query($conn, "UPDATE animal_master SET animal_name = '$animal_name', scientific_name = '$scientific_name', 
                category = '$category', image = '$imagePath', no_of_animal = '$no_of_animal', adaption_amount = '$amount', 
                description = '$description', status = '$status' WHERE animal_id = '$id'")) {

                echo "<script>alert('Animal updated successfully');location.href='animal.php'</script>";
            } else {

                echo "<script>alert('Unable to process your request!');location.href='animal.php'</script>";
            }
        } else {

            echo "<script>alert('Unable to upload image on server.');</script>";
        }
    } else {

        if (mysqli_query($conn, "UPDATE animal_master SET animal_name = '$animal_name', scientific_name = '$scientific_name', 
        category = '$category', no_of_animal = '$no_of_animal', adaption_amount = '$amount', 
        description = '$description', status = '$status' WHERE animal_id = '$id'")) {

            echo "<script>alert('Animal updated successfully');location.href='animal.php'</script>";
        } else {

            echo "<script>alert('Unable to process your request!');location.href='animal.php'</script>";
        }
    }
}

if (isset($_POST['delete_submit'])) {


    if (mysqli_query($conn, "DELETE from animal_master WHERE animal_id = '$_POST[delete_id]'")) {

        echo "<script>alert('animal deleted successfully');location.href='animal.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='animal.php'</script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Animal master</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Animal details</h5>
                            <div>
                                <button type="button" class="btn btn-primary radius" data-bs-toggle="modal" data-bs-target="#add">Add Animal</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Animal</th>
                                    <th scope="col">Animal name</th>
                                    <th scope="col">Scientific name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">No of animal</th>
                                    <th scope="col">Adoption amount</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM animal_master";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td><img src='images/" . $row['image'] . "' width='100' height='100'></td>";
                                            echo "<td>$row[animal_name]</td>";
                                            echo "<td>$row[scientific_name]</td>";
                                            echo "<td>$row[category]</td>";
                                            echo "<td>$row[no_of_animal]</td>";
                                            echo "<td>$row[adaption_amount]</td>";
                                            echo "<td>";
                                            echo " <a type='button' data-bs-toggle='modal' data-bs-target='#description$row[animal_id]' class='primary'>View description</a>";
                                            echo "</td>";
                                            echo "<td>$row[status]</td>";
                                            echo "<td>";
                                            echo "<form method='post'>";
                                            echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[animal_id]'/>
                                            <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp mb-2'><i data-feather='trash-2'></i></button>";
                                            echo " <button type='button' data-bs-toggle='modal' data-bs-target='#update$row[animal_id]' class='btn btn-primary shadow btn-xs sharp'><i data-feather='edit'></i></button>";
                                            echo "</form>";
                                            echo "</td>";
                                            echo "</tr>";
                                            $i++;
                                            ?>

                                            <div class="modal fade" id="update<?php echo $row["animal_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content" style="width: 500px;">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addLabel">Update animal</h1>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Animal name<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['animal_name']; ?>" required name="animal_name">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Scientific name<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['scientific_name']; ?>" required name="scientific_name">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Category<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="category">
                                                                            <option value="Mammal" <?php if ($row['category'] == 'Mammal') {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>>Mammal</option>
                                                                            <option value="Reptile" <?php if ($row['category'] == 'Reptile') {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>>Reptile</option>
                                                                            <option value="Bird" <?php if ($row['category'] == 'Bird') {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>>Bird</option>
                                                                            <option value="Fish" <?php if ($row['category'] == 'Fish') {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>>Fish</option>
                                                                        </select>                                            
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Upload Image<span class="text-danger">*</span></label>
                                                                        <input type="file" class="form-control" name="image" accept="image/*">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">No of animal<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="number" class="form-control" value="<?php echo $row['no_of_animal']; ?>" required name="no_of_animal">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Adoption amount<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="number" class="form-control" value="<?php echo $row['adaption_amount']; ?>" required name="amount">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Description<span class="text-danger">*</span></label>
                                                                        <textarea autocomplete='off' class="form-control" required name="description"><?php echo $row['description']; ?></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="status">
                                                                            <option value="Active" <?php if ($row['status'] == 'Active') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Active</option>
                                                                            <option value="Inactive" <?php if ($row['status'] == 'Inactive') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['animal_id']; ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
                                                                    <p><?php echo $row["description"]; ?></p>
                                                                    
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
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-content" style="width: 500px;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add animal</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Animal name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="animal_name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Scientific name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="scientific_name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Category<span class="text-danger">*</span></label>
                                                <select class="form-control" name="category">
                                                    <option value="">Select any</option>
                                                    <option value="Mammal">Mammal</option>
                                                    <option value="Reptile">Reptile</option>
                                                    <option value="Bird">Bird</option>
                                                    <option value="Fish">Fish</option>
                                                </select>                                            
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Upload Image<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="image" accept="image/*" required>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">No of animal<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="number" class="form-control" required name="no_of_animal">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Adoption amount<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="number" class="form-control" required name="amount">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                                <textarea autocomplete='off' class="form-control" required name="description"></textarea>
                                            </div>
                                            
                                            <!-- <div class="col-xl-6 mb-3">
                                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                                <select class="form-control" name="status">
                                                <option value="">Select status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                                </select>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="add_submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
require_once 'include/footer.php';
?>
