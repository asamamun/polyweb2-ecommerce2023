<?php
require __DIR__ . "/../vendor/autoload.php";

use App\DB\Database as DB;

use App\Url;

$conn = DB::connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $conn->escape_string($_POST['first_name']);
    $lname = $conn->escape_string($_POST['last_name']);
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $error = false;
    if ($pass1 != $pass2) {
        $message = "Password Mismatched!!!";
        $error = true;
    }
    if (strlen($pass1) < 4) {
        $message = "Password Must be At Least 4 characters!!!";
        $error = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email Not Valid!!!";
        $error = true;
    }
    if (!$error) {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);
        $q = "insert into users values(null,'{$lname}','{$fname}','{$email}','{$hash}',1,null,null)";
        $conn->query($q);
        if ($conn->affected_rows) {
            $message = "User Registered Successfully";
            header("location: " . Url::link('Login.php'));
        }
    }
}

?>

<style>
    .brand {
        color: #3b5d50;
    }

    .sign-container {
        max-width: 470px;
    }

    .icon-height {
        height: 24px;
        width: 24px;
    }

    .right-box {
        background: linear-gradient(#3b5d50, #0DCA78);
    }

    .inputbox {
        border: 1px solid #cfcece;
        outline: none;
    }

    .inputbox:focus {
        border: 2px solid #0DCA78;
    }

    .input-label {
        top: -12px;
        left: 3%;
    }

    .sign-up {
        background: #0DCA78;
        color: #fff;
    }

    .sign-up:hover {
        background: #fff;
        color: #0DCA78;
        border: 1px solid #0DCA78;
    }

    .signin-border {
        width: 60px;
        border: 2px solid #0DCA78;
    }
</style>
<?php
$title = "Registration Here";
$style = "../assets/css/style.css";
$img = "../assets/images/cart.svg";
include "../shared/navbar.php" ?>
<section class="container">
    <div class="row vh-100">
        <div class="col-md-7 col-12">
            <div class="px-4 sign-container mx-auto">
                <div class="text-center mt-5">
                    <?php
                    if (isset($message)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error !</strong> <?= $message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <h4 class="fw-bold brand fs-4 my-4">Sign Up in to Account</h4>
                    <div class="mb-2 mx-auto signin-border"></div>
                    <div class="position-relative my-4">
                        <form class="mx-1 mx-md-4" action="SignUp.php" method="post">
                            <div class="d-flex flex-row align-items-center">
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" placeholder="Enter First Name" name="first_name" id="form3Example1c" class="form-control" required value="<?= isset($fname) ? $fname : ""; ?>" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" placeholder="Enter Last Name" name="last_name" id="form3Example1c" class="form-control mt-4" required value="<?= isset($lname) ? $lname : ""; ?>" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                    <input placeholder="Enter E-mail" type="email" name="email" id="form3Example3c" class="form-control mt-4" required value="<?= isset($email) ? $email : ""; ?>" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" name="pass1" id="form3Example4c" class="form-control" placeholder="Enter Password" required />

                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" placeholder="Confirm Password" name="pass2" id="form3Example4cd" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-check d-flex justify-content-center mb-3">
                                <input id="agree" class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                <label class="form-check-label" for="agree">
                                    I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-5 col-12 right-box d-flex">
            <div class="text-white text-center m-auto m-5 p-5">
                <h2 class="fw-bolder fs-1 my-4">Hello, Friend!</h2>
                <div class="signin-border border border-2 border-white mx-auto"></div>
                <p class="fs-5 my-4">If You Have An Account Please.</p>
                <button class="btn fw-bold btn-lg border-white rounded-5 px-5 fs-6 text-white
                    ">Login</button>
            </div>
        </div>
    </div>
</section>
<?php $img = "../assets/images/sofa.png";
include "../shared/footer.php" ?>