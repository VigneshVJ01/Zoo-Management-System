<?php
require_once 'include/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $animalid = $_POST['animal_id'];

    $result = mysqli_query($conn, "SELECT adaption_amount FROM animal_master WHERE animal_id = '$animalid'");

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Failed to fetch details'));
    }
}

mysqli_close($conn);

?>