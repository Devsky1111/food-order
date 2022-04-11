<?php include "menu.php";


?>

<?php
if (isset($_GET['id']) and isset($_GET['image_name'])) {  // kiem tra xem co lay duoc gia tri truyen qua URL hay khonh
    // Co nhan duoc
    echo ("nhan gia tri thanh cong");
    echo "gia tri la: " . $_GET['id'] . " va " . $_GET['image_name'];
    // Remove the image 
    //1. chi duong dan tuong doi cua file
    $path = "../images/categorymove/" . $_GET['image_name'];
    // 2. Su dung ham unlink duoc tao san trong php de xoa file
    unlink($path);
    // tao mot thong bao xoa file thanh cong
    $_SESSION['removefile'] = "Xoa file thanh cong";
    // Redirect to mange-category.php
    // cau lenh truy van de xoa data dua tren id 
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_category WHERE id = $id";
    echo $sql;
    if ($conn->query($sql) == TRUE) {
        $_SESSION['removedatainDB'] = "Xoa du lieu trong database thanh cong";
    } else {
        $_SESSION['removedatainDB'] = "Xoa du lieu trong database that bai";
    }
    header("location:" . SITEURL . "admin/mange-category.php");
} else { //khong nhan duoc -> chuyen huong lai ve trang category-manage -> cung de tranh nguoi dung tu go trang delete.php vao ma khong truyen id va img_name
    $_SESSION['removefile'] = "Xoa file that bai";
    header("location:" . SITEURL . "admin/mange-category.php");
}
?>


<?php include "footer.php";


?>