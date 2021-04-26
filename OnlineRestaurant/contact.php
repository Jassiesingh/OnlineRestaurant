<?php //error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
require "config.php";

$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if name is empty
    if (empty(trim($_POST["name"]))) {
        $name_err = "Name cannot be blank";
    } else {
        $name = trim($_POST['name']);
    }

    // Check for email
    if (empty(trim($_POST['email']))) {
        $email_err = "Email cannot be blank";
    } else {
        $email = trim($_POST['email']);
    }

    // Check for message
    if (empty(trim($_POST['message']))) {
        $message_err = "message cannot be blank";
    } else {
        $message = trim($_POST['message']);
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_message);

            // Set these parameters
            $param_name = $name;
            $param_email = $email;
            $param_message = $message;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Your feedback has been submitted")</script>';
                echo '<script>window.location="homepage.php"</script>';
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

    <title>Contact us.</title>
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


        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4>Contact us</h4>
                    <div class="container mt-4" style="color: #fff;">
                        <h3>Need Help?? Contact us by filling the form below</h3>
                        <hr style="background-color: white;">
                        <form action="" method="post">
                            <!--Name-->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Name">
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-row my-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Email</label>
                                        <input type="email" class="form-control" name="email" id="inputPassword" placeholder="Your Email id">
                                    </div>
                                </div>
                            </div>


                            <!--Reason-->
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlTextarea1" class="form-label">Reason for reaching out</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary my-4">Submit</button>
                        </form>
                    </div>
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