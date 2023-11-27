<?php
include '../connect.php';

$id = $_GET['id'];
$query = "SELECT * FROM `categories` WHERE id = $id";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $query = "UPDATE `categories` SET `nom`='$name' WHERE id = $id";
   $result = mysqli_query($connect, $query);

   if (isset($result)) {
      header("location:ajouterCategory.php?msg=category updated successfully");
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
   <title>Update Category</title>
   <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
      .form-container {
         background-color: #B8C4FE;
         max-width: 500px;
         margin-left: 20%;
         padding: 30px 50px;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .form-container label {
         color: #007bff;
      }

      .form-container button {
         background-color: #007bff;
         color: #ffffff;
      }
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
   <div class="aside">
      <div class="navigation">
         <ul>
            <li>
               <a href="#" class="logo">marionette<p>high school</p></a>
               <div class="rows">
                  <img src="images/add.png">
                  <h1>Add new task</h1>
               </div>
            </li>
            <li class="active">
               <a href="" class="active">
                  <span class="title"><i class='bx bxs-home-circle'></i>Dashboard</span>
               </a>
            </li>

            <li>
               <a href="students.php">
                  <span class="title"><i class='bx bxs-user'></i>Students</span>
               </a>
            </li>

            <li>
               <a href="teachers.php">
                  <span class="title"><i class='bx bxs-user'></i>Teachers</span>
               </a>
            </li>

            <li>
               <a href="booking.php">
                  <span class="title"><i class='bx bxs-bookmark-alt'></i>Booking</span>
               </a>
            </li>

            <li>
               <a href="vistors.php">
                  <span class="title"><i class='bx bxs-low-vision'></i>Visitors</span>
               </a>
            </li>

            <li>
               <a href="settings.php">
                  <span class="title"><i class='bx bxs-cog'></i>Settings</span>
               </a>
            </li>
            <div>
               <a href="login.html" class="logout">Logout</a>
            </div>
         </ul>

      </div>
   </div>
   <div class="header">
      <div class='bx bxs-chevron-left' id="remove"></div>
      <div class="tit">
         <h1>Dashboard</h1>
      </div>
      <div class="search">
         <input type="text" placeholder="Search">
         <div class="icons">
            <img src="images/bell.png" alt="" srcset="">
         </div>
         <div class="admin">
            <img src="images/me.jpg" alt="" srcset="">
            <div class="name">
               <h1>CHABAB Nabil <span>admin</span></h1>
            </div>
         </div>
      </div>
   </div>

   <div class="head d-flex justify-content-between">
      <h1>Overview</h1>
      <div class="dropdown date">
         <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Last Week</button>
         <ul class="dropdown-menu rounded-4">
            <li><button class="dropdown-item" type="button">Last Day</button></li>
            <li><button class="dropdown-item" type="button">Last Month</button></li>
            <li><button class="dropdown-item" type="button">Last Year</button></li>
         </ul>
      </div>
   </div>
   <div class="content">
      <div class="form-container">
         <h2 class="text-center text-white">Update CAtegory</h2>
         <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" class="form-control" id="name" name="name" required value="<?php echo $row['nom'] ?>">
            </div>

            <br>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Category</button>
         </form>


         </form>
      </div>

   </div>



   <script src="js/main.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>



<script>
   AOS.init();
</script>

</html>