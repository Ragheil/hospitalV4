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
 
 // Rest of your PHP code goes here...
 include("db_conn.php");
include "db_conn.php";

if (isset($_POST["submit"])) {

   $department_name  = $_POST['department_name'];
   $doctor_id = $_POST['doctor_id'];
   $doctor_name = $_POST['doctor_name'];
   $qualification = $_POST['qualification'];
   $address = $_POST['address'];
   $phone_no = $_POST['phone_no'];
   $salary = $_POST['salary'];
   $date_joined = $_POST['date_joined'];
   

   

   $sql = "INSERT INTO `all_doctors`(`department_name`, `doctor_id`, `doctor_name`, `qualification`, `address`, `phone_no`, `salary`, `date_joined`)
   VALUES ('$department_name','$doctor_id','$doctor_name','$qualification','$address','$phone_no','$salary','$date_joined')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: view_doc.php?msg=New record created successfully");
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
     ADD DOCTOR ADMIN SIDE
   </nav>

   <div class="container"style="border-radius: 48px;background: #88c4f1; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
      <div class="text-center mb-4"><br>
         <h1>Add Doctor plss</h1>
         <p class="text-muted"> Complete the form </p>
      </div>

      <div class="container d-flex justify-content-center" >
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

             <!--  DEPARTMENT NAMES  ---->

             <div class="col-md-3">
                  <?php
                      include "db_conn.php";
                      $sql = "SELECT department_name FROM department ";
                      $result = mysqli_query($conn,$sql);?>

                      <label class="form-label" for="department_name"> Department Name </label>
                      <select class="form-select"  name="department_name" id="department_name">
                      <?php while ($rows = mysqli_fetch_array($result)) { ?>

                      <option value="<?php echo $rows ['department_name']; ?>" > <?php echo $rows ['department_name'];  ?> </option>
                      <?php 
                     }   
                     ?>
                  </select>
                </div>



               <div class="col-md-2">
                  <label for="id" class="form-label">Identity</label>
                  <select id="myDropdown" class="form-select" name="id">
                     <option>choose</option>
                     <option>DR-</option>
                     <option>DC-</option>
                  </select>
               </div>   

               <div class="col-md-3">
                  <label class="form-label">Doctor ID</label>
                  <input type="text" class="form-control" id="myTextbox" name="doctor_id" placeholder="Doctor ID" maxlength="10">
               </div>

            
            <div class="col-md-4 ">
                  <label class="form-label">Doctor Name</label>
                  <input type="text" class="form-control" name="doctor_name" placeholder="Doctor Name">
               </div>

               <div class="row mb-3">
               <div  class="col-md-4">
                  <label class="form-label">Qualification</label>
                  <input type="text" class="form-control" name="qualification" placeholder="Qualification" >

               </div>
               <div  class="col-md-8">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Address" >
               </div>
             </div>

             <div class="row md-3">
               <div  class="col-md-4">
                  <label class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" maxlength="11" >

               </div>
               <div  class="col-md-4">
                  <label class="form-label">Salary</label>
                  <input type="text" class="form-control" name="salary" placeholder="Salary" maxlength="6">
               </div>

               <div  class="col-md-4">
                  <label class="form-label">Date Joined</label>
                  <input type="date" class="form-control" name="date_joined" placeholder="Date Joined" >
               </div>


             </div>

<!--  REFER DOCTOR  ---->



                
            <div><br>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="view_doc.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>