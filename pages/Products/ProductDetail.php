<?php
session_start();
// echo __DIR__;
require __DIR__ . '/../../vendor/autoload.php';


use App\DB\Database as DB;

if (isset($_GET['id'])) {
    $conn = DB::connect();
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $sq = "SELECT
    p.*,
    GROUP_CONCAT(i.name) AS images
FROM
    products p
  
LEFT JOIN
    images i ON p.id = i.product_id
where p.id= {$id}  
GROUP BY
    p.id, p.name, p.details";
    $sqr = $conn->query($sq);
    if ($sqr->num_rows) {
        $row = $sqr->fetch_assoc();
    }
}
?>
<?php
$title = $row['name'];
$style = "../../assets/css/style.css";
$img = "../../assets/images/cart.svg";
include "../../shared/navbar.php" ?>
<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <?php
                    $imageFilenames = explode(',', $row['images']);
                    if (!empty($imageFilenames[0])) {
                        $filename = trim($imageFilenames[0]);
                        $imageUrl = '../../assets/products/' . $filename;
                    } else {
                        $filename = 'No Image Available';
                        $imageUrl = '../../assets/images/no-img.webp';
                    }
                    ?>
                    <a class="rounded-4" href="<?= $imageUrl ?>" data-lightbox="gallery">
                        <img id="largeImage" style="width: 350px; height: 300px; margin: auto;" class="rounded-4 fit" src="<?= $imageUrl ?>" alt="<?= $filename ?>" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3 image-gallery">
                    <?php
                    $imageFilenames = explode(',', $row['images']);
                    foreach ($imageFilenames as $index => $filename) {
                        if (!empty($filename)) {
                            $imageUrl = '../../assets/products/' . $filename;
                            $smallImageId = 'smallImage' . $index;
                            echo '<a class="small-image" id="' . $smallImageId . '" href="' . $imageUrl . '" data-lightbox="gallery">';
                            echo '<img width="100" height="80" class="rounded-2 border mx-1" src="' . $imageUrl . '" />';
                            echo '</a>';
                        }
                    }
                    if (empty($imageFilenames[0])) {
                        echo 'No Images Available';
                    }
                    ?>
                </div>
            </aside>
            <main class="col-lg-6 mb-5">
                <div class="ps-lg-3 mb-5">
                    <h4 class="title text-dark">
                        <?= $row['name'] ?>
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                        <span class="text-success ms-2"><?= $row['status'] == 1 ? 'In Stock' : 'Stock Out' ?></span>
                    </div>

                    <div class="mb-3">
                        <span class="h5">$<?= $row['sprice'] ?></span>
                        <span class="text-muted">/per pice</span>
                    </div>
                    <p>
                        <?= $row['details'] ?>
                    </p>

                    <hr />

                    <div class="row mb-4">
                        <div class="col-md-4 col-6">
                            <label class="mb-2">Size</label>
                            <select class="form-select border border-secondary" style="height: 35px;">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                            </select>
                        </div>
                        <!-- col.// -->
                        <div class="col-md-4 col-6 mb-3">
                            <label class="d-block">Quantity</label>
                            <div class="input-group mb-3">
                                <form class="add-inputs" method="post">
                                    <input type="number" class="form-control" id="cart_quantity" name="cart_quantity" value="1" min="1" max="10">

                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                    <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                    <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
                </div>
            </main>
        </div>
    </div>
</section>
<?php $img = "../../assets/images/sofa.png";
include "../../shared/footer.php" ?>
<script>
    $(document).ready(function() {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });

        // Handle small image clicks
        $('.small-image').click(function() {
            var newImageSrc = $(this).attr('href');
            $('#largeImage').attr('src', newImageSrc);
        });
    });
</script>