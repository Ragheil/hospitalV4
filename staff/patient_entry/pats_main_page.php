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
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PATEINT MAIN PAGE</title>
</head>
<body  style="background-image: url(/patdash.png);background-size: cover;">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #3d72b4; color: white;">
 <h1> PATIENT MAIN PAGE (STAFF SIDE)</h1>
</nav>
  
  <br>
 
    
<div class="container d-flex justify-content-center" >
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
    <img src="/DASHBORAD.png" style="max-width: 50vh;" class="card-img-top" alt="DASHBORAD">
      <div class="card-body">
        <h2 class="card-title"><p>Go to Main Dashboard</p> </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:5173/staffdashboard" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <br>
    <center><img src="/plist.png" style="max-width: 17vh; "  class="card-img-top; " alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">View All&emsp;&emsp; Patient List</h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/patient_entry/patients_list.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>&emsp;&emsp;
<div class="row">
<div class="col-sm-6">
    <div class="card"><br>
    <center> <img src="/pat_check.png" style="max-width: 29vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">Patient Check Up  </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/pat_checkUp/pats_chk.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card"><br>
    <center> <img src="/patreg.png" style="max-width: 29vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">Regular Patients</h2><br>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/pat_reg/pats_reg.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>  
</div>
</div>
<br>
<br>




<div class="container d-flex justify-content-center" >
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card"><br>
    <center> <img src="/patopr.png" style="max-width: 20vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title"><p>Patient is Operated</p> </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/pat_opr/pats_opr_list.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <br>
    <center><img src="/patadmt.png" style="max-width: 300px; "  class="card-img-top; " alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">Admitted Patients</h2> <br>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/pat_admit/lists_pat_admit.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>&emsp;&emsp;
<div class="row">
<div class="col-sm-6">
    <div class="card"><br>
    <center> <img src="/patdis.png" style="max-width: 22vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">Discharged Patient  </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/staff/pat_dis/lists_pat_dis.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card"><br>
    <center> <img src="/soon.png" style="max-width: 39vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">Soon</h2><br>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="/happy-cat.gif" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>  
</div>
</div>
<br>
<br>

</body> 
<br>
</html>