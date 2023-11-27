<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marionettes";
$connect = new mysqli($servername, $username, $password, $dbname);

$id = $_GET["id"];
$requet = "DELETE FROM `reservations` WHERE id = $id";
$result = mysqli_query($connect, $requet);

if ($result) {
  header("Location: AfficherReservation.php?msg=Reservation deleted successfully");
} else {
  echo "Failed: " . mysqli_error($connect);
}