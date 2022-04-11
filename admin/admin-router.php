<body>
    <?php include "menu.php" ?>

    <main class="main-content">
        <div class="wrapper">
            <h3>Manage Admin</h3>
            <div class="show-notify" style="color: red; padding-top: 10px">
                <?php
                if (isset($_SESSION["add"])) {
                    echo $_SESSION["add"];
                    unset($_SESSION["add"]);
                }
                ?>
            </div>

            <a href="add-admin.php" class="btn-primary">Add admin</a>
            <table class="tb-full">
                <tr>
                    <th>S.N</th>
                    <th>FullName</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <!-- Show data from database  -->
                <?php
                $sql = "SELECT id, full_name, username, password FROM tbl_admin";
                $result = $conn->query($sql);
                $Stt = 1;
                echo $Stt;
                if ($result->num_rows > 0) { // kiem tra neu so hang >0. Mang co du lieu
                    while ($row = $result->fetch_assoc()) {
                        // $row o day la mot mang ket hop - mang ma co key la string thay vi cac so
                        echo "<tr><td>" . $Stt++ . "</td>" . "<td>" . $row["full_name"] . "</td>" . "<td>" . $row["username"] . "</td>" . '  <td>
                         <a href="" class="btn-secondary">UpdateAdmin</a>
                         <a href="" class="btn-danger">DeleteAdmin</a>
 
                     </td></tr>';
                    }
                }

                ?>



                <!-- <tr>
                    <td>1</td>
                    <td>TrungPhamVan</td>
                    <td>Trung</td>
                    <td>
                        <a href="" class="btn-secondary">UpdateAdmin</a>
                        <a href="" class="btn-danger">DeleteAdmin</a>

                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>TrungPhamVan</td>
                    <td>Trung</td>
                    <td>
                        <a href="" class="btn-secondary">UpdateAdmin</a>
                        <a href="" class="btn-danger">DeleteAdmin</a>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>TrungPhamVan</td>
                    <td>Trung</td>
                    <td>
                        <a href="" class="btn-secondary">UpdateAdmin</a>
                        <a href="" class="btn-danger">DeleteAdmin</a>
                    </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>TrungPhamVan</td>
                    <td>Trung</td>
                    <td>
                        <a href="" class="btn-secondary">UpdateAdmin</a>
                        <a href="" class="btn-danger">DeleteAdmin</a>
                    </td>
                </tr> -->
            </table>
        </div>

    </main>
    <?php include "footer.php" ?>

</body>