<?php
include("koneksi.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($connection, "DELETE FROM tamu WHERE id=$id");
 
header("Location:tamu.php");
?>
