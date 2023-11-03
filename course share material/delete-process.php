<?php
include_once 'connection.php';
$sql = "DELETE FROM pdf_data WHERE name='" . $_GET["name"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: admin.php");
?>


