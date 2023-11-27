<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marionettes";

$connect = new mysqli($servername, $username, $password, $dbname);

$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];


$default_livre_query = "SELECT livres.name, reservations.livre_id
FROM reservations
JOIN livres ON livres.id = reservations.livre_id
WHERE reservations.id = $id";
$default_livre_result = mysqli_query($connect, $default_livre_query);
$default_livre_row = mysqli_fetch_assoc($default_livre_result);

$livres_query = "SELECT * FROM `livres`";
$livres_result = mysqli_query($connect, $livres_query);

$default_student_query = "SELECT etudiants.nom, reservations.etudiant_id
FROM reservations
JOIN etudiants ON etudiants.id = reservations.etudiant_id
WHERE reservations.id = $id";
$default_student_result = mysqli_query($connect, $default_student_query);
$default_student_row = mysqli_fetch_assoc($default_student_result);

$livres_query = "SELECT * FROM `livres`";
$livres_result = mysqli_query($connect, $livres_query);

$students_query = "SELECT * FROM `etudiants`";
$students_result = mysqli_query($connect, $students_query);

$date_query = "SELECT * FROM `reservations` WHERE id=$id";
$date_result = mysqli_query($connect, $date_query);
$date_reservation_row = mysqli_fetch_assoc($date_result);



if (isset($_POST['submit'])) {
    $livre_id = $_POST['livre_id'];
    $student_id = $_POST['student_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


    $query = "UPDATE `reservations` SET `date_debut`='$start_date',`date_fin`='$end_date',`etudiant_id`='$student_id',`livre_id`='$livre_id' WHERE id=$id";

    $result = mysqli_query($connect, $query);

    if (isset($result)) {
        move_uploaded_file($temp_name, $folder);
        header("location:AfficherReservation.php?msg=Reservation Updated successfully");
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
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
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
    <div class="form-container">
        <h2 class="text-center text-white">Student Information</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="livre">Book</label>
                <select class="form-control" id="livre" name="livre_id" required>
                    <option value="<?php echo $default_livre_row['livre_id'] ?>" selected><?php echo $default_livre_row['name'] ?></option>
                    <?php
                    while ($livres_row = mysqli_fetch_assoc($livres_result)) :
                    ?>
                        <option value="<?php echo $livres_row['id'] ?>"><?php echo $livres_row['name'] ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="student">Student</label>
                <select class="form-control" id="student" name="student_id" required>
                    <option value="<?php echo $default_student_row['etudiant_id'] ?>" selected><?php echo $default_student_row['nom'] ?></option>
                    <?php
                    while ($student_row = mysqli_fetch_assoc($students_result)) :
                    ?>
                        <option value="<?php echo $student_row['id'] ?>"><?php echo $student_row['nom'] ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="start_date" class="form-label">From:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required value="<?php echo $date_reservation_row['date_debut'] ?>">

            </div>
            <div class="form-group">
                <label for="end_date" class="form-label">To:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required value="<?php echo $date_reservation_row['date_fin'] ?>">
            </div>


            <br>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Update Reservation</button>
        </form>
    </div>



    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>



<script>
    AOS.init();
</script>

</html>