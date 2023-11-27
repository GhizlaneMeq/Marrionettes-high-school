<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marionettes";
$connect = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$query = "SELECT * FROM `livres` WHERE id = $id";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$Default_category_query = "SELECT categories.nom,categories.id FROM livres JOIN categories ON livres.category_id = categories.id WHERE livres.id = $id";
$Default_category_result = mysqli_query($connect, $Default_category_query);
$rowss = mysqli_fetch_assoc($Default_category_result);



$Categories_query = "SELECT * FROM `categories`";
$Categories_result = mysqli_query($connect, $Categories_query);
$rows = mysqli_fetch_assoc($Categories_result);

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $auteur = $_POST['auteur'];
    $description = $_POST['description'];
    $resume = $_POST['resumer'];
    $nbrPage = $_POST['nbrPage'];
    $category_id = $_POST['category_id'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $folder = "img/" . $image;

    $query = "UPDATE `livres` SET `name`='$name',`auteur`='$auteur',`description`='$description',`resume`='$resume',`nbrPage`='$nbrPage',`image`='$folder',`category_id`='$category_id' WHERE id=$id";
    $result = mysqli_query($connect, $query);

    if (isset($result)) {
        header("location:AfficherLivre.php?msg=user updated successfully");
    } else {
        echo ("error");
    }
}


/* if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $auteur = $_POST['auteur'];
    $description = $_POST['description'];
    $resume = $_POST['resumer'];
    $nbrPage = $_POST['nbrPage'];
    $category_id = $_POST['category_id'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $folder = "img/".$image;
    $query = "";
      $result = mysqli_query($connect , $query);

    if (isset($result)) {
        move_uploaded_file($temp_name, $folder);
        header("location:AfficherLivre.php?msg=book added successfully");

        
    } else {
        echo ("error");
    }
} */


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <h2 class="text-center text-white">Book Information</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $row['name'] ?>" >
                </div>
                <div class="form-group">
                    <label for="auteur">Author:</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" required value="<?php echo $row['auteur'] ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="resume">Summary:</label>
                    <textarea class="form-control" id="resume" name="resume" rows="3" required><?php echo $row['resume'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="nombre_page">Number of Pages:</label>
                    <input type="number" class="form-control" id="nombre_page" name="nombre_page" required value="<?php echo $row['nbrPage'] ?>">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category_id" required>
                        <option value="<?php echo $rowss['id'] ?>" selected><?php echo $rowss['nom'] ?></option>

                        <?php
                        while ($rows = mysqli_fetch_assoc($Categories_result)) :
                        ?>
                            <option value="<?php echo $rows['id'] ?>"><?php echo $rows['nom'] ?></option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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