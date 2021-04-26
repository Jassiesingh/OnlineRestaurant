<?php //error_reporting(E_ALL ^ E_NOTICE); 
?>
<?php
require_once "config.php";

$ordername = $phone = $address = "";
$ordername_err = $phone_err = $address_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if userordername is empty
    if (empty(trim($_POST["ordername"]))) {
        $userordername_err = "Userordername cannot be blank";
    } else {
        $sql = "SELECT id FROM orders WHERE orderordername = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_userordername);
            // Set the value of param userordername
            $param_userordername = trim($_POST['ordername']);
            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $userordername_err = "This userordername is already taken";
                } else {
                    $userordername = trim($_POST['ordername']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);

    // Check for phone
    if (empty(trim($_POST['phone']))) {
        $phone_err = "Phone cannot be blank";
    } else {
        $phone = trim($_POST['phone']);
    }

    // Check for address
    if (empty(trim($_POST['address']))) {
        $address_err = "Address cannot be blank";
    } else {
        $address = trim($_POST['address']);
    }


    // If there were no errors, go ahead and insert into the database
    if (empty($ordername_err) && empty($address_err) && empty($phone_err)) {
        $sql = "INSERT INTO orders (ordername, phone, address) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $param_ordername, $param_phone, $param_address);

            // Set these parameters
            $param_userordername = $userordername;
            $param_phone = $phone;
            $param_address = $address;


            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: homepage.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta ordername="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Online Restaurant System</title>
</head>

<body>
    <div style="background-color: #282828;" style="color: white;">

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
                <form class="form-inline my-2 my-lg-2 mx-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search for your favourite restaurants" aria-label="Search">
                    <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
                </form>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>


        <div class="container" style="color: white;">
            <div class="row g-3">
                <!-- <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge bg-secondary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Product ordername</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Third item</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>-->


                <div class="col-md-7 col-lg-8 my-3">
                    <h4 class="mb-3">Confirm your order</h4>
                    <form action="" method="post" class="needs-validation" novalidate="">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="firstordername" class="form-label">ordername</label>
                                <input type="text" class="form-control" name="ordername" id="firstordername" placeholder="" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="lastordername" class="form-label">Phone no</label>
                                <input type="text" class="form-control" ordername="phone" id="lastordername" placeholder="" value="" required="">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" ordername="address" id="address" placeholder="1234 Main St" required="">
                            </div>

                            <hr class="my-4" style="background-color: white;">


                            <button class="btn btn-primary my-4" type="submit">Continue to checkout</button>
                    </form>
                </div>
                <h4 class="mb-3 my-5">Payment</h4>


                <hr class="my-4" style="background-color: white;">

            </div>
        </div>


        <div style="background-color: dimgray;">
            <!-- Footer -->
            <footer class="bd-footer text-muted">
                <div class="container-fluid p-3 p-md-5 my-5" style="color: white;">
                    <p style="float: right;">Designed and built by Jassie
                    </p>
                    <ul class="bd-footer-links">
                        <li><a style="color: ghostwhite;" href="/about.html">About</a></li>
                        <li><a style="color: ghostwhite;" href="/TermsConditions.html">Terms & Conditions </li>
                    </ul>
                    <ul style="float: right;">
                        <li><a style="color: ghostwhite; float: right;" href="https://twitter.com/JassieSingh28">Twitter</a></li>
                        <li><a style="color: ghostwhite;" href="https://www.instagram.com/jassie__singh28/?hl=en" class="href">instagram</a></li>
                    </ul>
                </div>
            </footer>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 2 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 3 crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>