<?php
$dbConnection = mysqli_connect("localhost", "root", "root", "php_gem"); //因為使用MAMP來創建網頁
                                                                        //所以帳號密碼使用MAMP預設的root
if (mysqli_connect_errno()) {                                           
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//echo "連接成功！";


// <!-- 將文字編碼設為UTF-8以正確顯示中文 -->
 mysqli_set_charset($dbConnection,"utf8");

 ?>