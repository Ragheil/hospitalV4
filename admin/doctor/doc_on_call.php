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
$id = $_GET["doctor_id"];

if (isset($_POST["submit"])) {
   // Code for updating the record
} else {
   // Fetch the data from the database
   $sql = "SELECT * FROM all_doctors WHERE doctor_id = '$id'";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      $row = mysqli_fetch_assoc($result);
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}
?>

<!-- Rest of your HTML code -->


<?php
if (isset($_POST["submit"])) {

    
   $doctor_id = $_POST['doctor_id'];
   $doctor_name = $_POST['doctor_name'];
   $qualification = $_POST['qualification'];
   $address = $_POST['address'];
   $phone_no = $_POST['phone_no'];
   $salary = $_POST['salary'];
   $date_joined = $_POST['date_joined'];
   

   

   $sql = "UPDATE `all_doctors` SET `salary`='$salary' WHERE doctor_id = '$id'";


 
   $result = mysqli_query($conn, $sql);
 
   if ($result) {
     header("Location: view_all_dc_doc.php?msg=Data updated successfully");
   } else {
     echo "Failed: " . mysqli_error($conn);
     echo "SQL Query: " . $sql;
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <title>Insert doctor admin side</title>

<script>
$(document).ready(function() {
  // Add event listener to the dropdown
  $("#myDropdown").change(function() {
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
     VIEW REGULAR DOCTOR
   </nav>

   <div class="container"style="border-radius: 48px;background: #88c4f1; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
      <div class="text-center mb-4"><br>
         <h1>EDIT REGULAR DOCTOR</h1>
         <p class="text-muted"> Complete the form </p>
      </div>

      <div class="container d-flex justify-content-center" >
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

             <!--  DEPARTMENT NAMES  ---->

             

               <div class="col-md-3">
                  <label class="form-label">Doctor Name</label>
                  <input type="text" class="form-control" id="myTextbox" name="doctor_id" placeholder="Doctor ID" value="<?php echo $row['doctor_id'] ?>"  disabled>
               </div>
               <div class="col-md-3">
                  <label class="form-label">Doctor ID</label>
                  <input type="text" class="form-control" id="myTextbox" name="doctor_id" placeholder="Doctor ID" value="<?php echo $row['doctor_name'] ?>"  disabled>
               </div>


               <div  class="col-md-4">
                  <label class="form-label">Salary</label>
                  <input type="text" class="form-control" name="salary" placeholder="Salary" value="<?php echo $row['salary'] ?>" >
               </div>



             </div>

<!--  REFER DOCTOR  ---->



                
            <div><br>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="http://localhost:3000/admin/doctor/view_all_dc_doc.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>