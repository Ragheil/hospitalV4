<?php
include "db_conn.php";
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

  <title>  PATIENT DISCHARGED </title>
</head>

<body style="background-color: #67d1fe;">
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #0094FF;">
  PATIENT DISCHARGED
  </nav>
  <div><center>

<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Special Action</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">THIS IS LIIIST OF ALL PATIENTS</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div><hr>
  <div class="offcanvas-body">
    
    <p>BACK TO HOME PAGE</p>
    <a href="http://localhost:3000/admin/patient_entry/pat_main_page.php" class="btn btn-dark mb-3">BACK</a>
    <p>ADD ADMIT PATIENT</p>
    <a href="http://localhost:3000/admin/pat_admit/list_pat_admit.php" class="btn btn-dark mb-3"> VIEW ADMITTED PATIENT</a>
    <p>VIEW ALL PATIENT CHECK UP</p>
    <a href="http://localhost:3000/admin/pat_checkUp/pat_chk.php" class="btn btn-dark mb-3"> PATIENT CHECK UP</a>
    <p>VIEW DISCHARGED PATIENT</p>
    <a href="http://localhost:3000/admin/pat_dis/list_pat_dis.php" class="btn btn-dark mb-3"> DISCHARGED PATIENT</a>
    <p>VIEW ALL PAT OPR</p>
    <a href="http://localhost:3000/admin/pat_admit/list_pat_admit.php" class="btn btn-dark mb-3"> PAT OPR</a>
    <p>VIEW ALL PAT REG</p>
    <a href="http://localhost:3000/admin/pat_reg/pat_reg.php" class="btn btn-dark mb-3"> PAT REG</a>
  

</div>
  
</div>
</div>
</center>

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
    <a href="pat_dis.php" class="btn btn-dark mb-3">Add New</a>
    <a href="http://localhost:3000/admin/patient_entry/patient_list.php" class="btn btn-dark mb-3">BACK</a>

    <table class="table table-hover text-center" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Patient No</th>
          <th scope="col">Treatment Given</th>
          <th scope="col">Treatment Advice</th>
          <th scope="col">Payment Made</th>
          <th scope="col">Mode of Payment</th>
          <th scope="col">Date of Discharged</th>
          
          
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `pat_dis` ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["patient_no"] ?></td>
            <td><?php echo $row["treatment_given"] ?></td>
            <td><?php echo $row["treatment_advice"] ?></td>
            <td><?php echo $row["payment_made"] ?></td>
            <td><?php echo $row["mode_of_payment"] ?></td>
            <td><?php echo $row["date_of_discharged"] ?></td>
            
            <td>
              <a href="edit.php?patient_no=<?php echo $row["patient_no"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
              <a href="delete.php?patient_no=<?php echo $row["patient_no"] ?>" class="btn btn-danger" onclick="confirmation(event)" class="link-dark"><i class="fa-solid fa-trash fs-7"></i></a>
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