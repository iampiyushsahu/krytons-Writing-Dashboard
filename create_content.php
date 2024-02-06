<?php
include 'database_connect.php';
if (empty($_SESSION['first_name'])) {
    header('location:login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['book1'])) {
        $first_name = $_POST['name1'];
        $last_name = $_POST['name2'];
        $topic_name = $_POST['topic_name1'];
        $write = $_POST['write1'];
        $upload_documentname = $_FILES['file1']['name'];
        $upload_documentsize = $_FILES['file1']['size'];
        $upload_documenttmp = $_FILES['file1']['tmp_name'];
        $upload_documenttype = $_FILES['file1']['type'];
        $upload_documenttype1 = strtolower(pathinfo($upload_documentname, PATHINFO_EXTENSION));
        $allow_type = array('png', 'jpg', 'jpeg');
        $date = date("Y-m-d");



?>
        <?php
        if (empty($topic_name) || empty($write) || empty($upload_documentname)) {
        ?>
            <script>
                alert("something not entered")
            </script>

        <?php
        } elseif ($upload_documentsize > 1048576) {
        ?>
            <script>
                alert('limit 600')
            </script>
        <?php
        } elseif (!in_array($upload_documenttype1, $allow_type)) {
        ?>
            <script>
                alert('file not match')
            </script>
            <?php
        } else {
            $b = mt_rand(10, 100);
            move_uploaded_file($upload_documenttmp, "documents/" . $b . $upload_documentname);

            $z = "http://localhost/krytons/documents/" . $b . $upload_documentname;
            $a = "INSERT INTO krytons_content(`first_name`, `topic_name`, `write`, `last_name`,`images`,`date`) VALUES ('$first_name', '$topic_name', '$write','$last_name','$z','$date')";
            $result = mysqli_query($conn, $a);
            if ($result) {
            ?>
                <script>
                    alert("Done!");
                </script>
<?php
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #D7EDFF !important;
        }

        .side_bar {
            background-color: #D7EDFF !important;
        }

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

        .nav1{
            background-color: #D7EDFF !important;
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

    <!-- ck editor for text area -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 side_bar">
            <nav class="navbar navbar-light side_bar">
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
                    <a href="view_table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>View Table</a>

                </div>
            </nav>
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
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </nav>
            <div class="container con">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <!-- <label for="formGroupExampleInput" class="form-label form_label">NAME</label> -->
                        <input type="hidden" class="form-control" name="name1" id="formGroupExampleInput" placeholder="Enter name" value="<?php echo $_SESSION['first_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="formGroupExampleInput" class="form-label form_label">NAME</label> -->
                        <input type="hidden" class="form-control" name="name2" id="formGroupExampleInput" placeholder="Enter name" value="<?php echo $_SESSION['last_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label form_label">Topic Name</label>
                        <input type="text" class="form-control" name="topic_name1" id="formGroupExampleInput2" placeholder="Write Topic Name Here">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label form_label">Write Topic</label>
                        <textarea id="editor" class="form-control" rows="50" cols="50" name="write1"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label form_label">Upload Picture</label>
                        <input type="file" class="form-control" name="file1" id="formGroupExampleInput2" placeholder="Picture">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="b1" name="book1">Submit</button>
                    </div>
                </form>
            </div>


            <!-- Navbar End -->
        </div>
    </div>


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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- <button class="but" type="submit" name="edit1"> -->
    <!-- </button> -->


</body>

</html>