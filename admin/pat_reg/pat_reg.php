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

  <title> PATIENT pat</title>
</head>

<body style="background: #70e1f5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #70e1f5
;">
    <h1>LISTS OF REGULAR PATIENTS</h1>
  </nav>


<!-- -->

 

<!-- -->

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
    <a href="insert.php" class="btn btn-dark mb-3">Add New</a>
    <a href="http://localhost:3000/admin/patient_entry/pat_main_page.php" class="btn btn-dark mb-3">Return</a>

    <table class="table table-hover text-center" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Patient No</th>
          <th scope="col">Date of Visit</th>
          <th scope="col">Diagnosis</th>
          <th scope="col">Treatment</th>
          <th scope="col">Medicine Recommended</th>
          <th scope="col">Status of Treatment</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `pat_reg`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["patient_no"] ?></td>
            <td><?php echo $row["date_of_visit"] ?></td>
            <td><?php echo $row["diagnosis"] ?></td>
            <td><?php echo $row["treatment"] ?></td>
            <td><?php echo $row["medicine_recommended"] ?></td>
            <td><?php echo $row["status_of_treatment"] ?></td>
            
            <td>
              <a href="edit.php?patient_no=<?php echo $row['patient_no']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
              <a href="delete.php?patient_no=<?php echo $row['patient_no']; ?>" class="btn btn-danger" onclick="confirmation(event)" class="link-dark"><i class="fa-solid fa-trash fs-7"></i></a>
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
