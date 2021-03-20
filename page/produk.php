<?php
  $produks = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = 2");

  $produk = mysqli_fetch_array($produks);
?>

<section class="container-xl container-md container-sm container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-10 col-10 mb-4">
      <img src="asset/img/1.jpg" class="p-0 img-responsive-md img-fluid rounded" alt="...">
      <!-- <div class="row gx-2 mt-3">
          <div class="col-lg-4">
            <img src="asset/img/1.jpg" class="p-0 img-fluid rounded" alt="...">
          </div>
          <div class="col-lg-4">
            <img src="asset/img/1.jpg" class="p-0 img-fluid rounded" alt="...">
          </div>
          <div class="col-lg-4">
            <img src="asset/img/1.jpg" class="p-0 img-fluid rounded" alt="...">
          </div>
        </div> -->
      <!-- <div class="tambahan mt-2">
          <span>chat |</span>
          <span>whistlist |</span>
          <span>share</span>
        </div> -->
    </div>
    <div class="col-lg-8 col-md-8 col-sm-10 col-10">
      <h1 class="fs-3"><?= $produk['nama']?></h1>
      <!-- <div class="review d-inline-block mb-2">
        <span class="p-0">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <span class="ulasan">(120)</span>
        </span>
        <span class="circle" aria-hidden="true">•</span><span class="ulasan">ulasan (3)</span>
      </div> -->
      <div class="price-div">
        <p class="harga-diskon mb-2 text-muted">
          <span class="diskon"><?= $produk['diskon']?></span>
          <span class="price"><?= $produk['harga']?></span>
        </p>
        <p class="fs-5 fw-bold">Rp. <?= $produk['harga']?></p>
      </div>
      <hr>
      <div class="detail">
        <span class="fs-5 fw-bold text-primary border-bottom border-primary border-2">Detail</span>
        <p>
          <?= $produk['deskripsi']?>
        </p>
        <div class="jml-produk">
          <div class="kuantiti-produk mb-1">
            <i class="fs-4 text-primary fas fa-minus-circle"></i>
            <span class="fs-5 mx-2 jumlah">1</span>
            <i class="fs-4 text-primary fas fa-plus-circle"></i>
            <span>Stok <?= $produk['stok']?></span>
          </div>
          <!-- <div class="catatan">
            <p class="fs-6 fw-bold"><i class="far fa-clipboard"></i> Tambahkan catatan</p>
          </div> -->
          <div class="button d-flex mt-2">
            <button type="button" class=" col-lg-4 col-md-4 col-sm-6 col-6 btn btn-primary me-3"><i class="fas fa-cart-plus"></i> <span>Keranjang Belanja</span></button>
            <button type="button" class=" col-lg-4 col-md-4 col-sm-6 col-6 btn btn-primary"><span>Beli Sekarang</span></button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="produk-ikan">
  <div class="container-xl container-md container-sm container mt-5 mb-4">
    <h2 class="fs-2">Ikan Lainnya</h2>
    <div class="row">
    <?php 
      $produks = mysqli_query($conn,"SELECT * FROM produk WHERE isMusim = 1");

      while ($produk = mysqli_fetch_array($produks)) {?>
      <div class="col-lg-3 col-md-4 col-6 px-lg-2 py-lg-2 px-1 py-1">
        <a href="produk" class="text-dark text-decoration-none">
          <div class="card" style="width: 100%;">
            <img src="asset/img/1.jpg" class="card-img-top" alt="...">
            <span class="badge bg-primary position-absolute">Musim Ikan</span>
            <div class="card-body">
              <h5 class="card-title mb-3"><?= $produk['nama']?></h5>
              <p class="card-diskon mb-2">
                <span class="diskon me-lg-2 me-md-2 me-sm-1 me-0"><?= $produk['diskon']?>%</span>
                <span class="price text-muted"><?= $produk['harga']-($produk['harga']/$produk['diskon'])?></span>
              </p>
              <p class="card-price mb-0">Rp. <?= $produk['harga']?></p>
              <!-- <p class="card-star p-0">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span class="ulasan">(120)</span>
              </p> -->
              <!-- <button class="btn btn-dark">BELI</button> -->
            </div>
          </div>
        </a>
      </div>
      <?php }?>
    </div>
  </div>
</section>