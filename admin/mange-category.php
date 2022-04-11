<?php include "menu.php";

?>
<main class="main-content">
    <div class="wrapper">
        <h3>Category</h3>
        <?php
        if (isset($_SESSION["notify_success"])) {
            echo '<script>alert("Add Category successfull")</script>';
            unset($_SESSION["notify_success"]);
        }
        if (isset($_SESSION["upload"])) {
            echo '<script>alert("Add image success")</script>';
            unset($_SESSION["upload"]);
        }
        if (isset($_SESSION["removefile"])) {
            echo '<script>alert("Delete image in folder success")</script>';
            unset($_SESSION["removefile"]);
        }
        if (isset($_SESSION["removedatainDB"])) {
            echo '<script>alert("Delete data in Database successfull")</script>';
            unset($_SESSION["removedatainDB"]);
        }
        if (isset($_SESSION["update"])) {
            echo '<script>alert("Update date sucess")</script>';
            unset($_SESSION["update"]);
        }
        ?>
        <a href="./add-category.php" class="btn-primary">Add Category</a>

        <table class="tb-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Feature</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = $conn->query($sql);
            $sn = 0;
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {

            ?>
                    <tr>
                        <td> <?php echo ++$sn ?> </td>
                        <td><?php echo $row['title'] ?> </td>
                        <td>
                            <img src="<?php echo '../images/categorymove/' . $row['image_name'] ?>" alt="khong co hinh anh">
                        </td>
                        <td> <?php echo $row['featured'] ?> </td>
                        <td> <?php echo $row['active'] ?></td>
                        <td>
                            <a href='update-category.php?id=<?php echo ($row['id']) ?>' class='btn-secondary'>UpdateCategory</a>

                            <!-- truyen id va img_name qua URL -->
                            <a href='delete-category.php?id=<?php echo $row['id'] ?>&image_name=<?php echo $row['image_name'] ?>' class='btn-danger'>DeleteCategory</a>
                        </td>

                    </tr>
            <?php
                }
            }
            ?>



        </table>
    </div>


</main>
<?php include "footer.php";

?>