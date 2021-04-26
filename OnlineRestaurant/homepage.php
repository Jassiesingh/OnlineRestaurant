<?php

session_start();



if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
}

?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'restaurant');


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
    <link rel="stylesheet" href="css/homepage.css">

    <title>Online Restaurant System</title>


</head>

<body style="background-color: #282828;">
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
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="meme.php">Bored?</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <h5 style="color: white;"><?php echo "Welcome " . $_SESSION['username'] ?>!</h5>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <!--carousel-->
        <div class="carousel slide" data-aos="fade-down" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" data-ride="carousel" id="carouselExampleIndicators">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
                <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
                <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img alt="First slide" class="d-block w-100" src="https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="carousel-caption d-none d-md-block">
                        <div>
                            <h5>Party night??</h5>
                        </div>
                        <p>Don't worry we got you.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Second slide" class="d-block w-100" src="https://images.pexels.com/photos/1437267/pexels-photo-1437267.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Cooking gone wrong?</h5>
                        <p>Order food anytime.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Third slide" class="d-block w-100" src="https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Always fresh</h5>
                        <p>Just like you are.</p>
                    </div>
                </div>
            </div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>

        <!--support-->
        <a id="support" data-aos="fade-right" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a>

        <!-- Cards -->
        <div class="container px-lg-5">
            <div class="row mx-lg-5">
                <div class="col py-3 px-lg-n5">
                    <div class="card" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="width: 18rem;">
                        <img src="images/23.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Browse for your favourite restaurants anywhere.</h5>
                            <p class="card-text">Browse your favourite restaurants</p>
                            <a href="Browse.php" class="btn btn-primary">Browse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="parallex">
            <div class="row featurette d-flex justify-content-center align-items-center my-5 mx-3" style="color: white;">
                <div data-aos="fade-up" data-aos-delay="50" class="col-md-7">
                    <h2 class="featurette-heading">Worried about breakfast, lunch or dinner??
                    </h2>
                    <p class="lead">Fast and safe food right at your doorstep. Our skilled delviery experts will always
                        make sure that you will be getting food without making any contact with you.</p>
                </div>
                <div class="col-md-5">
                    <img src="" alt="" class="src">
                </div>
            </div>

            <hr data-aos="fade-up" data-aos-delay="35" class="featurette-divider" style="background-color: #fff">

            <div class="row featurette d-flex justify-content-center align-items-center my-5 mx-3" style="color: white;">
                <div data-aos="fade-up" data-aos-delay="75" class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Quality food. <span class="text-muted">See for yourself.</span>
                    </h2>
                    <p class="lead">We will always make sure you get the most out of everything. So we have a wide range
                        of restaurants that you can browse and order food from</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="" alt="" class="src">
                </div>
            </div>
        </div>

        <section class="section section_gallery">
            <div class="container my-5">
                <div class="row">
                    <div class="col my-5">

                        <!-- Heading -->
                        <h2 style="color: white;" class="section__heading text-center">
                            Our gallery
                        </h2>

                        <!-- Subheading -->
                        <p class="section__subheading text-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>

                    </div>
                </div> <!-- / .row -->
                <div class="row section_gallery__grid" style="position: sticky; height: 1000.312px;">
                    <div data-aos="fade-right" data-aos-delay="25" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 0px; top: 0px;">

                        <a href="assets/img/11.jpg" data-lightbox="gallery">
                            <img src="https://images.pexels.com/photos/3026804/pexels-photo-3026804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-down" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 375.988px; top: 0px;">

                        <a href="assets/img/16.jpg" data-lightbox="gallery">
                            <img src="https://images.pexels.com/photos/674574/pexels-photo-674574.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-left" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 750.976px; top: 0px;">

                        <a href="assets/img/13.jpg" data-lightbox="gallery">
                            <img src="https://images.pexels.com/photos/2067396/pexels-photo-2067396.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-right" data-aos-delay="50" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 0px; top: 285.288px;">

                        <a href="assets/img/15.jpg" data-lightbox="gallery">
                            <img src="https://media.istockphoto.com/photos/indian-mumbai-food-pav-bhaji-from-vegetables-with-bread-closeup-in-a-picture-id1057139364?k=6&m=1057139364&s=612x612&w=0&h=cURO4zsO81h-q53qVn3UYsxsEviPqIg-1Kqje-eq8uU=" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-left" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 750.976px; top: 550.988px;">

                        <a href="assets/img/14.jpg" data-lightbox="gallery">
                            <img src="https://c.ndtvimg.com/2020-01/ecdpth78_matar-paneer_625x300_21_January_20.jpg" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-up" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 375px; top: 550.1px;">

                        <a href="assets/img/18.jpg" data-lightbox="gallery">
                            <img src="https://simpleqode.bitbucket.io/touche/assets/img/30.jpg" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <div data-aos="fade-in" class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 375.976px; top: 250.726px;">

                        <a href="assets/img/17.jpg" data-lightbox="gallery">
                            <img src="https://images.pexels.com/photos/2347311/pexels-photo-2347311.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="img-fluid" alt="...">
                        </a>

                    </div>
                    <!--<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item" style="position: absolute; left: 239.988px; top: 352.475px;">

                        <a href="assets/img/12.jpg" data-lightbox="gallery">
                            <img src="assets/img/12.jpg" class="img-fluid" alt="...">
                        </a>

                    </div>-->
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>



        <div style="background-color: dimgray;">
            <!-- Footer -->
            <footer class="bd-footer text-muted">
                <div class="container-fluid p-3 p-md-5 my-5">
                    <ul class="bd-footer-links">
                        <li><i class="bi bi-twitter"></i><a style="color: white;" href="https://twitter.com/JassieSingh28">Twitter</a></li>
                        <li><a style="color: white;" href="https://www.instagram.com/jassie__singh28/?hl=en">Instagram</a></li>
                        <li><a style="color: white;" href="aboutus.php">About</a></li>
                        <li><a style="color: white;" href="TermsConditions.php">Terms & Conditions </li>
                        <p>Designed and built by Jassie
                        </p>
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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>