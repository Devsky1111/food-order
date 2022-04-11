<?php
if (!isset($_SESSION["check-login"])) //bien nay dung de kiem tra nguoi dung da login hay chua
{
    $_SESSION["error-login"] = "<div>Please login before you want use</div>";
    header("location:" . SITEURL . "admin/login.php");
}
