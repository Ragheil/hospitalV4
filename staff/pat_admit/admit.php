<?php
// Allow requests from a specific origin
header("Access-Control-Allow-Origin: http://localhost:5174");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type");

// Allow credentials (if needed)
header("Access-Control-Allow-Credentials: true");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return early for preflight request
    exit;
}

include "db_conn.php";



if (isset($_POST["submit"])) {
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

    $sql = "INSERT INTO `pat_admit`(`patient_no`, `advance_payment`, `mode_of_payment`, `room_no`, `department_name`, `date_of_admission`, `initial_condition`, `diagnosis`, `treatment`, `doctor_no`, `attendant_name`)
            VALUES ('$patient_no','$advance_payment','$mode_of_payment','$room_no','$department_name','$date_of_admission','$initial_condition','$diagnosis','$treatment','$doctor_no','$attendant_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_pat_admit.php?msg=New record created successfully");
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

    <title>Admit</title>

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
        ADMIT PATIENT
    </nav>

    <div class="container"
        style="border-radius: 48px;background: #88c4f1; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
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

                        <label class="form-label" for="patient_no"> Patient Number </label>
                        <select class="form-select" name="patient_no" id="patient_no">
                            <?php while ($rows = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $rows['patient_no']; ?>">
                                <?php echo $rows['patient_no']; ?> • <?php echo $rows['patient_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Advance Payment</label>
                        <input type="text" class="form-control" name="advance_payment" placeholder="Advance Payment">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mode of Payment</label>
                        <input type="text" class="form-control" name="mode_of_payment" placeholder="Mode of Payment">
                    </div>

                    <div class="col-md-3">
                        <?php
                        include "db_conn.php";
                        $sql = "SELECT * FROM `room_details` WHERE `status` LIKE 'Y'";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <label class="form-label" for="room_no"> Room Type</label>
                        <select class="form-select" name="room_no" id="room_no">
                            <?php while ($rows = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $rows['room_no']; ?>">
                                <?php echo $rows['room_no']; ?> • <?php echo $rows['room_type']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <?php
                        include "db_conn.php";
                        $sql = "SELECT department_name FROM department ";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <label class="form-label" for="department_name"> Department Name </label>
                        <select class="form-select" name="department_name" id="department_name">
                            <?php while ($rows = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $rows['department_name']; ?>">
                                <?php echo $rows['department_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date of Admission</label>
                        <input type="date" class="form-control" name="date_of_admission"
                            placeholder="Date of Admission">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Initial Condition</label>
                        <input type="text" class="form-control" name="initial_condition"
                            placeholder="Initial Condition">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Diagnosis</label>
                        <input type="text" class="form-control" name="diagnosis" placeholder="Diagnosis">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Treatment</label>
                        <input type="text" class="form-control" name="treatment" placeholder="Treatment">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php
                        include "db_conn.php";
                        $sql = "SELECT doctor_id,doctor_name FROM all_doctors ";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <label class="form-label" for="doctor_no"> Doctor No </label>
                        <select class="form-select" name="doctor_no" id="doctor_no">
                            <?php while ($rows = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $rows['doctor_id']; ?>">  
                                <?php echo $rows['doctor_name']; ?> • <?php echo $rows['doctor_id']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Attendant Name</label>
                        <input type="text" class="form-control" name="attendant_name" placeholder="Treatment">
                    </div>
                </div>
                <div><br>
                    <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
                    <a style="float: right;" href="list_pat_admit.php" class="btn btn-danger">Cancel</a>
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
