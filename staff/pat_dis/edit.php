<?php
include "db_conn.php";
$id = $_GET["patient_no"];

// Fetch existing values from the database
$sql = "SELECT * FROM `pat_dis` WHERE patient_no = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
  // Update the variables with the new values submitted through the form
  $patient_no = $_POST['patient_no'];
  $treatment_given = $_POST['treatment_given'];
  $treatment_advice = $_POST['treatment_advice'];
  $payment_made = $_POST['payment_made'];
  $mode_of_payment = $_POST['mode_of_payment'];
  $date_of_discharged = $_POST['date_of_discharged'];

  // Update the pat_dis table
  $sql = "UPDATE `pat_dis` SET `patient_no`='$patient_no', `treatment_given`='$treatment_given', `treatment_advice`='$treatment_advice',
  `payment_made`='$payment_made', `mode_of_payment`='$mode_of_payment', `date_of_discharged`='$date_of_discharged' WHERE patient_no = '$id'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: list_pat_dis.php?msg=Data updated successfully");
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

  <title>EDIT PAT DIS</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    DIIT PAT DIS
  </nav>

  <div class="container" style="border-radius: 48px; background: #88c4f1; box-shadow: 5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
    <div class="text-center mb-4"><br>
      <h1>EDIT PAT DIS</h1>
      <p class="text-muted">Complete the form</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col-md-4">
            <?php
            $sql = "SELECT patient_no, patient_name FROM `pat_entry`";
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

          <div class="col-md-4">
            <label class="form-label">Treatment Given</label>
            <input type="text" class="form-control" name="treatment_given" placeholder="Treatment Given" value="<?php echo $row['treatment_given']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Treatment Advice</label>
            <input type="text" class="form-control" name="treatment_advice" placeholder="Treatment Advice" value="<?php echo $row['treatment_advice']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Payment Made</label>
            <input type="text" class="form-control" name="payment_made" placeholder="Payment Made" value="<?php echo $row['payment_made']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Mode of Payment</label>
            <input type="text" class="form-control" name="mode_of_payment" placeholder="Mode of Payment" value="<?php echo $row['mode_of_payment']; ?>">
          </div>

          <div class="col-md-4">
            <label class="form-label">Date of Discharge</label>
            <input type="date" class="form-control" name="date_of_discharged" placeholder="Date of Discharge" value="<?php echo $row['date_of_discharged']; ?>">
          </div>
        </div>

        <div><br>
          <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
          <a style="float: right;" href="list_pat_dis.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zAZyPEQ8tNkJrxW5jqmI+Ft3O8WVq1uCO3ay0E3lFYzJbK4kG0Zn" crossorigin="anonymous"></script>
</body>

</html>
