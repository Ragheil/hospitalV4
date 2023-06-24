<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $patient_no = $_POST['patient_no'];
    $date_of_admission = $_POST['date_of_admission'];
    $date_of_operation = $_POST['date_of_operation'];
    $doctor_no = $_POST['doctor_no'];
    $no_of_operation_theater = $_POST['no_of_operation_theater'];
    $type_of_operation = $_POST['type_of_operation'];
    $patient_condition_before_opr = $_POST['patient_condition_before_opr'];
    $patient_condition_after_opr = $_POST['patient_condition_after_opr'];
    $treatment_advice = $_POST['treatment_advice'];

    

    // Insert the data into the database
    include "db_conn.php"; // Include your database connection file

    // Prepare the SQL statement
    $sql = "INSERT INTO pat_opr (patient_no, date_of_admission, date_of_operation, doctor_no, no_of_operation_theater, type_of_operation, patient_condition_before_opr, patient_condition_after_opr, treatment_advice) 
    VALUES ('$patient_no', '$date_of_admission', '$date_of_operation', '$doctor_no', '$no_of_operation_theater', '$type_of_operation', '$patient_condition_before_opr', '$patient_condition_after_opr', '$treatment_advice')";

if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost:3000/admin/pat_opr/pat_opr_list.php?msg=New record created successfully");
    exit;
} else {
    echo "Failed: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>PAT OPERATION</title>

    <script>
        $(document).ready(function () {
            // Add event listener to the dropdown
            $("#patient_no").change(function () {
                // Get the selected option value
                var selectedOption = $(this).val();

                // Set the value of the textbox
                $("#myTextbox").val(selectedOption);
            });
        });
    </script>
</head>

<body style="background: linear-gradient(90deg, #efd5ff 0%, #515ada 100%);">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #88c4f1;">
        PAT OPERATION
    </nav>

    <div class="container"
        style="border-radius: 48px;background: #88c4f1; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
        <div class="text-center mb-4"><br>
            <h1>PAT OPERATION</h1>
            <p class="text-muted"> Complete the form </p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php
                        include "db_conn.php";
                        $sql = "SELECT patient_no, patient_name FROM `pat_entry`";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <label class="form-label" for="patient_no"> Patient Number </label>
                        <select class="form-select" name="patient_no" id="patient_no">
                            <?php while ($rows = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $rows['patient_no']; ?>">
                                <?php echo $rows['patient_no']; ?> • <?php echo $rows['patient_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date of Admission</label>
                        <input type="date" class="form-control" name="date_of_admission" placeholder="Date of Admission">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date of Operation</label>
                        <input type="date" class="form-control" name="date_of_operation" placeholder="Date of Operation">
                    </div>

                    <div class="col-md-4">
                  <?php
                      include "db_conn.php";
                      $sql = "SELECT doctor_id,doctor_name FROM all_doctors ";
                      $result = mysqli_query($conn,$sql);
                  ?>
                      <label class="form-label" for="doctor_no">  Doctor No </label>
                      <select class="form-select"  name="doctor_no" id="doctor_no" value="<?php echo $row['doctor_no'] ?>">
                      <?php while ($rows = mysqli_fetch_array($result)) { ?>

                      <option value="<?php echo $rows ['doctor_id']; ?>" > <?php echo $rows ['doctor_name'];  ?> • <?php echo $rows ['doctor_id'];  ?></option>
                      <?php 
                     }   
                     ?>
                  </select>
                </div>
                    <div class="col-md-4">
                        <label class="form-label">Number of Operation Theater</label>
                        <input type="text" class="form-control" name="no_of_operation_theater"
                            placeholder="Number of Operation Theater">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Type of Operation</label>
                        <input type="text" class="form-control" name="type_of_operation"
                            placeholder="Type of Operation">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Patient Condition Before  </label>
                        <input type="text" class="form-control" name="patient_condition_before_opr"
                            placeholder="Patient Condition Before Operation">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Patient Condition After</label>
                        <input type="text" class="form-control" name="patient_condition_after_opr"
                            placeholder="Patient Condition After Operation">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Treatment Advice</label>
                        <input type="text" class="form-control" name="treatment_advice"
                            placeholder="Treatment Advice">
                    </div>
                </div>

                <div><br>
                    <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
                    <a style="float: right;" href="http://localhost:3000/admin/pat_opr/pat_opr_list.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zAZyPEQ8tNkJrxW5jqmI+Ft3O8WVq1uCO3ay0E3lFYzJbK4kG0Zn"
        crossorigin="anonymous"></script>
</body>

</html>
