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

  <title> Patient Entry ADMIN</title>
</head>

<body style="background: #FFEFBA;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #FFEFBA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #ffffff;">
    <h1>List of All Patients</h1>
  </nav>


<!-- -->
<div>

<div><center>


<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">  
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">THIS IS LIIIST OF ALL PATIENTS</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div><hr>
  <div class="offcanvas-body">
    
    <p>BACK TO HOME PAGE</p>
    <a href="http://localhost:3000/staff/patient_entry/pats_main_page.php" class="btn btn-dark mb-3">BACK</a>
    <p>ADD ADMIT PATIENT</p>
    <a href="http://localhost:3000/staff/pat_admit/lists_pat_admit.php" class="btn btn-dark mb-3"> VIEW ADMITTED PATIENT</a>
    <p>VIEW ALL PATIENT CHECK UP</p>
    <a href="http://localhost:3000/staff/pat_checkUp/pats_chk.php" class="btn btn-dark mb-3"> PATIENT CHECK UP</a>
    <p>VIEW DISCHARGED PATIENT</p>
    <a href="http://localhost:3000/staff/pat_dis/lists_pat_dis.php" class="btn btn-dark mb-3"> DISCHARGED PATIENT</a>
    <p>VIEW ALL DOC ON CALL DOCTORS</p>
    <a href="http://localhost:3000/staff/pat_admit/lists_pat_admit.php" class="btn btn-dark mb-3"> ADDMITTED PATIENT</a>
  </div>
  
</div>
</div>
</center>
</div>

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
    <a href="inserts_pat.php" class="btn btn-dark mb-3">Add New</a>
    <a href="http://localhost:3000/staff/patient_entry/pats_main_page.php" class="btn btn-dark mb-3">Return</a>
    <div class="input-group mb-2">
    <input type="text" id="searchInput" class="form-control" placeholder="Search by Patient Name" onkeyup="searchTable()">
  </div>



  <?php
$sql = "SELECT * FROM `pat_entry`";
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  // Add the search condition to the SQL query
  $sql .= " WHERE UPPER(patient_no) LIKE UPPER('%$search%') OR UPPER(patient_name) LIKE UPPER('%$search%')";
}
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  // Remaining code...
}
?>


    <table class="table table-hover text-center" >
      <thead class="table-dark">
        <tr>
          <th scope="col">Patient No</th>
          <th scope="col">Pateint Name</th>
          <th scope="col">Age</th>
          <th scope="col">Sex</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Entry Date</th>
          <th scope="col">Refer Doctor</th>
          <th scope="col">Diagnosis</th>
          <th scope="col">Department Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `pat_entry`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["patient_no"] ?></td>
            <td><?php echo $row["patient_name"] ?></td>
            <td><?php echo $row["age"] ?></td>
            <td><?php echo $row["sex"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo $row["city"] ?></td>
            <td><?php echo $row["phone_number"] ?></td>
            <td><?php echo $row["entry_date"] ?></td>
            <td><?php echo $row["refer_doctor"] ?></td>
            <td><?php echo $row["diagnosis"] ?></td>
            <td><?php echo $row["department_name"] ?></td>
            <td>
              <a href="edits_pat.php?patient_no=<?php echo $row["patient_no"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
<!-- SEARCH -->
<script type="text/javascript">
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementsByTagName("table")[0];
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) { // Start from index 1 to exclude the table header row
    td = tr[i].getElementsByTagName("td")[1]; // Assuming Doctor ID is in the second column (index 1)
    td2 = tr[i].getElementsByTagName("td")[2]; // Assuming Doctor Name is in the third column (index 2)
    if (td || td2) {
      txtValue = td.textContent || td.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

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