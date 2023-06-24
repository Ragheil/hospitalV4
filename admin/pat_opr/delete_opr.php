
<?php
include "db_conn.php";

if (isset($_GET["patient_no"])) {
  $id = $_GET["patient_no"];
  $sql = "DELETE FROM `pat_opr` WHERE `patient_no` = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: pat_opr_list.php?msg=Data deleted successfully");
    exit;
  } else {
    echo "Failed: " . mysqli_error($conn);
    exit;
  }
} else {
  echo "Error: 'patient_no' is not defined.";
  exit;
}
