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
  <title>PHP ADMIN Add Doctor</title>
</head>


<body  style="background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);">
  <nav class="navigation">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>
  </nav>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
   LIST OF ALL DOCTORS
  </nav>


<div>

<div><center>



<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">LIST OF ALL DOCTORS</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div><hr>
  <div class="offcanvas-body">
    
    <p>BACK TO HOME PAGE</p>
    <a href="http://localhost/hospital4/admin/doctor/main_doc_page.php" class="btn btn-dark mb-3">BACK</a>
    <p>VIEW ALL REGULAR DOCTORSE</p>
    <a href="http://localhost:3000/admin/doctor/view_doc_reg.php" class="btn btn-dark mb-3"> REGULAR DOCTORS</a>
    <p>VIEW ALL DOC ON CALL DOCTORS</p>
    <a href="http://localhost/hospital4/admin/doctor/view_all_dc_doc.php" class="btn btn-dark mb-3">  DOC ON CALL DOCTORS</a>
  </div>
  
</div>
</div>
</center>
</div>



  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="insert_doc.php" class="btn btn-dark mb-3">Add New</a>
    <a href="http://localhost:3000/admin/doctor/view_doc_reg.php" class="btn btn-dark mb-3">Regular Doctors</a>
    <a href="http://localhost/hospital4/admin/doctor/view_all_dc_doc.php" class="btn btn-dark mb-3">Call-On Doctors</a>
    

    <table class="table table-hover text-center" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Department Name</th>
          <th scope="col">Doctor ID</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Qualification</th>
          <th scope="col">Address</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Salary</th>
          <th scope="col">Date Joined</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `all_doctors`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["department_name"] ?></td>
            <td><?php echo $row["doctor_id"] ?></td>
            <td><?php echo $row["doctor_name"] ?></td>
            <td><?php echo $row["qualification"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo $row["phone_no"] ?></td>
            <td><?php echo $row["salary"] ?></td>
            <td><?php echo $row["date_joined"] ?></td>
            <td>
                
            <a href="edit_doc.php?doctor_id=<?php echo $row["doctor_id"] ?>" class="link-dark mb-3"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
              <a href="delete_doc.php?doctor_id=<?php echo $row["doctor_id"] ?>" class="btn btn-danger mb-2" onclick="confirmation(event)" class="link-dark"><i class="fa-solid fa-trash fs-7"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

<script type="text/javascript">
  function confirmation(ev){
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
      title:"Are you sure to DELETE this Record?",
      text: "You wont be able to revert this delete",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })

    .then((willCancel)=>{
      if(willCancel){
        window.location.href=urlToRedirect;
      }
    });
  }

</script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>