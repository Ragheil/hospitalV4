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

<body  style="background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,1S74,202,1) 0%, rgba(148,187,233,1) 100%);"><br>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #0094FF;">
   PATIENT MAIN PAGE
  </nav>
<a href="http://localhost:5173/admindashboard" class="btn btn-primary">VIEW</a></a>
<center>
    
<div class="row row-cols-1 row-cols-md-4 g-4">
  <div class="col">
    <div class="card h-100" >
      <img src="pat_entry.png.jpg"pat class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">PATIENT LIST ONLY</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card-footer">
      <a href="http://localhost:3000/admin/patient_entry/patient_list.php" class="btn btn-primary">Patient List</a>
      </div>
    </div>
  </div>    
  <div class="col">
    <div class="card h-100">
      <img src="pat_entry.png.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">List of All Admitted Patients</h5>
        <p class="card-text">Show the List of All Admitted Patients</p>
      </div>
      <div class="card-footer">
      <a href="http://localhost/hospital4/admin/pat_admit/list_pat_admit.php" class="btn btn-primary">VIEW</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="pat_entry.png.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
      <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="pat_entry.png.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
      <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

</div>

  </center>
</body> 

</html>