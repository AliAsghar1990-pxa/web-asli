<?php
session_start();

// بررسی ورود کاربر
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
    exit;
}

// بررسی نقش کاربر
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="login_register.css">
</head>
<body>
    <div class="login-container">
        <h1>پنل مدیریت</h1>
        <div class="additional-links">
            <a href="index.php">صفحه اصلی</a>
            <a href="add_video.php">افزودن ویدیو</a>
            <a href="videos.php">مدیریت ویدیوها</a>
            <a href="logout.php">خروج</a>
        </div>
    </div>
</body>
</html>