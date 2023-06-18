<?php
include "db_conn.php";
$id = $_GET["doctor_id"];
$sql = "DELETE FROM `all_doctors` WHERE `doctor_id` = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: view_doc.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
  echo "SQL Query: " . $sql;
}
?>
