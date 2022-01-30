<!-- Navbar -->
<nav class="navbar navbar-light bg-light mb-3">
    <div class="container">
        <a href="<?= site_url() ?>" class="navbar-brand">Malik Ardhiansyah</a>
        <div class="d-flex">
            <?php
                date_default_timezone_set("Asia/Jakarta");
                echo date("H:i") . " WIB"; 
            ?>
        </div>
    </div>
</nav>
<!-- End Navbar -->