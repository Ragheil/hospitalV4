<?php
include "db_conn.php";

if (isset($_GET["patient_no"])) {
  $id = $_GET["patient_no"];
  $sql = "DELETE FROM `pat_chkup` WHERE `patient_no` = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: pat_chk.php?msg=Data deleted successfully");
    exit();
  } else {
    echo "Failed: " . mysqli_error($conn);
    echo "SQL Query: " . $sql;
  }
} else {
  echo "Invalid request: patient_no is missing in the URL parameters.";
}
?>
