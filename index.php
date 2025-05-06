<?php
session_start();

// اتصال به پایگاه داده
$connect_db = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");

// دریافت ویدیوهای آپلود شده
$query_result = mysqli_query($connect_db, "SELECT * FROM `videos` ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پرواز به گرافیک</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap.rtl.css" rel="stylesheet">
</head>
<body dir="rtl">
    <header class="bg-primary text-white pt-3 pb-2">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="#">علی اصغر پیرمرادیان</a>
                <button class="navbar-toggler ms-auto bg-light m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link text-white" href="index.php">خانه</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#about">درباره ما</a></li>
                        <?php
                        if (isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="dashboard.php">داشبورد</a></li>';
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link text-white" href="#"></a></li>
                        <?php
                        if (isset($_SESSION['login'])) {
                            echo '<li class="nav-item"><a class="nav-link text-danger" href="logout.php">خروج</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="login.html">ورود</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <a href="index.php" class="btn btn-warning">شروع کنید</a>
            </div>
        </nav>
        <div class="container text-center mt-5">
            <h1>به سایت علی اصغر پیرمرادیان خوش آمدید</h1>
            <p>من در زمینه آموزش گرافیک می‌توانم کمکتان کنم</p>
            <a href="#" class="btn btn-light">شروع یادگیری</a>
        </div>
    </header>

    <!-- بخش نمایش ویدیوها -->
    <section class="videos py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">چکیده‌ای از آموزش‌ها</h2>
            <div class="row g-4">
                <?php
                if (mysqli_num_rows($query_result) > 0) {
                    while ($row = mysqli_fetch_assoc($query_result)) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card">';
                        echo '<video class="card-img-top" controls>';
                        echo '<source src="videos/' . htmlspecialchars($row['video_url']) . '" type="video/mp4">';
                        echo 'مرورگر شما از ویدیو پشتیبانی نمی‌کند.';
                        echo '</video>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">هنوز ویدیویی آپلود نشده است.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- بخش درباره ما -->
    <main>
        <section id="about" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">درباره ما</h2>
                <p class="text-center">در این بخش رزومه کوتاه خودم را می‌گذارم</p>
            </div>
        </section>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        <p>حق کپی‌رایت این سایت برای علی اصغر پیرمرادیان است. استفاده از آن مجاز نیست حتی شما دوست عزیز.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="bootstrap.bundle.js"></script>
</body>
</html>