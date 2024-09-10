<?php
include "./partials/header.php";
include "./partials/dbconnect.php";

$query = "SELECT * FROM specialization";
$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);


  if (isset($_POST['btn'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $dob = $_POST['dob'];
    $specialization = $_POST['specialization'];
    $fees = $_POST['fees'];
    $image_name =  $_FILES['image']['name'];
    $image_type =  $_FILES['image']['type'];
    $image_tmp_name =  addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
    
    $q = "INSERT INTO `doctors`(`doctor_name`, `doctor_email`, `doctor_age`, `doctor_city`, `doctor_dob`, `specialization_id`, `doctor_fees`,`image_name`,`mime_type`, `data`) VALUES ('$name', '$email', '$age', '$city', '$dob', '$specialization', '$fees', '$image_name', '$image_type', '$image_tmp_name')" ;
    $r = mysqli_query($conn, $q);
    if ($r) {
      echo '<script>alert("Data inserted")</script>';
    } else {
      echo '<script>alert("Data not inserted")</script>';
    }
  }


?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
  }
  body{
    background: #1abc9c;
    overflow-x: hidden;
  }
  ::selection{
    background: rgba(26,188,156,0.3);
  }
  .container{
    max-width: 440px;
    padding: 0 20px;
    margin: 170px auto;
  }
  .wrapper{
    width: 100%;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
  }
  .wrapper .title{
    height: 90px;
    background: #4e73df;
    border-radius: 5px 5px 0 0;
    color: #fff;
    font-size: 30px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .wrapper form{
    padding: 30px 25px 25px 25px;
  }
  .wrapper form .row{
    height: 45px;
    margin-bottom: 15px;
    position: relative;
  }
  .wrapper form .row input{
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 60px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    font-size: 16px;
    transition: all 0.3s ease;
  }
  form .row input:focus{
    border-color: #4e73df;
    box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
  }
  form .row input::placeholder{
    color: #999;
  }
  .wrapper form .row i{
    position: absolute;
    width: 47px;
    height: 100%;
    color: #fff;
    font-size: 18px;
    background: #4e73df;
    border: 1px solid #4e73df;
    border-radius: 5px 0 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .wrapper form .pass{
    margin: -8px 0 20px 0;
  }
  .wrapper form .pass a{
    color: #4e73df;
    font-size: 17px;
    text-decoration: none;
  }
  .wrapper form .pass a:hover{
    text-decoration: underline;
  }
  .wrapper form .button input{
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding-left: 0px;
    background: #4e73df;
    border: 1px solid #4e73df;
    cursor: pointer;
  }
  form .button input:hover{
    background: #4e73df;
  }
  .wrapper form .signup-link{
    text-align: center;
    margin-top: 20px;
    font-size: 17px;
  }
  .wrapper form .signup-link a{
    color: #4e73df;
    text-decoration: none;
  }
  form .signup-link a:hover{
    text-decoration: underline;
  }
</style>
<div class="container">
    <div class="wrapper">
    <div class="title"><span>Doctor Registeration Form</span></div>
    <form action="./doctoradd.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="username" required>
        </div>
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email or Phone" name="email" required>
        </div>
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="number" placeholder="Age" name="age" required>
        </div>
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="City" name="city" required>
        </div>
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="date" placeholder="Date of Birth" name="dob" title="Date Of Birth" required>
        </div>
        <div class="row">
            <?php
              if ($num) {
                echo '<select name="specialization" id="">';
                while ($user = mysqli_fetch_assoc($result)) {
                  $specializationId = $user['specialization_id'];
                   $specializationName = $user['specialization'];
                   echo "<option value='$specializationId'>$specializationName</option>";


                }
                echo '</select>';

              }
            ?>
        </div>
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="number" placeholder="Fees" name="fees" required>
        </div>
        <div class="row">
            <!-- <i class="fas fa-user"></i> -->
            <input type="file" name="image" required>
        </div>
        
        <div class="row button">
            <input type="submit" value="Register" name="btn">
        </div>
        
    </form>
    </div>
</div>

<?php
include "./partials/footer.php";
?>