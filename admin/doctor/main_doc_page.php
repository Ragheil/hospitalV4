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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>PHP ADMIN Add Doctor</title>
</head>

<body  style="background: #36D1DC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #5B86E5, #36D1DC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #5B86E5, #36D1DC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #5B86E5;">
   <h1>DOCTORS MAIN PAGE</h1> 
  </nav>
<br>
<br>
<br>
<br>

<div class="container d-flex justify-content-center" >
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
    <img src="/DASHBORAD.png" style="max-width: 50vh;" class="card-img-top" alt="DASHBORAD">
      <div class="card-body">
        <h2 class="card-title"><p>Go to Main Dashboard</p> </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:5173/admindashboard" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <br>
    <center><img src="/docr.png" style="max-width: 15vh; "  class="card-img-top; " alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">View All&emsp;&emsp; Regular Doctor</h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost/hospital4/admin/doctor/view_doc_reg.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>&emsp;&emsp;
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card"><br>
    <center> <img src="/docon.png" style="max-width: 17vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">View All &emsp;&emsp;Doctor on Call  </h2>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost/hospital4/admin/doctor/view_all_dc_doc.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card"><br>
    <center> <img src="/alldoc.png" style="max-width: 24vh;" class="card-img-top" alt="DASHBORAD"></center>
      <div class="card-body">
        <h2 class="card-title">List of All Doctors</h2><br>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://localhost:3000/admin/doctor/view_doc.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>
</div>







  



&emsp;&emsp;&emsp;
</body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>