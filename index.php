<?php 
  include_once('konfig/konfig.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('component/meta.php')?>
</head>

<body>
  <!-- TODO  -->
  <?php require_once('component/header.php') ?>
  <main id="root" class="mb-90">
    <?php
        // print_r($_SESSION['items']);
      if (@$_GET['page'] == '') {
        require_once('page/home.php');
      }else if($_GET['page'] == 'home'){
        require_once('page/home.php');
      }else if ($_GET['page'] == 'produk') {
        require_once('page/produk.php');
      }else if ($_GET['page'] == 'keranjang') {
        if (isset($_SESSION['email'])) {
          require_once('page/keranjang-belanja.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }else if ($_GET['page'] == 'pesanan') {
        if (isset($_SESSION['email'])) {
          require_once('page/pesanan.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }else if ($_GET['page'] == 'akun') {
        if (isset($_SESSION['email'])) {
          require_once('page/akun.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }else if ($_GET['page'] == 'tambahkeranjang') {
        if (isset($_SESSION['email'])) {
          require_once('page/tambahkeranjang.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }else if ($_GET['page'] == 'kurangkeranjang') {
        if (isset($_SESSION['email'])) {
          require_once('page/kurangkeranjang.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }else if ($_GET['page'] == 'checkout') {
        if (isset($_SESSION['email'])) {
          require_once('page/detail-pemesanan.php');
        }else{
          echo"<script>document.location.href='login'</script>";
        }
      }
    ?>
  </main>
  <?php require_once('component/footer.php') ?>

  <?php require_once('component/script.php')?>
</body>

</html>