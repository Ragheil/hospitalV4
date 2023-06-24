<?php
include "db_conn.php";
$id = $_GET["patient_no"];
$sql = "DELETE FROM `pat_dis` WHERE patient_no = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: list_pat_dis.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
  echo "SQL Query: " . $sql;
}
