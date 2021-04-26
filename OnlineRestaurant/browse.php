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

    <title>Browse Restaurants....</title>
</head>

<body>
    <div style="background-color: #282828;">
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
                </ul>
                
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <!--support-->
        <a id="support" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a>

        <h3 style=" color: whitesmoke;" class="px-5 py-5 mx-5">Restaurants for you</h3>
        <div class="container my-5">
            <div class="row">
                <div data-aos="fade-up" data-aos-delay="50" class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-right flex-auto d-none d-md-block img-fluid" data-src="holder.js/350x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 350px; height: 250px;" src="https://previews.123rf.com/images/indianfoodimages/indianfoodimages1805/indianfoodimages180500184/102976407-chole-bhature-or-chick-pea-curry-and-fried-puri-served-in-terracotta-crockery-over-white-background-.jpg">
                        <div class="card-body">
                            <h3 class="mb-0">
                                <a class="text-dark">Jassie Da Dhaba</a>
                            </h3>
                            <img style="height: 20px; width: 20px;" src="https://www.pngkey.com/png/detail/261-2619381_chitr-veg-symbol-svg-veg-and-non-veg.png" alt="">
                            <p class="card-text mb-auto my-3">Speciality:- Punjabi Food, Fast Food</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="menu1.php" class="btn btn-primary my-3">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-right flex-auto d-none d-md-block img-fluid" data-src="holder.js/350x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 350px; height: 250px;" src="https://wallpapercave.com/wp/wp1987065.jpg" data-holder-rendered="true">
                        <div class="card-body">
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">THE BURGATORY</a>
                            </h3>
                            <img style="height: 20px; width: 20px;" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/nonveg-sign-565376.png" alt="">
                            <p class="card-text mb-auto my-3">Speciality:- Burgers, Fries, Nachos, Wraps</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="menu2.php" class="btn btn-primary my-3">View</a>
                                </div>
                            </div>
                        </div>
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
                        <li><a style="color: white;" href="/about.html">About</a></li>
                        <li><a style="color: white;" href="/TermsConditions.html">Terms & Conditions </li>
                    </ul>
                    <p>Designed and built by Jassie
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- rating.js file -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>