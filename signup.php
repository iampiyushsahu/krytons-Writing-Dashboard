<?php
include 'database_connect.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['name1'];
    $last_name = $_POST['name2'];
    $email = $_POST['email1'];
    $password = $_POST['pass1'];
    $confirmpassword = $_POST['pass2'];



    $sql = "SELECT * from krytons_signup_info where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $a = mysqli_fetch_assoc($result);
    if ($a !== null && $a['email'] == $email) {
?>
        <script>
            alert('dont enter same email again')
        </script>
        <?php
    } else {

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirmpassword)) {
        ?>
            <script>
                alert('something not enter')
            </script>
        <?php
        } elseif (preg_match("/[0123456789!@#$%^&*()_+.<,>? ]/", $first_name)) {
        ?>
            <script>
                alert('enter a correct word in name')
            </script>
        <?php
        } elseif (preg_match("/[0123456789!@#$%^&*()_+.<,>? ]/", $last_name)) {
        ?>
            <script>
                alert('enter a correct word in name')
            </script>
        <?php
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        ?>
            <script>
                alert('please enter valid email')
            </script>
        <?php
        } elseif (strlen($password) <= 7) {
        ?>
            <script>
                alert('Password limit more then 8 words')
            </script>
        <?php
        } elseif ($password == $confirmpassword) {
            $a = " INSERT INTO krytons_signup_info ( first_name, last_name ,email, password) VALUES ( '$first_name', '$last_name', '$email', '$password')";
            $result = mysqli_query($conn, $a);

            if ($result) {
                header("location: login.php");
            } else {
                echo "Error";
            }
        } else {
        ?>
            <script>
                alert('your both password is mismatch')
            </script>
<?php
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #F0F8FF !important;
        }

        .h3_class {
            height: 44px !important;
        }

        .div_0 {
            background-color: #D7EDFF !important;
        }

        .h3 {
            padding-top: 21px;
            margin-right: 54px;
        }

        .h3 h3 {
            font-family: fangsong;
            color: #336891;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid div_0">
            <div class="row h-100 align-items-center justify-content-center div1" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 div_2">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 div_3">
                        <form action="" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary" class="fa fa-hashtag me-2"><img class="h3_class" src="images/Krytons3.png" alt=""></h3>
                                </a>
                                <div class="h3">
                                    <h3>Sign up</h3>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" name="name1" placeholder="name@example.com">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" name="name2" placeholder="name@example.com">
                                <label for="floatingInput">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email1" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="pass1" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="pass2" placeholder="Password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div> -->
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="sign1">Sign In</button>
                            <p class="text-center mb-0">have an Account? <a href="login.php">log in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>