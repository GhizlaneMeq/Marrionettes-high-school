<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marionettes";

$connect = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $query = "INSERT INTO `categories`(`nom`) 
      VALUES ('$name')";
  $result = mysqli_query($connect, $query);

  if (isset($result)) {
    header("location:ajouterCategory.php?msg=category added successfully");
  } else {
    echo ("error");
  }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Category</title>

  <style>
    body {
      background-color: #8e44ad;
      /* Purple background color */
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      /* Set your desired width */
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #8e44ad;
      /* Purple text color */
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #8e44ad;
      /* Purple button background color */
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #6c3483;
      /* Darker purple for hover effect */
    }

    h2 {
      color: #fff;
      /* White text color */
      text-align: center;
    }

    /* form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        } */
  </style>


</head>

<body>
  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  ?>
  <h2>Create Category</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br>
    <input type="submit" name="submit" value="Create">
  </form>

  <div class="content col-9 mt-5">
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr data-aos="fade-left" data-aos-duration="1500">
          <th scope="col" data-aos="fade-left">id</th>
          <th scope="col" data-aos="fade-left">Name</th>
          <th scope="col" data-aos="fade-left">Action</th>
        </tr>
      </thead>
      <tbody data-aos="fade-right" data-aos-duration="1500">
        <?php
        $query = "SELECT * FROM `categories`";
        $result = mysqli_query($connect, $query);
        while ($rows = mysqli_fetch_assoc($result)) :
        ?>
          <tr>
            <th><?php echo $rows['id'] ?></th>
            <th><?php echo $rows['nom'] ?></th>
            <td><a href="modifierCAtegory.php?id=<?= $rows['id'] ?>" class="link-dark">modifier</a> <a href="deleteCategory.php?id=<?= $rows['id'] ?>" class="link-danger" onclick="return confirm('Are you sure you want to delete this book?');">delete</a></td>
          </tr>
        <?php
        endwhile;
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>