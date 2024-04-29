<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration form";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$phone = "";
$address = "";
$student_id = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $student_id = $_POST["student_id"];

  do {
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($student_id)) {
      $errorMessage = "All the fields are required.";
      break;
    }

    $sql = "INSERT INTO students (name, email, phone, address, student_id) " .
           "VALUES ('$name', '$email', '$phone', '$address', '$student_id')";
    $result = $connection->query($sql);

    if (!$result) {
      $errorMessage = "Invalid Query: " . $connection->error;
      break;
    }

    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $student_id = "";

    $successMessage = "Student added correctly.";

    header("location: /Student_Registration_Form/index.php");
    exit;

  } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Student Registration</title>
  <style>
    #form {
      padding-left: 20px;
    }

    h2 {
      text-align: center;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="conatiner my-5">
    <h2>New Student</h2>

    <?php
    if ( !empty($errorMessage) ) {
      echo "
      <div id='form' class='row mb-3'>
       <div class='offset-sm-3 col-sm-6'>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
         <strong>$errorMessage</strong>
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
       </div>
      </div>
      ";
    }
    ?>

    <form method="post">

    <div id="form" class="row mb-3">
      <label class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="<?php echo $name?>">
      </div>
    </div>

    <div id="form" class="row mb-3">
      <label class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="email" value="<?php echo $email?>">
      </div>
    </div>

    <div id="form" class="row mb-3">
      <label class="col-sm-3 col-form-label">Phone Number</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
      </div>
    </div>

    <div id="form" class="row mb-3">
      <label class="col-sm-3 col-form-label">Address</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="address" value="<?php echo $address?>">
      </div>
    </div>

    <div id="form" class="row mb-3">
      <label class="col-sm-3 col-form-label">Student ID</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="student_id" value="<?php echo $student_id?>">
      </div>
    </div>

    <?php
    if (!empty($successMessage)) {
      echo "
      <div id='form' class='row mb-3'>
       <div class='offset-sm-3 col-sm-6'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
         <strong>$successMessage</strong>
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
       </div>
      </div> 
      ";
    }
    ?>

    <div id="form" class="row mb-3">
      <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="/Student_Registration_Form/index.php" role="button">Cancel</a>
      </div>
    </div>

    </form>
  </div>
</body>
</html>