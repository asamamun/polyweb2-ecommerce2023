<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Auth as Authe;
use App\Url as Url;

$user = Authe::User();
$title = "Cart.";
$style = Url::link()."assets/css/style.css";
$img = Url::link()."assets/images/cart.svg";
include "../shared/navbar.php";
?>
<section class="h-100 font-monospace" style="background-color: #eee;">
    <div class="container-md h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10" id="cardContainer">
<!-- card start -->

<!-- card end -->



            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4">
                    total : <span id="grandTotal"></span>
                </div>
            </div>
            <div class="card mb-4">
                    <div class="card-body p-4 d-flex flex-row">
                        <div class="form-outline flex-fill">
                            <input type="text" id="form1" class="form-control form-control-lg" />
                            <label class="form-label" for="form1">Discound code</label>
                        </div>
                        <div class="">
                            <button type="button" class=" ms-4 btn btn-warning btn-block btn-lg">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="mb-5 card">
                        <div class="card-body">
                            <a href="checkout.php" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php $img = "../assets/images/sofa.png";
include  "../shared/footer.php";
?>