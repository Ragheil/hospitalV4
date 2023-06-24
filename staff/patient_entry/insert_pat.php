<?php
include "db_conn.php";

if (isset($_POST["submit"])) {

   $patient_no = $_POST['patient_no'];
   $patient_name = $_POST['patient_name'];
   $age = $_POST['age'];
   $sex = $_POST['sex'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $phone_number = $_POST['phone_number'];
   $entry_date = $_POST['entry_date'];
   $refer_doctor = $_POST['refer_doctor'];
   $diagnosis = $_POST['diagnosis'];
   $department_name = $_POST['department_name'];

   

   $sql = "INSERT INTO `pat_entry`(`patient_no`, `patient_name`, `age`, `sex`, `address`, `city`, `phone_number`, `entry_date`, `refer_doctor`, `diagnosis`, `department_name`)
   VALUES ('$patient_no','$patient_name','$age','$sex','$address','$city','$phone_number','$entry_date','$refer_doctor','$diagnosis','$department_name')";

   $result = mysqli_query($conn, $sql);   

   if ($result) {
      header("Location: patient_list.php?msg=New record created successfully");
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

   <title>PHP CRUD Application</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #6695B6;">
      TAYTOL
   </nav>

   <div class="container"style="border-radius: 48px;background: #bdd6c8; box-shadow:  5px 5px 10px #4c5650,-5px -5px 10px #44de02; width: 900px;">
      <div class="text-center mb-4"><br>
         <h1>Add Patient Entry</h1>
         <p class="text-muted">Please Complete the form</p>
      </div>

      <div class="container d-flex justify-content-center" >
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

             <div class="col">
                  <label class="form-label">Patient No</label>
                  <input type="text" class="form-control" name="patient_no" placeholder="Enter Patient No" maxlength="5">
               </div>

               <div class="col">
                  <label class="form-label">Patient Name</label>
                  <input type="text" class="form-control" name="patient_name" placeholder="Enter Fullname">
               </div>

               <div  class="col-md-2">
                  <label class="form-label">Age</label>
                  <input type="text" class="form-control" name="age" placeholder="Age" maxlength="3">
               </div>



               <div class="col-md-2">
                  <label for="sex" class="form-label">Sex</label>
                  <select id="sex" class="form-select" name="sex">
                     <option selected>Choose</option>
                     <option>M</option>
                     <option>F</option>
                  </select>
               </div>
             </div>


            <div class="row mb-3">
            <div class="col-md-9">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Street Number">
               </div>

               <div  class="col-md-3">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" name="city" placeholder="City" >

               </div>

               </div>

            <div class="row mb-3">
             <div class="col-md-5">
                  <label class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" placeholder="Phone No" maxlength="11">
               </div>

               <div  class="col-md-3">
                  <label class="form-label">Entry Date</label>
                  <input type="date" class="form-control" name="entry_date">
               </div>
<!--  REFER DOCTOR  ---->

               <div class="col-md-4">
                  <?php
                      include "db_conn.php";
                      $sql = "SELECT doctor_id,doctor_name FROM all_doctors ";
                      $result = mysqli_query($conn,$sql);
                  ?>
                      <label class="form-label" for="refer_doctor">  Refer Doctor </label>
                      <select class="form-select"  name="refer_doctor" id="refer_doctor">
                      <?php while ($rows = mysqli_fetch_array($result)) { ?>

                      <option value="<?php echo $rows ['doctor_id']; ?>" > <?php echo $rows ['doctor_name'];  ?> • <?php echo $rows ['doctor_id'];  ?></option>
                      <?php 
                     }   
                     ?>
                  </select>
                </div>

            <div class="row mb-3">
             <div class="col-md-6">
                  <label class="form-label">Diagnosis</label>
                  <input type="text" class="form-control" name="diagnosis" placeholder="Diagnosis" >
               </div>

               
<!--  DEPARTMENT NAMES  ---->

               <div class="col-md-6">
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


                
            <div><br>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="patient_list.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>