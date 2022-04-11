<?php include "menu.php"; ?>
<main class="main-content">
    <div class="wrapper">
        <!-- Form de add Category -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!--enctype = "multipart/form-data"  thuoc tinh nay cho phep tai file len-->
            <table class="tb-full1">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>

                <tr>
                    <td>Title</td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Feature</td>
                    <td><input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>

                </tr>
                <tr>
                    <td>Active</td>
                    <td><input type="radio" name="actived" value="Yes">Yes
                        <input type="radio" name="actived" value="No">No
                    </td>

                </tr>
                <tr>
                    <td><input type="submit" value="Add Category" class="colspan-2" name="submit1"></td>
                </tr>
            </table>
        </form>
        <!-- Lay du lieu tu form Category -->
        <?php
        // kiem tra xem form da duoc submit chua
        if (isset($_POST["submit1"])) {
            // lay gia tri cua title input
            $title = $_POST["title"];

            // voi input radio phai kiem tra xem nguoi dung da chon gia tri nao chua
            if (isset($_POST["featured"])) {
                $featured = $_POST["featured"];
            } else {
                $featured = "No";
            }
            if (isset($_POST["actived"])) {
                $actived = $_POST["actived"];
            } else {
                $actived = "No";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];
                // var_dump($_FILES);
                // auto rename our img
                // lay phan mo rong cua anh .jpg, .png.....
                $ext = explode('.', $image_name);
                // Rename image
                $image_name = "Food_category_" . rand(000, 999) . "." . end($ext);
                $target_dir = $_FILES['image']['tmp_name'];
                // echo $target_dir;
                $target_file_move = "../images/categorymove/" . $image_name; // duong dan tuong doi voi file dang viet code
                $upload = move_uploaded_file($target_dir, $target_file_move);  // ham nay chuyen mot file duoc tai len vao 1 thu muc dat trc, o day la target file move
                if ($upload = false) {
                    $_SESSION['upload']  = "<div style = 'color: red'></div>";
                    header('location:' . SITEURL . "admin/add-category.php");
                    die(); // dung truy cap vao co so du lieu;

                }
            } else {
                $image_name = "";
            }
            $sql = "INSERT INTO tbl_category (title,image_name,	featured, active) VALUES('$title','$image_name','$featured','$actived');";
            // kiem tra truy van
            if ($conn->query($sql) == TRUE) {
                $_SESSION["notify_success"] = "Add Category thanh cong.";
                header("location:" . SITEURL . "admin/mange-category.php");
            } else {
                echo "Query failed";
            }
        }
        // insert du lieu nhan duoc tu form addCategory vao database



        ?>
    </div>

</main>
<?php include "footer.php"; ?>