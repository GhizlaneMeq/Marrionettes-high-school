<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "marionettes";

   $connect = new mysqli($servername, $username, $password, $dbname);


   $id = $_GET['id'];

 

      $query = "DELETE FROM `categories` WHERE `id` = $id";
      $result = mysqli_query($connect , $query);

      if(isset($result)){
         header("location:ajouterCategory.php?msg=category Deleted successfully");
      }
      else{
         echo("error");
      }
   

?>