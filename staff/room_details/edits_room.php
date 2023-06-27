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

    <?php
    include "db_conn.php";
    $id = $_GET["room_no"];
    $sql = "SELECT * FROM `room_details` WHERE room_no = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
    // Update the variables with the new values submitted through the form
    $room_no = $_POST['room_no'];
    $room_type = $_POST['room_type'];
    $status = $_POST['status'];
  

    $sql = "UPDATE `room_details` 
    SET `room_no`='$room_no', `room_type`='$room_type',
    `status`='$status' WHERE room_no = '$id'";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: all_rooms.php?msg=Data updated successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
        echo "SQL Query: " . $sql;
    }
    }
    ?>

    <!-- Rest of your HTML code -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title> ROOM EDIT</title>
    </head>

    <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    ROOM EDIT
    </nav>

    <div class="container" style="border-radius: 48px; background: #88c4f1; box-shadow: 5px 5px 10px #4c5650,-5px -5px 10px #0079db; width: 900px;">
        <div class="text-center mb-4"><br>
        <h1> ROOM EDIT</h1>
        <p class="text-muted"> Complete the form </p>
        </div>

        <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label" for="room_no" >Room No</label>
                <input type="text" class="form-control" name="room_no" placeholder="Patient Number" value="<?php echo $row['room_no']; ?>" disabled>
            </div>


            <div class="col-md-4">
                <label class="form-label">Room Type</label>
                <input type="text" class="form-control" name="room_type" placeholder="Date of Check Up" value="<?php echo $row['room_type']; ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" name="status" placeholder="Diagnosis" value="<?php echo $row['status']; ?>">
            </div><br>
            <div><br>
            <button style="float: right;" type="submit" class="btn btn-success" name="submit">Save</button>
          <a style="float: right;" href="all_rooms.php" class="btn btn-danger">Cancel</a>
          </div>
        </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </body>

    </html>
