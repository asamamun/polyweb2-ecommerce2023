<?php
// echo __DIR__;

require __DIR__ . '/../vendor/autoload.php';

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
<div class="product-section font-monospace">
    <div class="products-area">
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
                                    <a href='<?= Url::link('pages/Products/ProductDetail.php') . '?id=' . $row['id']; ?>'>
                                        <img class="image-zoom" alt="Product-img" src="assets/products/<?= strlen($images[0]) ? $images[0] : "noimage.png" ?>" alt="...">
                                    </a>
                                </div>
                                <div class="card-body mt-3">
                                    <div class="col-10">
                                        <a class="text-decoration-none text-center text-capitalize" href='<?= Url::link('pages/Products/ProductDetail.php') . '?id=' . $row['id']; ?>'>
                                            <h5 class="card-title "><?= $row['name']; ?></h5>
                                        </a>
                                    </div>
                                </div>
                                <h1 class="stcok <?= $row['status'] == 1 ? 'stock' : 'stock-out' ?>">
                                    <?= $row['status'] == 1 ? 'Stock' : 'Stock Out' ?>
                                </h1>

                                <div class="text-center">
                                    <h5><span class="text-black">Price-</span> $<?= $row['sprice'] ?></h5>
                                </div>
                                <div class="cart-btn">
                                    <a href="javascript:void(0)" data-pprice="<?= $row['sprice'] ?>"  data-pname="<?= $row['name'] ?>" data-pid="<?= $row['id'] ?>" class="addcartBtn btn btn-dark w-100 p-3 rounded-0 text-white">ADD TO CART</a>
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