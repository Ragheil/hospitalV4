<?php
include "db_conn.php";
$id = $_GET['room_no'];
$sql = "DELETE FROM `room_details` WHERE `room_no` = $id ";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: all_room.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
  echo "SQL Query: " . $sql;
}
