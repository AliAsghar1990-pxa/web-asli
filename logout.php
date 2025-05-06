<?php
session_start();
unset($_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خروج</title>
</head>
<body>
    <script>
        alert("خروج موفق بود");
        setTimeout(function() {
            location.replace("index.php");
        }, 2000);
    </script>
</body>
</html>