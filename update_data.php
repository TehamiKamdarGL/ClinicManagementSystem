<?php
ob_start();
include "./partials/header.php";
include "./partials/dbconnect.php";

if (isset($_POST["update"])) {
    $name = $_POST["doctorname"];
    $specialization = $_POST["specialization"];
    $fees = $_POST["fees"];
    $id = $_GET["id"];

    $q = "UPDATE `doctors` SET `doctor_name`='$name',`specialization_id`='$specialization',`doctor_fees`='$fees' where `doctor_id` = $id";
    $r = mysqli_query($conn, $q);

    if (!$r) {
        die("Query Failed");
    }else{
        header("location: ./doctorfetch.php?msg=Record Updated");
    }
}


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM doctors where doctor_id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
    else{
        $row = mysqli_fetch_assoc($result);
       
        echo 
        "
        <form action='./update_data.php?id=$id' method='POST'>
            <div class='container'>
                <div class='mb-3'>
                    <label for='exampleFormControlInput1' class='form-label'>Name</label>
                    <input type='text' value='$row[doctor_name]' name='doctorname' class='form-control' id='exampleFormControlInput1' placeholder='Name'>
                </div>
                <div class='mb-3'>
                    <label for='exampleFormControlInput1' class='form-label'>Specialization</label>
                    <input type='text' value='$row[specialization_id]' name='specialization' class='form-control' id='exampleFormControlInput1' placeholder='Specialization'>
                </div>
                <div class='mb-3'>
                    <label for='exampleFormControlInput1' class='form-label'>Doctor Fees</label>
                    <input type='text' value='$row[doctor_fees]' class='form-control' name='fees' id='exampleFormControlInput1' placeholder='Fees'>
                </div>
                <div class='mb-3'>
                    <button type='submit' class='btn btn-primary' name='update'>Update</button>
                </div>
            </div>
        </form>
        ";
    }
}

?>


<?php
include "./partials/footer.php";
ob_end_flush();
?>