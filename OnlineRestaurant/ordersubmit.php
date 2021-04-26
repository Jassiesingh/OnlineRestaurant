<?php
session_start();
//session_destroy();

$host = "localhost:3306";;
$dbusername = "root";
$dbpassword = "";

$db = mysqli_connect($host, $dbusername, $dbpassword) or die("Could not connect to the database");


if (isset($_SESSION["menu1"])) {

    $orders = $quantity = $price =  $total = "";

    if ($db) {
        echo "";
    } else {
        echo "no connection";
    }

    mysqli_select_db($db, 'restaurant');
    foreach ($_SESSION['menu1'] as $keys => $value) {
        extract($value);
        $total = $price*$quantity;
        $user = $_SESSION['username'];
        $query = "INSERT INTO orders(username, ordername, quantity, price, total) values ('$user','$dishname',$quantity, $price, $total)";
        $db->query($query);
        // if ($db->query($query)) {
        //     echo "Request sent successfully";
        //     // header("location: homepage.php");
        // } else {
        //     echo "Error: " . $query . " " . $db->error;
        // }
    }

    unset($_SESSION["menu1"]);
    echo '<script>alert("Your order has been confirmed")</script>';
    echo '<script>window.location="feedback.php"</script>';


    // if (isset($_POST['ordername'])) {
    //     $ordername = $_POST['ordername'][0];
    // }
    // if (isset($_POST['quantity'])) {
    //     $quantity = $_POST['quantity'];
    // }
    // if (isset($_POST['price'])) {
    //     $price = $_POST['price'];
    // }
    // if (isset($_POST['total'])) {
    //     $total = $_POST['total'];
    // }
    //$quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    //$price = mysqli_real_escape_string($db, $_POST['price']);
    //$total = mysqli_real_escape_string($db, $_POST['total']);
    // $query = "INSERT INTO orders(ordername, quantity, price, total) values ('$ordername','$quantity', '$price', '$total')";
    // print_r($_SESSION);

    // if ($db->query($query)) {
    //     echo "Request sent successfully";
    //     header("location: homepage.php");
    // } else {
    //     echo "Error: " . $query . " " . $db->error;
    // }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--aos-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Jassie Da Dhaba</title>
    <style></style>
</head>

<body style="background-color: #282828; margin: 0; padding: 0; box-sizing: border-box; color: white;">
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="homepage.php">Home</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="meme.php">Bored?</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="adminaccess.php">Admin</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="meme.php">Bored?</a>' ?>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>' ?>
                </li>
            </div>
        </nav>

        <!--support-->
        <a id="support" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a>


        <!--browse-->
        <a id="browse" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; bottom: 30px; left: 50px; z-index: 1030;" href="browse.php"><i class="bi bi-arrow-left-circle"></i>Browse</a>


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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 2 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 3 crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>