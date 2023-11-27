<?php
include '../connect.php';
$id = $_GET["id"];
$requet = "DELETE FROM `etudiants` WHERE id = $id";
$result = mysqli_query($connect, $requet);

if ($result) {
  header("Location: AfficherEtudiant.php?msg=Student deleted successfully");
} else {
  echo "Failed: " . mysqli_error($connect);
}