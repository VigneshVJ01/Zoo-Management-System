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

  $animalid = $_POST['animalid'];
  $adoptor_name = $_POST['adoptor_name'];
  $dob = $_POST['dob'];
  $nationality = $_POST['nationality'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $from_date = $_POST['adoption_from_date'];
  $to_date = $_POST['adoption_to_date'];
  $amount = $_POST['amount'];
  $description = $_POST['description'];
  $adoption_no = "ADP-" . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);


  $status = "Payment pending";
  $imagePath = time() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imagePath)) {

      if (mysqli_query($conn, "INSERT INTO animal_adoption (animal_id, adoption_no, adopter_name, image, date_of_birth, nationality, 
      address, email, phone, adoption_from_date, adoption_to_date, amount, description, status) VALUES ('$animalid', 
      '$adoption_no', '$adoptor_name', '$imagePath', '$dob', '$nationality','$address', '$email', '$phone', '$from_date', '$to_date', 
      '$amount', '$description', '$status')")) {

          echo "<script>alert('Proceed with payment');location.href='adopt-payment.php?amt=$amount&adoptno=$adoption_no'</script>";
      } else {

          echo "<script>alert('Unable to process your request!');location.href='adoption.php'</script>";
      }
  } else {

      echo "<script>alert('Unable to upload image on server.');</script>";
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
        Adoption
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
            Adoption
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <form class="row g-5" method="POST" enctype="multipart/form-data">
          <div class="col-md-4">
            <label for="adoptor_name" class="form-label">Adoptor Name:</label>
            <input type="text" class="form-control" id="adoptor_name" required name="adoptor_name">
          </div>
          <div class="col-md-4">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" required name="dob">
          </div>
          <div class="col-md-4">
            <label for="dob" class="form-label">Adoptor photo:</label>
            <input type="file" class="form-control"  required name="image" accept="image/*">
          </div>
          <div class="col-md-4">
            <label for="nationality" class="form-label">Nationality:</label>
            <input type="text" class="form-control" id="nationality" required name="nationality">
          </div>
          <div class="col-md-4">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" required name="address">
          </div>
          <div class="col-md-4">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" required name="email">
          </div>
          <div class="col-md-4">
            <label for="phone" class="form-label">Phone:</label>
            <input type="tel" class="form-control" id="phone" required name="phone">
          </div>
          <div class="col-md-4">
            <label for="phone" class="form-label">Animal:</label>
            <select class="form-select" id="animalid" required name="animalid">
                <option value="">Select animal</option>
                <?php
                $qry = "SELECT * FROM animal_master";
                $resul = mysqli_query($conn, $qry);

                if ($resul) {
                    while ($row_ani = mysqli_fetch_assoc($resul)) {
                        $animalid = $row_ani['animal_id'];
                        $animal = $row_ani['animal_name'];
                        echo "<option value='$animalid'>$animal</option>";
                    }
                }
                ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="adoptor_name" class="form-label">Adoption amount:</label>
            <input type="number" class="form-control" id="adoption_amount" required name="amount" readonly>
          </div>
          <div class="col-md-4">
            <label for="adoption_from_date" class="form-label">Adoption From Date:</label>
            <input type="date" class="form-control" id="adoption_from_date" required name="adoption_from_date">
          </div>
          <div class="col-md-4">
            <label for="adoption_to_date" class="form-label">Adoption To Date:</label>
            <input type="date" class="form-control" id="adoption_to_date" required name="adoption_to_date">
          </div>
          <div class="col-md-4">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" required name="description"></textarea>
          </div>
          <div>
            <button type="submit" name="add_submit" class="btn btn-primary">Adopt</button>
          </div>
        </form>
      </div>
    </div>
    <!-- About End -->

    <script>
    document.getElementById('animalid').addEventListener('change', function() {
        var animalId = this.value; 

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    document.getElementById('adoption_amount').value = data.adaption_amount;
                } else {
                    console.error('Request failed: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', 'get-amount.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('animal_id=' + animalId);
    });
</script>
<?php

require_once 'include/footer.php';

?>