<?php
include "db_conn.php";
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $patient_no = $_POST['patient_no'];
    $treatment_given = $_POST['treatment_given'];
    $treatment_advice = $_POST['treatment_advice'];
    $payment_made = $_POST['payment_made'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $date_of_discharged = $_POST['date_of_discharged'];

    // Insert the data into the database
    include "db_conn.php"; // Include your database connection file

    // Prepare the SQL statement
    $sql = "INSERT INTO pat_dis (patient_no, treatment_given, treatment_advice, payment_made, mode_of_payment, date_of_discharged) 
    VALUES ('$patient_no', '$treatment_given', '$treatment_advice', '$payment_made', '$mode_of_payment', '$date_of_discharged')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_pat_dis.php?msg=New record created successfully");
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

    <title>PAT DIS</title>
</head>

<body style="background: linear-gradient(90deg, #efd5ff 0%, #515ada 100%);">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #88c4f1;">
        PAT DIS
    </nav>

    <div class="container"
        style="border-radius: 48px;background: #88c4f1; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
        <div class="text-center mb-4"><br>
            <h1>PAT DIS</h1>
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
                        <label class="form-label">Treatment Given</label>
                        <input type="text" class="form-control" name="treatment_given" placeholder="Treatment Given">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Treatment Advice</label>
                        <input type="text" class="form-control" name="treatment_advice" placeholder="Treatment Advice">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Payment Made</label>
                        <input type="text" class="form-control" name="payment_made" placeholder="Payment Made">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mode of Payment</label>
                        <input type="text" class="form-control" name="mode_of_payment" placeholder="Mode of Payment">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date of Discharged</label>
                        <input type="date" class="form-control" name="date_of_discharged"
                            placeholder="Date of Discharged">
                    </div>
                </div>

                <div><br>
                    <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
                    <a style="float: right;" href="lists_pat_dis.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div><br>
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
