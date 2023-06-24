<?php

// Connect to database
// $erver - localhost
// Username - root
// Password - empty
// Database name = xmldata
$conn = mysqli_connect ("localhost", "root", "", "xyz");

$affectedRow = 0;

// Load xml file else check connection
$xml = simplexml_load_file ("departments.xml")
    or die ("Error: Cannot create object");

// Assign values
foreach ($xml->children () as $row) {
    $Department_Name= $row->Department_Name;
    $department_location = $row->department_location;
    $Facilities = $row->Facilities;

// $OL query to insert data into xml table
$sql = "INSERT INTO departments (Department_Name, department_location,
    Facilities) VALUES ('" 
    . $Department_Name . "' , '" . $department_location .  "' , '" . $Facilities .  "')";


$result = mysqli_query ($conn, $sql);

if (! empty ($result)) {
    $affectedRow ++;
} else {
    $error_message = mysqli_error ($conn) . "\n";
}
}
?>

<center><h2>INSERT XML TO MYSQL USING PHP</h2></center>
<center><h1>XML Data storing in Database</h1></center>

<?php
if ($affectedRow > 0) {
$message = $affectedRow. " records inserted";
} else {
$message = "No records inserted";
}

?>
<style>
    body {
        max-width: 550px;
        font-family: Arial;
}
.affected-row {
    background: #cae4ca;
    padding: 10px;
    margin-bottom: 20px;
    border: #dab2b2 1px solid;
    border-radius: 2px;
    color: #5d5b5b;
}

.error-message {
    background: #eac0c0;
    padding: 10px;
    margin-bottom: 20px;
    border: #dab2b2 1px solid;
    border-radius: 2px;
    color: #5d5b5b;
}

</style>

<div class="affected-row">
    <?php echo $message; ?>

</div

<?php if (! empty ($error_message)) { ?>

<div class="error-message">
    <?php echo ($error_message) ; ?>
</div>
<?php } ?>