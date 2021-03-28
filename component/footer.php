<?php
$beranda = "text-dark";
$keranjang = "text-dark";
$pesanan = "text-dark";
$akun = "text-dark";

if (isset($_GET['page'])) {
  switch ($_GET['page']) {
    case 'home':
      $beranda = "text-primary";
      $keranjang = "text-dark";
      $pesanan = "text-dark";
      $akun = "text-dark";
      break;
    case 'keranjang':
      $beranda = "text-dark";
      $keranjang = "text-primary";
      $pesanan = "text-dark";
      $akun = "text-dark";
      break;
    case 'pesanan':
      $beranda = "text-dark";
      $keranjang = "text-dark";
      $pesanan = "text-primary";
      $akun = "text-dark";
      break;
    case 'akun':
      $beranda = "text-dark";
      $keranjang = "text-dark";
      $pesanan = "text-dark";
      $akun = "text-primary";
      break;
    
    default:
      $beranda = "text-dark";
      $keranjang = "text-dark";
      $pesanan = "text-dark";
      $akun = "text-dark";
      break;
  }
}
?>

<footer class="fixed-bottom">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid nav-footer flex-row d-flex justify-content-center">
      <div class="menu mx-lg-5 mx-sm-4 mx-2 d-flex flex-column text-center">
        <a href="home" class="d-flex flex-column <?=$beranda?> text-decoration-none">
          <span class="fs-5 icon">
            <i class="fas fa-home"></i>
          </span>
          <span class="fs-6">Beranda</span>
        </a>
      </div>
      <div class="menu mx-lg-5 mx-sm-4 mx-2 d-flex flex-column text-center">
        <a href="keranjang" class="d-flex flex-column <?=$keranjang?> text-decoration-none">
          <span class="fs-5 icon position-relative">
            <i class="fas fa-shopping-cart"></i>
            <?php
              if (isset($_SESSION['items'])) {
                if(count($_SESSION['items']) > 0){?>
                <span class="badge bg-primary p-1 position-absolute"><?= count($_SESSION['items'])?></span>
              <?php 
                }
              }
              ?>

          </span>
          <span class="fs-6">Keranjang</span>
        </a>
      </div>
      <div class="menu mx-lg-4 mx-sm-4 mx-2 d-flex flex-column text-center">
        <a href="pesanan" class="d-flex flex-column <?=$pesanan?> text-decoration-none">
          <span class="fs-5 icon">
            <i class="fas fa-clipboard"></i>
          </span>
          <span class="fs-6">Pesanan</span>
        </a>
      </div>
      <div class="menu mx-lg-4 mx-sm-4 mx-2 d-flex flex-column text-center">
        <a href="akun" class="d-flex flex-column <?=$akun?> text-decoration-none">
          <span class="fs-5 icon">
            <i class="fas fa-user"></i>
          </span>
          <span class="fs-6">Akun</span>
        </a>
      </div>
    </div>
  </nav>
</footer>