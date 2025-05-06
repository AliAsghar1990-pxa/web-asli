<?php
session_start();

// بررسی نقش کاربر
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit;
}

// اتصال به پایگاه داده
$connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");

// حذف ویدیو
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $video = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT `video_url` FROM `videos` WHERE `id`='$delete_id'"));
    if ($video) {
        unlink("videos/" . $video['video_url']); // حذف فایل ویدیو از سرور
    }
    mysqli_query($connect_db, "DELETE FROM `videos` WHERE `id`='$delete_id'");
    header("Location: videos.php");
    exit;
}

// ویرایش ویدیو
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $title = $_POST['title'];

    mysqli_query($connect_db, "UPDATE `videos` SET `title`='$title' WHERE `id`='$edit_id'");
    echo "<script>alert('ویدیو با موفقیت ویرایش شد');</script>";
}

// دریافت ویدیوهای موجود
$query_result = mysqli_query($connect_db, "SELECT * FROM `videos` ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت ویدیوها</title>
    <link rel="stylesheet" href="login_register.css">
</head>
<body>
    <div class="login-container">
        <h1>مدیریت ویدیوها</h1>

        <!-- لیست ویدیوها -->
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_result) > 0) {
                    while ($row = mysqli_fetch_assoc($query_result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>
                                <a href='?delete_id=" . $row['id'] . "' onclick='return confirm(\"آیا مطمئن هستید؟\")'>حذف</a>
                                <a href='#editModal" . $row['id'] . "' data-bs-toggle='modal'>ویرایش</a>
                              </td>";
                        echo "</tr>";

                        // مودال ویرایش
                        echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>ویرایش ویدیو</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                        </div>
                                        <form method='post'>
                                            <div class='modal-body'>
                                                <input type='hidden' name='edit_id' value='" . $row['id'] . "'>
                                                <div class='input-group'>
                                                    <label for='edit_title'>عنوان</label>
                                                    <input type='text' id='edit_title' name='title' value='" . htmlspecialchars($row['title']) . "' required>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>بستن</button>
                                                <button type='submit' class='btn btn-primary'>ذخیره تغییرات</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='text-center'>هنوز ویدیویی آپلود نشده است.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="additional-links" style="margin-top: 20px;">
            <a href="dashboard.php">بازگشت به پنل مدیریت</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="bootstrap.bundle.js"></script>
</body>
</html>