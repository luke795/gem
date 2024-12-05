<?php
include_once 'dbConnect.php';

$op = 'none';
if(isset($_GET['op'])) $op = $_GET['op'];

if($op =='createOrder')
{
    createOrder();
}
if($op=='checkLogin')
{
    checkLogin($_POST['email'],$_POST['password']);
}
if($op=='logout')
{
    logout();
}

function isStaff()
{
   return isset($_SESSION['email']);
}

function logout()
{
   session_start();
   session_destroy();
   header("Location: /");

}


function checkLogin($email,$password)
{
   // $staffEmail     =    "123@gmail.com";
   // $staffPassword  =    "123";
   global $dbConnection;
   $staffQ = mysqli_query($dbConnection,"SELECT * FROM `staff` WHERE `email` = '".$email."'");

   $staff = mysqli_fetch_assoc($staffQ);  //只需要一行就好

   if($email == $staff['email'] && password_verify($password,$staff['password']))
   {
         //認證是一個職員 session
         session_start();
         $_SESSION['email'] = $email;

         header("Location: /allOrders.php");
   }
   else
   {
         header("Location: /login.php");

   }
}

function createOrder(){

   ///用SQL儲存訂單
   global $dbConnection;
   date_default_timezone_set('Asia/Taipei');
   $sql = "INSERT INTO `php_gem`.`order`(
         `client_name`,
         `client_email`,
         `quantity`,
         `order_time`,
         `gem_id`
         ) VALUES (
         '{$_POST['name']}',
         '{$_POST['email']}',
         {$_POST['quantity']},
         '".date('Y-m-d H:i:s')."',
         {$_POST['gem_id']})";

   //寫入MYSQL資料庫
   if(mysqli_query($dbConnection, $sql))
   {
      header("Location: /order-completed.php");
   }
   else
   {
      echo '你輸入的資料是錯誤的，請重新輸入';
   }

    /* echo $_POST['gem_id']."<br>";
    echo $_POST['name']."<br>";
    echo $_POST['email']."<br>";
    echo $_POST['quantity']."<br>";
    echo date('Y-m-d H:i:s')."<br>"; */

   //  //儲存訂單  使用csv 檔案去儲存
   //  date_default_timezone_set('Asia/Taipei');
   //  $myfile = fopen("data.csv", "a") or die("未能開啟檔案");
   //  $data = $_POST['gem_id'].','.$_POST['name'].','.$_POST['email'].','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
   //  fwrite($myfile, $data);
   //  fclose($myfile);

    //轉變頁面
    
}