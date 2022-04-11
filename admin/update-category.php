<?php include "menu.php";
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_category WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) //tim duoc hang dua vao id
    {
        $row = $result->fetch_assoc();
        $titleOld = $row['title'];
        $current_img = $row['image_name'];
        $featuredOld = $row['featured'];
        $active = $row['active'];
    } else {
        $_SESSION['no-category-found'] = "No category found";
        header("location:" . SITEURL . "admin/mange-category.php");
    }
} else {
    header("location:" . SITEURL . "admin/mange-category.php");
}

?>

<main class="main-content">
    <div class="wrapper">
        <!-- Form de add Category -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!--enctype = "multipart/form-data"  thuoc tinh nay cho phep tai file len-->
            <table class="tb-full1">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="updatetitle" placeholder="Category Title" value="<?php echo  $titleOld ?>"></td>
                </tr>

                <tr>
                    <td>Current Image</td>
                    <td style="margin: 10px 0; display: inline-block;"><img src='<?php echo "../images/categorymove/" . $current_img ?> ' alt="khong hien thi hinh anh" style="height: 100px; width: 100px; objectfit: cover "></td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td><input type="file" name="updateimage"></td>
                </tr>

                <tr>
                    <td>New Feature</td>

                    <td>
                        <input <?php if ($featuredOld == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="updatefeatured" value="Yes">Yes
                        <input <?php if ($featuredOld == "No") {
                                    echo "checked";
                                } ?> type="radio" name="updatefeatured" value="No">No
                    </td>

                </tr>
                <tr>
                    <td>New Active</td>
                    <td><input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="updateactived" value="Yes">Yes
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="updateactived" value="No">No
                    </td>

                </tr>
                <tr style="margin: 20px 0; display: inline-block">
                    <td><input type="submit" value="Update Category" class="colspan-2" name="submit1"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit1'])) {
            $newtitle = $_POST['updatetitle'];
            $newfeatured = $_POST['updatefeatured'];
            $newactive = $_POST['updateactived'];

            // var_dump($_FILES['updateimage']);
            //check xem co file hinh anh duoc chon khong
            if ($_FILES['updateimage']['name'] != "") {
                $newimage = $_FILES['updateimage']['name'];
                $ext = explode('.', $newimage);
                // Rename image
                $newimage = "Food_category_" . rand(000, 999) . "." . end($ext);
                $target_dir = $_FILES['updateimage']['tmp_name'];
                $target_file_move = "../images/categorymove/" . $newimage; // duong dan tuong doi voi file dang viet code
                $upload = move_uploaded_file($target_dir, $target_file_move);  // ham nay chuyen mot file duoc tai len vao 1 thu muc dat trc, o day la target file move
                $pathtodelete = "../images/categorymove/" . $current_img;
                unlink($pathtodelete);
                if ($upload = false) {
                    $_SESSION['upload']  = "<div style = 'color: red'></div>";
                    header('location:' . SITEURL . "admin/add-category.php");
                    die(); // dung truy cap vao co so du lieu;
                }
            } else {
                $newimage = $current_img;
            }

            // truy van update sql2
            $sql2 = "UPDATE tbl_category SET title = '$newtitle', featured= '$newfeatured', active ='$newactive', image_name = '$newimage' WHERE id = $id";
            if ($conn->query($sql2)) {
                //cap nhat du lieu thanh cong
                $_SESSION['update'] = "Cap nhat data vao database thanh cong";
                header("location:" . SITEURL . "admin/mange-category.php");
            } else {
                // cap nhat du lieu that bai
                $_SESSION['update'] = "Cap nhat data vao database that bai";
                header("location:" . SITEURL . "admin/update-category.php");
            }
        }


        ?>
        <?php include "footer.php";
        ?>