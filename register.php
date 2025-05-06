<?php
session_start();

$a = $_POST["username"];
$b = $_POST["email"];
$d = $_POST["password"];

$connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");

// نقش پیش‌فرض کاربران عادی
$role = 'user';

$check_1 = mysqli_query($connect_db, "INSERT INTO `user`(`username`, `gmail`, `password`, `role`) VALUES ('$a','$b','$d','$role')");
mysqli_close($connect_db);

if ($check_1 == true) {
    $_SESSION['login'] = true;
    $_SESSION['role'] = $role; // ذخیره نقش کاربر
    ?>
    <script>
        alert("ثبت نام موفق بود");
        setTimeout(function() {
            location.replace("index.php");
        }, 3000);
    </script>
    <?php
} else {
    ?>
    <script>
        alert("مشکل در ثبت نام شما است!");
        setTimeout(function() {
            location.replace("register.html");
        }, 3000);
    </script>
    <?php
}
?>