<?php
include 'database_connect.php';
if (empty($_SESSION['first_name'])) {
    header('location:login.php');
}
$count = 1;
$x = $_SESSION['first_name'];
$y = $_SESSION['last_name'];
$sql = "SELECT * from krytons_content where first_name = '$x' AND last_name = '$y' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .div_table1 {
            width: 1000px !important;
        }

        .but {
            border: 2px solid white !important;
        }

        .con {
            margin-top: 116px !important;
            margin-right: 439px !important;
        }

        .h3_class {
            height: 44px !important;
        }

        .krytons_logo {
            margin-left: 20px;
        }

        .blog_image {
            width: 8%;
        }

        table.fixed {
            table-layout: fixed;
            width: 150%;
        }

        table.fixed .blog_data {
            overflow-x: scroll;
        }
    </style>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <div class="krytons_logo">
                        <h3 class="text-primary"><img class="h3_class" src="images/Krytons3.png" alt=""></h3>
                    </div>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></h6>
                        <!-- <span>Admin</span> -->
                    </div>
                </div>


                <div class="navbar-nav w-100">
                    <a href="create_content.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Create Content</a>

                </div>
                <div class="navbar-nav w-100">
                    <a href="view_table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>View Table</a>

                </div>

            </nav>
        </div>

    </div>
    <!-- Sidebar End -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0 nav1">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="myprofile.php" class="dropdown-item">My Profile</a>
                    <!-- <a href="#" class="dropdown-item">Settings</a> -->
                    <a href="logout.php" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </nav>
        <!-- table start -->
        <div class="container con">
            <div class="table-responsive">
                <table class="table table-bordered fixed text-center">
                    <h6 class="mb-4">Driver table</h6>
                    <thead>
                        <tr>
                            <th scope="col">Serial no.</th>
                            <th scope="col">name</th>
                            <th scope="col">topic name</th>
                            <th scope="col">content</th>
                            <th scope="col">image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($num > 0) {
                            while ($a = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo $a['first_name'] . " " . $a['last_name'] ?></td>
                                    <td><?php echo $a['topic_name'] ?></td>
                                    <td class="blog_data"><?php echo $a['write'] ?></td>
                                    <td><a href="<?php echo $a['images'] ?>" target="_blank"><img src="<?php echo $a['images'] ?>" alt="" class="blog_image"></a></td>
                                    <td><a href="create_content_copy.php?id=<?php echo $a['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                        </svg></a>&nbsp; &nbsp; &nbsp;&nbsp;<a href="view_delete.php?id=<?php echo $a['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" onclick="return checkdelete()"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                            </svg></a>

                                           <script>
                                            function checkdelete()
                                            {
                                                return confirm("are you sure you want to delete?");
                                            }
                                           </script>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            }
                        } else {
                            ?>
                            <h3>no data yet.</h3>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- table end -->
        <!-- Navbar End -->





        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>



        <!-- <button class="but" type="submit" name="edit1"> -->
        <!-- </button> -->
    </div>

</body>

</html>