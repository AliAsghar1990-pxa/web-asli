<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fa">
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
                
            </div>
        </nav>
        <div class="container text-center mt-5">
            <h1>خرید آموزش</h1>
            <p> برای بهتر شدن همیشه تلاش کن</p>
            
        </div>
    </header>
    <section class="videos py-5 bg-light">
        <div class="container">
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card">
                        <video class="card-img-top" controls>
                            <source src="video1.mp4" type="video/mp4">
                            مرورگر شما از ویدیو پشتیبانی نمی‌کند.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">تایم لپس دوره پرواز به فتوشاپ</h5>
                            <a href="ps.php" class="btn btn-light">شروع یادگیری</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <video class="card-img-top" controls>
                            <source src="video2.mp4" type="video/mp4">
                            مرورگر شما از ویدیو پشتیبانی نمی‌کند.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">تایم لپس دوره پرواز به افتر افکت</h5>
                            <a href="af.php" class="btn btn-light">شروع یادگیری</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <video class="card-img-top" controls>
                            <source src="video3.mp4" type="video/mp4">
                            مرورگر شما از ویدیو پشتیبانی نمی‌کند.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">تایم لپس دوره پرواز به پریمیر</h5>
                            <a href="pr.php" class="btn btn-light">شروع یادگیری</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <section id="about" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">درباره ما</h2>
                <p class="text-center">در این بخش رزومه کوتاه خودم را می‌گذارم</p>
            </div>
        </section>
        <section class="services py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">خدمات ما</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h3 class="card-title">طراحی سایت</h3>
                            <p class="card-text">متن تست متن تست متن تست متن تست</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h3 class="card-title">توسعه وب</h3>
                            <p class="card-text">توسعه وب‌سایت‌های داینامیک با عملکرد بالا.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h3 class="card-title">پنجره نوشتن اطلاعات سایت</h3>
                            <p class="card-text">متن تست متن تست متن تست</p>
                        </div>
                    </div>
                </div>
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