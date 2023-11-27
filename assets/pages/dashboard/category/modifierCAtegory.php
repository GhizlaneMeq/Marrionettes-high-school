<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "marionettes";

   $connect = new mysqli($servername, $username, $password, $dbname);


   $id = $_GET['id'];
   
   $query = "SELECT * FROM `categories` WHERE id = $id";
   $result = mysqli_query($connect , $query);
   $row = mysqli_fetch_assoc($result);

   if(isset($_POST['submit'])){

      $name = $_POST['name'];
      $query = "UPDATE `categories` SET `nom`='$name' WHERE id = $id";
      $result = mysqli_query($connect , $query);

      if(isset($result)){
         header("location:ajouterCategory.php?msg=category updated successfully");
      }
      else{
         echo("error");
      }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update CAtegory</title>
    
</head>
<body>
  <?php
      if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
  ?>
    <h2>Update CAtegory</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['nom']?>" required>
        <br>
        <input type="submit" name="submit" value="update">
    </form>

    
  </div>
</body>
</html>



