<!-- trang nay dung de login -->
<?php include "./config/create-and-connectdatabase.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <div style="color: red;">

            <?php
            if (isset($_SESSION["login"])) {
                echo $_SESSION["login"];
                unset($_SESSION["login"]);
            }
            if (isset($_SESSION["check-login"])) {
                echo $_SESSION["check-login"];
                unset($_SESSION["check-loogin"]);
            }
            ?>
        </div>
        <h1>Login</h1>
        <p>Crete By Trungdev@gmail.com</p>
        <form action="" method="POST">

            <label for="taikhoan">Username </label>
            <input type="text" name="usernamelogin" placeholder="username">
            <label for="matkhau">Password </label>
            <input type="password" name="passwordlogin" placeholder="Password">
            <input type="submit" name="submitLogin" value="Login">
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST["submitLogin"])) {
    echo "Submit da duoc nhan";
    $username = $_POST["usernamelogin"];
    $password = $_POST["passwordlogin"];

    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);    // cau lenh truy van trong database
    if ($result->num_rows > 0) { // kiem tra xem du lieu loc ra co it nhat mot hang hay khong : login thanh cong
        $_SESSION["login"] = "Login successfull";
        $_SESSION["check-login"] = $username;
        // chuyen huong trang den index.php
        header("location:" . SITEURL . "admin/index.php");
    } else {  // login that bai
        $_SESSION["login"] = "Login failed (username or password not correct)";
        header("location:" . SITEURL . "admin/login.php");
    }
}
?>