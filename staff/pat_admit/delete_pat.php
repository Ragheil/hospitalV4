<?php
include "db_conn.php";
$id = $_GET["patient_no"];
$sql = "DELETE FROM `pat_admit` WHERE patient_no = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: http://localhost/hospital4/admin/pat_admit/list_pat_admit.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
  echo "SQL Query: " . $sql;
}
