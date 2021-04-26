<?php
session_start();
require_once('config.php');
$dishname_ids = array();

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["menu1"])) {
        $item_array_id = array_column($_SESSION["menu1"], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["menu1"]);
            $item_array = array(
                'id' => $_GET["id"],
                'dishname' => $_POST["dishname"],
                'price' => $_POST["price"],
                'quantity' => $_POST["quantity"]
            );
            $_SESSION["menu1"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="menu2.php"</script>';
        }
    } else {
        $item_array = array(
            'id' => $_GET["id"],
            'dishname' => $_POST["dishname"],
            'price' => $_POST["price"],
            'quantity' => $_POST["quantity"]
        );
        $_SESSION["menu1"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["menu1"] as $keys => $values) {
            if ($values["id"] == $_GET["id"]) {
                unset($_SESSION["menu1"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="menu2.php"</script>';
            }
        }
    }
}

//pre_r($_SESSION);

function pre_r($item_array)
{
    echo '<pre>';
    print_r($item_array);
    echo '</pre>';
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

    <title>The Burgatory</title>
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
                        <?php echo '<a style="color: white;" href="aboutus.php">About us</a>' ?>
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

        <div class="container my-5" style="background-color:white; position:-webkit-sticky; position:sticky; top:0; z-index:2; height:245px;">
            <div class="row">
                <div class="col-sm-4">
                    <img class="display: d-flex-auto  my-2 img-fluid" data-src="holder.js/350x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 254px; height: 165px; padding-top: 5;" src="https://wallpaperaccess.com/full/2004521.jpg" data-holder-rendered="true">
                </div>

                <div class="col-md-4 my-3" style="align-items: right;">
                    <h2><span style="color: black;">The Burgatory  <img style="height: 20px; width: 20px;" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/nonveg-sign-565376.png" alt=""></span></h2>
                </div>
            </div>
        </div>

        <!--support-->
        <a id="support" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a>


        <!--browse-->
        <a id="browse" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; bottom: 30px; left: 50px; z-index: 1030;" href="browse.php"><i class="bi bi-arrow-left-circle"></i>Browse</a>


        <div class="row mx-5">
            <div class="col-md-7">
                <div class="container" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false">
                    <?php
                    $query = 'SELECT * FROM burgatory ORDER by id ASC';
                    $result = mysqli_query($conn, $query);

                    if ($result) :
                        if (mysqli_num_rows($result) > 0) :
                            while ($dishname = mysqli_fetch_assoc($result)) :
                                //print_r($dishname);
                    ?>
                                <div class="container" style="align-items: center;">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3">
                                            <form method="post" action="menu2.php?action=add&id=<?php echo $dishname['id']; ?>">
                                                <div class="product">
                                                    <img style="height: 250px; width: 250px; border: 5px; border-color: white;" src="<?php echo $dishname['image']; ?>" class="img-responsive my-5" />
                                                    <h4 class="text-info"><?php echo $dishname['dishname']; ?></h4>
                                                    <h4>₹ <?php echo $dishname['price']; ?></h4>
                                                    <input type="number" name="quantity" class="form-control" value="1">
                                                    <input type="hidden" name="dishname" value="<?php echo $dishname['dishname']; ?>" />
                                                    <input type="hidden" name="price" value="<?php echo $dishname['price']; ?>" />
                                                    <input type="submit" name="add_to_cart" class="btn btn-info my-3" value="Add to Cart" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            endwhile;
                        endif;
                    endif;
                    ?>

                    <div style="clear:both;"></div>
                    </br>
                </div>
            </div>
            <div class="col-md-5 my-5">
                <form method="post" action="ordersubmit.php?add">
                    <div class="table-responsive" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false">
                        <table class="table">
                            <tr>
                                <th colspan="5">
                                    <h3 style="color: white;"> Order Details </h3>
                                </th>
                            </tr>
                            <tr>
                                <th width="35%" style="color: white;">Product Name</th>
                                <th width="10%" style="color: white;">Quantity</th>
                                <th width="20%" style="color: white;">Price</th>
                                <th width="15%" style="color: white;">Total</th>
                                <th width="5%" style="color: white;">Action</th>
                            </tr>
                            <?php
                            if (!empty($_SESSION['menu1'])) :
                                $total = 0;
                                foreach ($_SESSION['menu1'] as $key => $dishname) :
                            ?>
                                    <tr>
                                        <td name="ordername" style="color: white;"><?php echo $dishname['dishname']; ?></td>
                                        <td name="quantity" style="color: white;"><?php echo $dishname['quantity']; ?></td>
                                        <td name="price" style="color: white;">₹ <?php echo $dishname['price']; ?></td>
                                        <td name="total" style="color: white;">₹ <?php echo number_format($dishname['quantity'] * $dishname['price'], 2); ?></td>
                                        <td><a href="menu2.php?action=delete&id=<?php echo $dishname['id']; ?>">
                                                <div class="btn-danger">Remove</div>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $total = $total + ($dishname['quantity'] * $dishname['price']);
                                endforeach;
                                ?>
                                <tr>
                                    <td style="color: white;" colspan="3" align="right">Total</td>
                                    <td style="color: white;" align="right">₹ <?php echo number_format($total, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <!-- show checkout button only if the shopping cart is not empty-->
                                    <td colspan="5">
                                        <?php
                                        if (isset($_SESSION['menu1'])) :
                                            if (count($_SESSION['menu1']) > 0) :
                                        ?><input type="submit" action="ordersubmit.php" name="checkout" class="btn btn-info my-3" value="Checkout" />
                                        <?php endif;
                                        endif; ?>
                                    </td>
                                </tr>
                            <?php
                            endif;
                            ?>
                        </table>
                    </div>
                </form>
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