<?php include "./config/create-and-connectdatabase.php";
    
    // Xoa bo tat ca cac session
    session_destroy();
    
    // chuyen huong trang web
    header("location:".SITEURL."admin/login.php");
