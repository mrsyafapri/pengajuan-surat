<?php
if (isset($_POST["button"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_user, username, password, role_user FROM user WHERE username = '$username' AND password='$password'"));
    if ($username and $password) {
        if ($data) {
            if ($data['role_user'] == "Admin") {
                $_SESSION["username"] = $username;
                header("Location: admin/dashboard.php");
            } else {
                $_SESSION["id_user"] = $data['id_user'];
                $_SESSION["username"] = $username;
                header("Location: user/home.php");
            }
        } else { ?>
            <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
    } else { ?>
        <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username Atau Password Tidak Boleh Kosong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php }
} ?>