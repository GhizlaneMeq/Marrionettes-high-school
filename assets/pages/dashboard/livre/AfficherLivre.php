<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marionettes";
$connect = new mysqli($servername, $username, $password, $dbname);


$query = "SELECT * FROM `livres`";
$result = mysqli_query($connect, $query);
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
        <div class="row tab">
            <div class="col-xl-6 col-md-6 mb-5" data-aos="fade-right" data-aos-duration="1500">
            <a href="AjouterLivre.php" class="btn btn-success mb-3" data-aos="fade-down" data-aos-duration="1500">add book</a>
            <a href="../category/ajouterCategory.php" class="btn btn-success mb-3" data-aos="fade-down" data-aos-duration="1500">add Category</a>

                <div class="card border-left-primary shadow h-100 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>auteur</th>
                                        <th>description</th>
                                        <th>resume</th>
                                        <th>resume</th>
                                        <th>category</th>
                                        <th>nombre de page</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($result)) :
                                    ?>
                                        <tr>
                                            <th><?php echo $rows['name'] ?></th>
                                            <th><?php echo $rows['auteur'] ?></th>
                                            <td><?php echo $rows['description'] ?></td>
                                            <td><?php echo $rows['resume'] ?></td>
                                            <td><?php echo $rows['nbrPage'] ?></td>
                                            <td><img src="<?php echo $rows['image'] ?>?>" style="max-width:100px;" class=""></td>
                                            <td>
                                                <a href="ModifierLivre.php?id=<?= $rows['id'] ?>" class="link-dark"><i class='bx bxs-pencil fs-5 me-3'></i></a>
                                                <a href="SupprimerLivre.php?id=<?= $rows['id'] ?>" class="link-danger" onclick="return confirm('Are you sure you want to delete this book?');"><i class='bx bxs-user-x fs-5'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>



<script>
    AOS.init();
</script>

</html>