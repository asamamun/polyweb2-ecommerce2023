<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
use App\Url;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = DB::connect();
    $idtoedit = $_POST['id'];
    $name = $conn->escape_string($_POST['name']);
    $sku = $conn->escape_string($_POST['sku']);
    $details = $conn->escape_string($_POST['details']);
    $shortdesc = $conn->escape_string($_POST['shortdesc']);
    $category_id = $conn->escape_string($_POST['category_id']);
    $quantity = $conn->escape_string($_POST['quantity']);
    $pprice = $conn->escape_string($_POST['pprice']);
    $sprice = $conn->escape_string($_POST['sprice']);
    $tags = $conn->escape_string($_POST['tags']);
    $vat = $conn->escape_string($_POST['vat']);
    $status = $conn->escape_string($_POST['status']);
    $op1 = $conn->escape_string($_POST['op1']);
    $op2 = $conn->escape_string($_POST['op2']);
    $editquery = "UPDATE products SET name='{$name}', sku='{$sku}', details='{$details}', shortdesc='{$shortdesc}', category_id='{$category_id}', quantity='{$quantity}', pprice='{$pprice}', sprice='{$sprice}', tags='{$tags}', vat='{$vat}', status='{$status}', op1='{$op1}', op2='{$op2}' WHERE id='{$idtoedit}' LIMIT 1";
    if ($conn->query($editquery)) {
        $_SESSION['message'] = "Product Updated Successfully";
        header("location: products.php");
    } else {
        $message = "ERROR!!";
    }
    $conn->close();
}

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $conn = DB::connect();
    $query = "SELECT * FROM products WHERE id={$id}";
    $result = $conn->query($query);

    if (!$result->num_rows) {
        echo "No product data found!!!";
        exit;
    }
    $row = $result->fetch_assoc();
    $iquery = "select * from images where product_id={$id}";
    $iresult = $conn->query($iquery);
}
$selectQ = "select id,name from categories where 1";
$sr = $conn->query($selectQ);

$conn->close();
?>

<?php $title = "Product Edit";
include "head.php" ?>
<div class="container-scroller">
    <?php $img = "../../assets/images/face4.jpg";
    include "../inc/Header.php" ?>
    <div class="container-fluid page-body-wrapper">
        <?php $img = "../../assets/images/face1.jpg";
        include "../inc/sidebar.php" ?>
        <!-- Main  -->
        <main class="main-panel mt-5 mx-5">
            <!-- <?php include "../../shared/message.php"; ?> -->
            <form class="mx-1 mx-md-4" action="productEdit.php?id=<?= $id; ?>" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $row['name'] ?>" />

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0"><label class="form-label" for="sku">Product Sku</label>
                                <input type="text" name="sku" id="sku" class="form-control" value="<?= $row['sku'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6 picontainer">
                        <?php
                        if ($iresult->num_rows) {
                            while ($irow = $iresult->fetch_assoc()) {
                                echo "<div class='d-inline-block position-relative'><span data-id='" . $irow['id'] . "' class='deleteimage position-absolute translate-middle badge rounded-pill bg-danger'> &times;<span class='visually-hidden'>delete image</span></span><a href='" . Url::link('assets/products/' . $irow['name']) . "' data-lightbox='p" . $irow['product_id'] . "'><img src='" . Url::link('assets/products/' . $irow['name']) . "' width='200px' /></a></div>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="details">Your Product Details</label>
                        <textarea required name="details" id="details" class="form-control"><?= $row['details'] ?></textarea>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="shortdesc">Your Product short Details</label>
                        <textarea required name="shortdesc" id="shortdesc" class="form-control"><?= $row['shortdesc'] ?></textarea>

                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="category_id">Your Product Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="-1" selected disabled>Select Category</option>
                            <?php
                            $html = "";
                            if ($sr->num_rows) {
                                while ($irow = $sr->fetch_assoc()) {
                                    $s = isset($row['category_id']) && $row['category_id'] == $irow['id'] ? "selected" : "";
                                    $html .= '<option value="' . $irow['id'] . '" ' . $s . '>' . $irow['name'] . '</option>';
                                }
                                echo $html;
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="quantity">Product Quantity </label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="<?= $row['quantity'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="pprice">Product Purches price </label>
                                <input type="number" name="pprice" id="pprice" class="form-control" value="<?= $row['pprice'] ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="sprice">Product Sell Price
                                </label>
                                <input type="number" name="sprice" id="sprice" class="form-control" value="<?= $row['sprice'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="tags">Product tags </label>
                                <input type="text" name="tags" id="tags" class="form-control" value="<?= $row['tags'] ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="vat">Products Vat </label>
                                <input type="text" name="vat" id="vat" class="form-control" value="<?= $row['vat'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="role">Product Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="-1" disabled>Select</option>
                                    <option value="1" <?= $row['status'] == 1 ? "selected" : "" ?>>Stock</option>
                                    <option value="0" <?= $row['status'] == 0 ? "selected" : "" ?>>Sold Out</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="op1">Option 1 </label>
                                <input type="text" name="op1" id="op1" class="form-control" value="<?= $row['op1'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="op2">Option 2 </label>
                                <input type="text" name="op2" id="op2" class="form-control" value="<?= $row['op2'] ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="fs-5 px-4 btn btn-block btn-lg btn-gradient-primary">Update Product</button>
                </div>

            </form>
        </main>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include "footer.php" ?>
<script>
    let url = '<?= Url::link(""); ?>';

    function deleteimage(n) {}

    function removeimage(n) {}

    $(document).ready(function() {
        $(".deleteimage").click(function() {
            $t = $(this);
            let n = $t.data('id');
            let r = confirm("are you sure you want to delete?");
            if (!r) return;
            $.post(url + "/dashboard/Images/deleteimage.php", {
                iid: n
            }, function(data) {
                data = JSON.parse(data);
                console.log(data);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                $t.parent().remove();
            });
        });
    });
</script>