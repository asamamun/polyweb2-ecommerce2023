<?php
// ini__set("display_errors", 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="favicon.png" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <link href="assets/css/tiny-slider.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/mystyle.css">
  <title>Home</title>
</head>

<body class="font-monospace">
  <!-- Start Header/Navigation -->
  <?php $img = "assets/images/cart.svg";
  $style = "assets/css/style.css";
  include "shared/navbar.php"
  ?>
  <?php include "shared/message.php" ?>

  <!-- Start Hero Section -->
  <?php $img = "assets/images/couch.png";
  $title = "Modern Interior Design Studio";
  include "components/Banner.php" ?>
  <!-- End Hero Section -->

  <!-- Start Product Section -->
  <?php include "components/Products.php" ?>
  <!-- End Product Section -->

  <!-- Start Why Choose Us Section -->
  <div class="why-choose-section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-6">
          <h2 class="section-title">Why Choose Us</h2>
          <p>
            Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
            velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
          </p>

          <div class="row my-5">
            <div class="col-6 col-md-6">
              <div class="feature">
                <div class="icon">
                  <img src="assets/images/truck.svg" alt="Image" class="imf-fluid" />
                </div>
                <h3>Fast &amp; Free Shipping</h3>
                <p>
                  Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                  aliquet velit. Aliquam vulputate.
                </p>
              </div>
            </div>

            <div class="col-6 col-md-6">
              <div class="feature">
                <div class="icon">
                  <img src="assets/images/bag.svg" alt="Image" class="imf-fluid" />
                </div>
                <h3>Easy to Shop</h3>
                <p>
                  Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                  aliquet velit. Aliquam vulputate.
                </p>
              </div>
            </div>

            <div class="col-6 col-md-6">
              <div class="feature">
                <div class="icon">
                  <img src="assets/images/support.svg" alt="Image" class="imf-fluid" />
                </div>
                <h3>24/7 Support</h3>
                <p>
                  Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                  aliquet velit. Aliquam vulputate.
                </p>
              </div>
            </div>

            <div class="col-6 col-md-6">
              <div class="feature">
                <div class="icon">
                  <img src="assets/images/return.svg" alt="Image" class="imf-fluid" />
                </div>
                <h3>Hassle Free Returns</h3>
                <p>
                  Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                  aliquet velit. Aliquam vulputate.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="img-wrap">
            <img src="assets/images/why-choose-us-img.jpg" alt="Image" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Why Choose Us Section -->

  <!-- Start Popular Product -->
  <div class="popular-product">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="product-item-sm d-flex">
            <div class="thumbnail">
              <img src="assets/images/product-1.png" alt="Image" class="img-fluid" />
            </div>
            <div class="pt-3">
              <h3>Nordic Chair</h3>
              <p>
                Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                odio
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="product-item-sm d-flex">
            <div class="thumbnail">
              <img src="assets/images/product-2.png" alt="Image" class="img-fluid" />
            </div>
            <div class="pt-3">
              <h3>Kruzo Aero Chair</h3>
              <p>
                Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                odio
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="product-item-sm d-flex">
            <div class="thumbnail">
              <img src="assets/images/product-3.png" alt="Image" class="img-fluid" />
            </div>
            <div class="pt-3">
              <h3>Ergonomic Chair</h3>
              <p>
                Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                odio
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Start Testimonial Slider -->
  <?php $img = "assets/images/person-1.png";
  include "components/Testimonial.php"  ?>

  <!-- Start Footer Section -->
  <?php $img = "assets/images/sofa.png";
  include  "shared/footer.php";
  ?>


