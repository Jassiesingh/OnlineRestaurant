<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: homepage.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password FROM register WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: homepage.php");
                    }
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Online Restaurant System</title>
    <style>
        .cover {
            background-image: url("https://i.pinimg.com/originals/3e/b9/b9/3eb9b9b4c46c868b340aca63f43e646e.jpg");
            height: 600px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        #browse_image {
            height: 100vh;
            min-height: 800px;
            background-image: url('https://simpleqode.bitbucket.io/touche/assets/img/19.jpg');
            padding: 6rem 0;
            position: relative;
            display: block;
            box-sizing: border-box;
            background-position: center;
            background-repeat: no-repeat;

        }
    </style>

</head>

<body style="background-color: #282828;">

    <div style="color: white;" class="cover">
        <h3 class=" mx-5">Please Login Here:</h3>
        <hr>
        <form action="" method="post">
            <div class="container-fluid my-5">
                <div class="row mx-5 my-5">
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-5">Submit</button><br>
                <a style="color: white;" class=" mx-5" href="register.php">New?? Register first</a>
            </div>
        </form>
    </div>

    <div class="container" style="color: white;">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="text-center">No Minimum Order</div>
                <div class="text-center my-5">Order for yourself or for the group, with no restrictions on order quantity or value</div>
            </div>
            <!--<div class="col-md-4">
                <div class="_3fted">Live Order Tracking</div>
                <div class="_12i5X">Know where your order is at all times, from the restaurant to your doorstep</div>
            </div>-->
            <div class="col-md-6">
                <div class="text-center">Lightning Fast Delivery</div>
                <div class="text-center my-5">Experience our lightning fast delivery for food delivered fresh &amp; on time</div>
            </div>
        </div>
    </div>

    <div id="browse_image" class="my-5" style="color: white;">
        <section class="section section_about">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Description -->
                        <p style="font-size: xx-large; color: black;" class="section_about__description">
                            Browse hotels anywhere, anytime with just few clicks
                        </p>
                        <a href="browse.php" class="btn btn-info">Browse</a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    </div>

    <div style="background-color: dimgray;">
        <!-- Footer -->
        <footer class="bd-footer text-muted">
            <div class="container-fluid p-3 p-md-5 my-5">
                <ul class="bd-footer-links">
                    <li><a style="color: white;" href="https://twitter.com/JassieSingh28">Twitter</a></li>
                    <li><a style="color: white;" href="https://www.instagram.com/jassie__singh28/?hl=en">Instagram</a></li>
                    <li><a style="color: white;" href="aboutus.php">About</a></li>
                    <li><a style="color: white;" href="TermsConditions.php">Terms & Conditions </li>
                </ul>
                <p>Designed and built by Jassie
                </p>
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>