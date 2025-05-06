<div class="container">
    <?php
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $o = mysqli_connect("localhost", "h314331_aligraphics", "bAmVpfkRN" ,"h314331_aligraphicsdb");

    mysqli_query($o, "INSERT INTO `ed`(`username`, `pass`) VALUES ('$username','$pass')");
    mysqli_close($o);

    if ($o == true) {
        ?>
        <script>
            alert("ورود به حساب با موفقیت انجام شد");
            location.replace("index.php");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("ورود به حساب با موفقیت انجام نشد");
            location.replace("index.php");
        </script>
        <?php
    }
    ?>
</div>