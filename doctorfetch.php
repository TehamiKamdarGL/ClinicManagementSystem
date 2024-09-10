<?php
include "./partials/header.php";
include "./partials/dbconnect.php";
// session_start();

$query = "SELECT * FROM doctors INNER JOIN specialization on specialization.specialization_id = doctors.specialization_id";
$result = mysqli_query($conn, $query);
// $num = mysqli_num_rows($result);


?>

<div class="table-responsive p-4">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Doctor Image</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Doctor Specialization</th>
                <th scope="col">Doctor Fees</th>
                 <?php
                    if (isset($_SESSION["email"])) {
                        $email = $_SESSION["email"];
                        // $qu = "SELECT * FROM doctors where doctor_email = '$email'";
                        // $re = mysqli_query($conn, $qu);
                        // $ro = mysqli_fetch_assoc($re);
                        if ($row["role_id"] == 1){
                            echo "<th scope='col'>Action</th>";
                        }
                    }
                    ?>  
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
                <tr class="">
                    <td><img src="data:<?php echo $row['mime_type']; ?>;base64,<?php echo base64_encode($row['data']); ?>" height="200" width="200"  alt=""></td>
                    <td><?php echo $row['doctor_name']; ?></td>
                    <td><?php echo $row['specialization'];?></td>
                    <td><?php echo $row['doctor_fees'];?></td>
                    <?php
                    if (isset($_SESSION["email"])) {
                        $email = $_SESSION["email"];
                        $qu = "SELECT * FROM users where user_email = '$email'";
                        $re = mysqli_query($conn, $qu);
                        $ro = mysqli_fetch_assoc($re);

                        if ($ro['role_id'] == 1){
                            echo "<td><a class='btn btn-success mx-2' href='./update_data.php?id=<?php echo $row[doctor_id]?>'>Update</a><a class='btn btn-danger'>Delete</a></td>";
                        }
                    }
                    ?>
                </tr>
            <?php
            }
            ?> 
        </tbody>
    </table>
</div>


<?php include "./partials/footer.php";?>