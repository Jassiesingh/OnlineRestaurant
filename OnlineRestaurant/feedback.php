<?php
require "config.php";

$name = $feedback = "";
$name_err = $feedback_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if name is empty
    if (empty(trim($_POST["name"]))) {
        $name_err = "Name cannot be blank";
    } else {
        $name = trim($_POST['name']);
    }


    // Check for feedback
    if (empty(trim($_POST['feedback']))) {
        $feedback_err = "Feedback cannot be blank";
    } else {
        $feedback = trim($_POST['feedback']);
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($name_err) && empty($feedback_err)) {
        $sql = "INSERT INTO feedback (name, feedback) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_feedback);

            // Set these parameters
            $param_name = $name;
            $param_feedback = $feedback;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Your feedback has been submitted")</script>';
                echo '<script>window.location="meme.php"</script>';
            } else {
                echo "Something went wrong... cannot redirect!";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Feedback.</title>
</head>

<body style="background-color: #37718e;">
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mx-2 my-2">
                        <?php echo '<a style="color: white;" href="homepage.php">Home</a>' ?><span class="sr-only">(current)</span>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="aboutus.php">About us</a>' ?>
                    </li>
                    <!--<li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="adminaccess.php">Admin</a>' ?>
                    </li>-->
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="meme.php">Bored?</a>' ?>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <!--support-->
        <a id="support" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a>

        <div class="container">
            <h3 style="color: white;" class="my-5"> Give us some Feedback</h3>
            <div class="row my-5" style="color: white;">
                <div class="col-md-4">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <input type="text" name="name" class="form-control mx-4" id="inputEmail3" placeholder="Name">
                        </div>
                        <div class="row mb-3 my-5">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Feedback/Suggestions</label>
                            <input type="text" name="feedback" class="form-control mx-4" id="inputPassword3" placeholder="Enter here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <a style="color: white; font-size: larger;" href="homepage.php">Go To Homepage</a></div>
            </div>
            <div class="col-md-4">
                <h4 class="my-5"> By the time we deliver your order to you why dont't you enjoy some freshy picked memes made just for you</h4>
                <a style="color: white;" href="meme.php">Click Here</a>
            </div>
        </div>


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
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>