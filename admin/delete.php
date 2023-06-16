<?php
include "db_conn.php";
$id = $_GET["patient_no"];
$sql = "DELETE FROM `pat_entry` WHERE patient_no = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
