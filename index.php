<?php 
  include_once('config/_config.php');
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
      if (@$_GET['page'] == '') {
        require_once('page/home.php');
      }else if($_GET['page'] == 'home'){
        require_once('page/home.php');
      }else if ($_GET['page'] == 'produk') {
        require_once('page/produk.php');
      }else if ($_GET['page'] == 'keranjang') {
        require_once('page/keranjang-belanja.php');
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
      }
    ?>
  </main>
  <?php require_once('component/footer.php') ?>

  <?php require_once('component/script.php')?>
</body>

</html>