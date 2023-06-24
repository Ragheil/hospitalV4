<?php
include "db_conn.php";
$id = $_GET["patient_no"];

// Fetch existing values from the database
$sql = "SELECT * FROM `pat_admit` WHERE patient_no = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
  // Update the variables with the new values submitted through the form
  $patient_no = $_POST['patient_no'];
  $advance_payment = $_POST['advance_payment'];
  $mode_of_payment = $_POST['mode_of_payment'];
  $room_no = $_POST['room_no'];
  $department_name = $_POST['department_name'];
  $date_of_admission = $_POST['date_of_admission'];
  $initial_condition = $_POST['initial_condition'];
  $diagnosis = $_POST['diagnosis'];
  $treatment = $_POST['treatment'];
  $doctor_no = $_POST['doctor_no'];
  $attendant_name = $_POST['attendant_name'];

  $sql = "UPDATE `pat_admit` SET `patient_no`='$patient_no', `advance_payment`='$advance_payment', `mode_of_payment`='$mode_of_payment',
  `room_no`='$room_no', `department_name`='$department_name', `date_of_admission`='$date_of_admission', `initial_condition`='$initial_condition',
  `diagnosis`='$diagnosis', `treatment`='$treatment', `doctor_no`='$doctor_no', `attendant_name`='$attendant_name' WHERE patient_no = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: list_pat_admit.php?msg=Data updated successfully");
    exit();
  } else {
    echo "Failed: " . mysqli_error($conn);
    echo "SQL Query: " . $sql;
  }
}
?>

<!-- Rest of your HTML code -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>EDIT PATIENT INFO</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    edit admitted patient
  </nav>

  <div class="container" style="border-radius: 48px; background: #88c4f1; box-shadow: 5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
    <div class="text-center mb-4"><br>
      <h1>ADMIT PATIENT</h1>
      <p class="text-muted"> Complete the form </p>
    </div>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col-md-4">
            <?php
            include "db_conn.php";
            $sql = "SELECT patient_no,patient_name FROM `pat_entry`";
            $result = mysqli_query($conn, $sql);
            ?>

            <label class="form-label" for="patient_no">Patient Number</label>
            <select class="form-select" name="patient_no" id="patient_no">
              <?php while ($rows = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $rows['patient_no']; ?>" <?php if ($rows['patient_no'] == $row['patient_no']) echo "selected"; ?>>
                  <?php echo $rows['patient_no']; ?> • <?php echo $rows['patient_name']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-3">
            <label class="form-label">Advance Payment</label>
            <input type="text" class="form-control" name="advance_payment" placeholder="Advance Payment" value="<?php echo $row['advance_payment']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Mode of Payment</label>
            <input type="text" class="form-control" name="mode_of_payment" placeholder="Mode of Payment" value="<?php echo $row['mode_of_payment']; ?>">
          </div>

          <div class="col-md-3">
            <?php
            include "db_conn.php";
            $sql = "SELECT room_no,room_type FROM `room_details`";
            $result = mysqli_query($conn, $sql);
            ?>

            <label class="form-label" for="room_no">Room Type</label>
            <select class="form-select" name="room_no" id="room_no">
              <?php while ($rows = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $rows['room_no']; ?>" <?php if ($rows['room_no'] == $row['room_no']) echo "selected"; ?>>
                  <?php echo $rows['room_no']; ?> • <?php echo $rows['room_type']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <?php
            include "db_conn.php";
            $sql = "SELECT department_name FROM department";
            $result = mysqli_query($conn, $sql);
            ?>

            <label class="form-label" for="department_name">Department Name</label>
            <select class="form-select" name="department_name" id="department_name">
              <?php while ($rows = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $rows['department_name']; ?>" <?php if ($rows['department_name'] == $row['department_name']) echo "selected"; ?>>
                  <?php echo $rows['department_name']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-4">
            <label class="form-label">Date of Admission</label>
            <input type="date" class="form-control" name="date_of_admission" placeholder="Date of Admission" value="<?php echo $row['date_of_admission']; ?>">
          </div>

          <div class="col-md-3">
            <label class="form-label">Initial Condition</label>
            <input type="text" class="form-control" name="initial_condition" placeholder="Initial Condition" value="<?php echo $row['initial_condition']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Diagnosis</label>
            <input type="text" class="form-control" name="diagnosis" placeholder="Diagnosis" value="<?php echo $row['diagnosis']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Treatment</label>
            <input type="text" class="form-control" name="treatment" placeholder="Treatment" value="<?php echo $row['treatment']; ?>">
          </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-4">
    <?php
    $sql = "SELECT doctor_id, doctor_name FROM all_doctors";
    $result = mysqli_query($conn, $sql);
    ?>

    <label class="form-label" for="doctor_no">Doctor</label>
    <select class="form-select" name="doctor_no" id="doctor_no">
        <?php while ($rows = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $rows['doctor_id']; ?>" <?php if ($rows['doctor_id'] == $row['doctor_no']) echo "selected"; ?>>
                <?php echo $rows['doctor_name']; ?> • <?php echo $rows['doctor_id']; ?>
            </option>
        <?php } ?>
    </select>
</div>


          <div class="col-md-4">
            <label class="form-label">Attendant Name</label>
            <input type="text" class="form-control" name="attendant_name" placeholder="Treatment" value="<?php echo $row['attendant_name']; ?>">
          </div>
        </div>
      </div>
      <!-- REFER DOCTOR -->

      <div><br>
        <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
        <a style="float: right;" href="list_pat_admit.php" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
