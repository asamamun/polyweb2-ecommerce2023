<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
use App\Auth as Auth;

Auth::AdminCheck();
//post method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = DB::connect();
    $idtoedit = $_POST['id'];
    $fname = $conn->escape_string($_POST['first_name']);
    $lname = $conn->escape_string($_POST['last_name']);
    $email = $_POST['email'];
    $password = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    $role = $_POST['role'];
    $error = false;
    if (strlen($password) < 4 || strlen($password2) < 4) {
        $message = "password is too short!!";
        $error = true;
    } elseif ($password !== $password2) {
        $message = "Password Mismatched!!";
        $error = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email Not Valid!!!";
        $error = true;
    }
    if ($role == "-1") {
        $message = "Please select User Role!!!";
        $error = true;
    }
    if (!$error) {

        $editquery = "insert into users (lastname, firstname, email, password, role) VALUES ('{$lname}','{$fname}','{$email}','{$password}','{$role}')";
        $conn->query($editquery);
        if ($conn->affected_rows) {
            $conn->close();
            $_SESSION['message'] = "User Created Successfully";
            header("location: users.php");
        } else {
            $message = "ERROR!!";
        }
        $conn->close();
    }
}
?>
<?php $title = "User Add";
include "Head.php" ?>
<div class="container-scroller">
    <?php $img = "../../assets/images/face4.jpg";
    include "../inc/Header.php" ?>
    <div class="container-fluid page-body-wrapper">
        <?php $img = "../../assets/images/face1.jpg";
        include "../inc/sidebar.php" ?>
        <!-- Main  -->
        <main class="main-panel mt-5 mx-5">
            <h3>Create User</h3>
            <form class="mx-1 needs-validation" action="usersAdd.php" method="post" novalidate>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">First Name</label>
                        <input type="text" name="first_name" id="form3Example1c" class="form-control" required value="<?= isset($fname) ? $fname : ""; ?>" />

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            First Name Required!!
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Last Name</label>
                        <input type="text" name="last_name" id="form3Example1c" class="form-control" required value="<?= isset($lname) ? $lname : ""; ?>" />

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Last Name Required!!
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" required value="<?= isset($email) ? $email : ""; ?>" />

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Email Required!!
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-1">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" name="pass1" id="form3Example4c" class="form-control" required />

                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Password Required!!
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mt-1">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                            <input type="password" name="pass2" id="form3Example4cd" class="form-control" required />

                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Repeat Password Required!!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="role">User Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="-1" disabled>Select</option>
                            <option value="1" <?= isset($role) && $role == 1 ? "selected" : ""; ?>>User</option>
                            <option value="2" <?= isset($role) && $role == 2 ? "selected" : ""; ?>>Admin</option>
                        </select>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Role Required!!
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="fs-5 px-4 btn btn-primary btn-lg">Create User</button>
                </div>

            </form>
        </main>
    </div>
</div>
<?php include "footer.php" ?>