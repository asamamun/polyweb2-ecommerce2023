<?php
// echo __DIR__;

require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
use App\Auth as Auth;

$user = Auth::User();
$conn = DB::connect();
$query = "select id,name from categories where 1";
$result = $conn->query($query);
// echo $result->num_rows;
$pq = "SELECT
p.*,
GROUP_CONCAT(i.name) AS images
FROM
products p
LEFT JOIN
images i ON p.id = i.product_id
GROUP BY
p.id, p.name, p.details";
$pqr = $conn->query($pq);
$conn->close();

use App\Url;
?>

<?php $title = "All Products";
$style = "../../assets/css/style.css";
$img = "../../assets/images/cart.svg";
include "../../shared/navbar.php" ?>

<style>
    .products-area {
        width: 90%;
        margin: auto;
    }

    .products {
        width: 98%;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .products-card {
        width: 300px;
        background-color: #fff;
        margin: auto;
        height: 520px;
        position: relative;
        border-radius: 20px;
        margin-bottom: 20px;
    }

    .products-card img {
        width: 275px;
        height: 300px !important;
        margin-left: 10px;
    }



    .cart-btn {
        position: absolute;
        bottom: 0;
        width: 300px;
    }

    /* CSS for the zoom effect */
    .image-container {
        overflow: hidden;
    }

    .image-zoom {
        transition: transform 0.3s ease-in-out;
    }

    .stock {
        position: absolute;
        top: -20px;
        right: 0;
        font-size: 16px;
        background-color: #3b5d50;
        padding: 15px 30px;
        color: white;
        border-radius: 100px;
    }

    .stock-out {
        position: absolute;
        top: -20px;
        right: 0;
        font-size: 16px;
        background-color: #fb7b4c;
        padding: 15px 30px;
        color: white;
        border-radius: 100px;
    }
</style>
<div class="product-section font-monospace">
    <div class="w-50 mx-auto" style="margin-top: -60px; margin-bottom: 80px">
        <input type="search" placeholder="Search Your Products .." aria-describedby="button-addon1" class="form-control border-0 bg-light">
    </div>
    <div class="products-area mt-5">
        <div class="row">
            <!-- Start Column 1 -->
            <div class="col-3">
                <div class="">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header text-white fs-5" style="background-color: #3b5d50;">Categories</div>
                                <div class="list-group list-group-flush">
                                    <?php
                                    if ($result->num_rows) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <a href="index.php?category=<?= $row['id'] ?>" class="list-group-item list-group-item-action"><?= $row['name'] ?></a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="products">
                    <?php
                    if ($pqr->num_rows) {
                        while ($row = $pqr->fetch_assoc()) {
                            $images = explode(",", $row['images']);
                    ?>
                            <div class="products-card">
                                <div class="image-container">
                                    <img class="image-zoom" alt="Product-img" src="../../assets/products/<?= strlen($images[0]) ? $images[0] : "noimage.png" ?>" alt="...">
                                </div>
                                <div class="card-body mt-3">
                                    <div class="col-10">
                                        <a class="text-decoration-none text-center text-capitalize" href='<?= Url::link('pages/Products/ProductDetail.php') . '?id=' . $row['id']; ?>'>
                                            <h5 class="card-title "><?= $row['name']; ?></h5>
                                        </a>
                                    </div>
                                </div>
                                <h1 class="<?= $row['status'] == 1 ? 'stock' : 'stock-out' ?>">
                                    <?= $row['status'] == 1 ? 'Stock' : 'Stock Out' ?>
                                </h1>
                                <div class="text-center">
                                    <h5><span class="text-black">Price-</span> $<?= $row['sprice'] ?></h5>
                                </div>
                                <div class="cart-btn">
                                    <a href="#" class="btn btn-dark w-100 p-3 rounded-0 text-white">ADD TO CART</a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $img = "../../assets/images/sofa.png";
include "../../shared/footer.php" ?>