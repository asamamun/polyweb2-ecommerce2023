<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Auth as Authe;
use App\Url as Url;
$user = Authe::User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= $style ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php $myStyle ?>">
    <title><?= $title ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">

            <a class="navbar-brand" href="<?= Url::link('index.php'); ?>">Shop Zenith<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= Url::link('index.php'); ?>">Home</a>
                    </li>
                    <li><a class="nav-link" href="<?= Url::link('pages/Products/AllProducts.php'); ?>">Shop</a></li>


                    <li><a class="nav-link" href="<?= Url::link('pages/Blog.php'); ?>">Blog</a></li>
                    <?php
                    if ($user) {
                        echo $user["role"] == 2 ?
                            '<li><a class="nav-link" href=' . Url::link('dashboard') . '>Dashboard</a></li>' : "";
                    }
                    ?>
                    <li><a class="nav-link" href="<?= Url::link('pages/contact.php'); ?>">Contact us</a></li>
                    <?php
                    if ($user) {
                    ?>
                        <li><a class="nav-link" href="<?= Url::link('Account/Logout.php'); ?>">Log Out</a></li>
                    <?php } else {
                    ?>

                        <li><a class="nav-link" href="<?= Url::link('Account/Login.php'); ?>">Login /</a></li>
                        <li><a class="nav-link" style="margin-left: -30px;" href="<?= Url::link('Account/SignUp.php'); ?>"> Register</a></li>
                    <?php
                    }
                    ?>
                    <li>
                        <a class="nav-link" href="<?= Url::link('pages/Cart.php'); ?>"><img src=<?= $img; ?> /></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>