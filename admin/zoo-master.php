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

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $entime = $_POST['entime'];
    $description = $_POST['description'];
    $extime = $_POST['extime'];
    $holiday = $_POST['holiday'];

    $status = "Active";
    

    if (mysqli_query($conn, "INSERT INTO zoo_master (location, phone_no, entry_time, exit_time, weekly_holiday, 
    description, status) VALUES ('$name', '$phone', '$entime', '$extime', '$holiday','$description', '$status')")) {

        echo "<script>alert('Location added successfully');location.href='zoo-master.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='zoo-master.php'</script>";
    }
   
}

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $entime = $_POST['entime'];
    $description = $_POST['description'];
    $extime = $_POST['extime'];
    $holiday = $_POST['holiday'];
    $status = $_POST['status'];
    $id = $_POST['id'];

   

    if (mysqli_query($conn, "UPDATE zoo_master SET location = '$name', phone_no = '$phone', entry_time = '$entime', 
        exit_time = '$extime', weekly_holiday = '$holiday', description = '$description', status = '$status' WHERE 
        zoo_master_id = '$id'")) {

        echo "<script>alert('Location updated successfully');location.href='zoo-master.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='zoo-master.php'</script>";
    }
}

if (isset($_POST['delete_submit'])) {


    if (mysqli_query($conn, "DELETE from zoo_master WHERE zoo_master_id = '$_POST[delete_id]'")) {

        echo "<script>alert('location deleted successfully');location.href='zoo-master.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='zoo-master.php'</script>";
    }
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Zoo master</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Details</h5>
                            <div>
                                <button type="button" class="btn btn-primary radius" data-bs-toggle="modal" data-bs-target="#add">Add Location</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Location name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Entry time</th>
                                    <th scope="col">Exit time</th>
                                    <th scope="col">Weekly holidy</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM zoo_master";
                                    $res = mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>$row[location]</td>";
                                            echo "<td>$row[phone_no]</td>";
                                            echo "<td>$row[entry_time]</td>";
                                            echo "<td>$row[exit_time]</td>";
                                            echo "<td>$row[weekly_holiday]</td>";
                                            echo "<td>";
                                            echo " <a type='button' data-bs-toggle='modal' data-bs-target='#description$row[zoo_master_id]' class='primary'>View description</a>";
                                            echo "</td>";
                                            echo "<td>$row[status]</td>";
                                            echo "<td>";
                                            echo "<form method='post'>";
                                            echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[zoo_master_id]'/>
                                            <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i data-feather='trash-2'></i></button>";
                                            echo " <button type='button' data-bs-toggle='modal' data-bs-target='#update$row[zoo_master_id]' class='btn btn-primary shadow btn-xs sharp'><i data-feather='edit'></i></button>";
                                            echo "</form>";
                                            echo "</td>";
                                            echo "</tr>";
                                            $i++;
                                            ?>

                                            <div class="modal fade" id="update<?php echo $row["zoo_master_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content" style="width: 500px;">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="addLabel">Update location</h1>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Location name<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['location']; ?>" required name="name">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Phone no<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['phone_no']; ?>" required name="phone">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Entry time<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="time" class="form-control" value="<?php echo $row['entry_time']; ?>" required name="entime">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Exit time<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="time" class="form-control" value="<?php echo $row['exit_time']; ?>" required name="extime">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-label">Weekly holiday<span class="text-danger">*</span></label>
                                                                        <input autocomplete='off' type="text" class="form-control" value="<?php echo $row['weekly_holiday']; ?>" required name="holiday">
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
                                                                    
                                                                    <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['zoo_master_id']; ?>" />
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
                                            <div class="modal fade" id="description<?php echo $row["zoo_master_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add location</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Location name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Phone no<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="phone">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Entry time<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="time" class="form-control" required name="entime">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Exit time<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="time" class="form-control" required name="extime">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Weekly holiday<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" required name="holiday">
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
