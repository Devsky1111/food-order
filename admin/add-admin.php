<?php include "menu.php"
?>
<main class="main-content">
    <div class="wrapper">
        <form action="" method="POST">
            <table>
                <tr>
                    <td>FullName</td>
                    <td><input type="text" placeholder="FullName" name="fullname"></td>
                </tr>
                <tr>
                    <td>UserName</td>
                    <td><input type="text" placeholder="UserName" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" placeholder="Password" name="password"></td>
                </tr>
                <tr>
                    <td class="colspan-2">
                        <input type="submit" value="Add submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>

    </div>

</main>
<?php include "footer.php"
?>

<!-- Xử lý giá trị nhập trong form và gửi nó đến Database trong mySQL -->

<?php
// kiem tra xem da có gia tri trong input submit duoc gui di chua
// ham isset dùng để kiểm tra một biến đã được khai báo chưa và giá trị của biến đó khác Null. Nếu thỏa mãn sẽ trả về TRUE còn ngược lại là false
if (isset($_POST["submit"])) {
    echo '<script>alert("Button Addsubmit da duoc click")</script>';
}
// Get data from form have submited
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$password = $_POST["password"];

echo $fullname . $username . $password;
// query SQL to save data in database
$sql = "INSERT INTO tbl_admin (full_name, username, password)
VALUES ('$fullname', '$username', '$password')";

echo $sql;

// //insert data to database
// $conn->query($sql);
if (isset($_POST["submit"]) and $conn->query($sql) === TRUE) {
    $_SESSION["add"] = "Admin Added Successfully";
    header("location:" . SITEURL . "admin/admin-router.php"); //dieu huong trang sang admin/admin-router.php"
}
?>