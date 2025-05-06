<?php
session_start();

// بررسی نقش کاربر
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit;
}

// اتصال به پایگاه داده
$connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $video_file = $_FILES['video']['name'];
    $video_tmp = $_FILES['video']['tmp_name'];

    // بررسی وجود پوشه videos
    if (!is_dir("videos")) {
        mkdir("videos", 0777, true); // ایجاد پوشه در صورت عدم وجود
    }

    // ذخیره ویدیو در پوشه videos
    move_uploaded_file($video_tmp, "videos/" . $video_file);

    // ذخیره اطلاعات ویدیو در پایگاه داده
    $query = "INSERT INTO `videos` (`title`, `video_url`) VALUES ('$title', '$video_file')";
    if (mysqli_query($connect_db, $query)) {
        echo "<script>alert('ویدیو با موفقیت اضافه شد'); location.replace('videos.php');</script>";
    } else {
        echo "<script>alert('خطا در ذخیره ویدیو! لطفاً دوباره تلاش کنید');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن ویدیو</title>
    <link rel="stylesheet" href="login_register.css">
</head>
<body>
    <div class="login-container">
        <h1>افزودن ویدیو</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="title">عنوان ویدیو</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="input-group">
                <label for="video">فایل ویدیو</label>
                <input type="file" id="video" name="video" accept="video/*" required>
            </div>
            <button type="submit" class="submit-btn">افزودن ویدیو</button>
        </form>
        <div class="additional-links" style="margin-top: 20px;">
            <a href="dashboard.php">بازگشت به پنل مدیریت</a>
        </div>
    </div>
</body>
</html>