<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");
// $connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");
$query_result = mysqli_query($connect_db, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
mysqli_close($connect_db);

$row = mysqli_fetch_array($query_result);

if ($row) {
    $_SESSION['login'] = true;
    $_SESSION['role'] = $row['role']; // ذخیره نقش کاربر
    ?>
    <script>
        alert("ورود موفق بود");
        location.replace("index.php");
    </script>
    <?php
} else {
    echo "<h1>مشکل در نام کاربری یا کلمه عبور!</h1>";
}
?>