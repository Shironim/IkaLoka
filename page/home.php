<!-- <section id="carosel-img">
  <div class="container rounded">
  <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded shadow">
      <div class="carousel-item h-auto active">
        <img src="asset/img/1.jpg" class="d-block w-100 fit-height" alt="...">
        <div class="carousel-caption text-start">
          <h1>IkaLoka</h1>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="asset/img/1.jpg" class="d-block w-100 fit-height" alt="...">
      </div>
      <div class="carousel-item">
        <img src="asset/img/1.jpg" class="d-block w-100 fit-height" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
</section> -->
<section id="alert">
  <div class="container">
    <button class=" text-start w-100 mt-3 alert alert-info " role="alert" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <span class="fs-6 fw-bold text-primary"><i class="fas fa-exclamation-circle me-3"></i> Mohon baca sebelum memesan</span>
    </button>
  </div>
</section>
<section id="musim-ikan">
  <div class="container-xl container-md container-sm container mt-3 mb-4">
    <h1 class="fs-3">Panen Ikan Musim Ini</h1>
    <div class="row">
    <?php 
      $produks = mysqli_query($conn,"SELECT * FROM produk WHERE isMusim = 1");

      while ($produk = mysqli_fetch_array($produks)) {
        $harga = $produk['harga'];
        if ($produk['diskon'] > 0) {
          $diskon = $produk['diskon']*$harga/100;
        }else{
          $diskon = 0;
        }
        // harga yang dibayarkan per satuan produk
        $harga_total = $harga - $diskon;
        ?>
      <div class="col-lg-3 col-md-4 col-6 px-lg-2 py-lg-2 px-1 py-1">
        <a href="produk-<?= $produk['id_produk']?>" class="text-dark text-decoration-none">
          <div class="card" style="width: 100%;">
            <img src="<?= base_url('asset/img/'.$produk['gambar'])?>" class="card-img-top" alt="...">
            <?php
              if ($produk['isMusim'] == 1) {?>
                <span class="badge bg-primary position-absolute">Musim Ikan</span>
              <?php }?>
            <div class="card-body">
              <h5 class="card-title mb-3"><?= $produk['nama_produk']?></h5>
              <?php
                if ($produk['diskon'] > 0) {?>
                <p class="card-diskon mb-2">
                  <span class="diskon me-lg-2 me-md-2 me-sm-1 me-0"><?= $produk['diskon']?>%</span>
                  <span class="price text-muted">Rp. <?= number_format($produk['harga'])?>/Kg</span>
                </p>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/Kg</p>
              <?php }else{?>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/Kg</p>
              <?php }?>
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
<section id="produk-ikan">
  <div class="container-xl container-md container-sm container container-md container-sm container">
    <h1 class="fs-3">Produk Ikan</h1>
    <div class="row">
    <?php 
      $produks = mysqli_query($conn,"SELECT * FROM produk WHERE isMusim = 0");

      while ($produk = mysqli_fetch_array($produks)) {
        $harga = $produk['harga'];
        if ($produk['diskon'] > 0) {
          $diskon = $produk['diskon']*$harga/100;
        }else{
          $diskon = 0;
        }
        // harga yang dibayarkan per satuan produk
        $harga_total = $harga - $diskon;
      ?>
      <div class="col-lg-3 col-md-4 col-6 px-lg-2 py-lg-2 px-1 py-1">
        <a href="produk-<?= $produk['id_produk']?>" class="text-dark text-decoration-none">
          <div class="card" style="width: 100%;">
            <img src="<?= base_url('asset/img/'.$produk['gambar'])?>" class="card-img-top" alt="...">
            <?php
              if ($produk['isMusim'] == 1) {?>
                <span class="badge bg-primary position-absolute">Musim Ikan</span>
              <?php }?>
            <div class="card-body">
              <h5 class="card-title mb-3"><?= $produk['nama_produk']?></h5>
              <?php
                if ($produk['diskon'] > 0) {?>
                <p class="card-diskon mb-2">
                  <span class="diskon me-lg-2 me-md-2 me-sm-1 me-0"><?= $produk['diskon']?>%</span>
                  <span class="price text-muted">Rp. <?= number_format($produk['harga'])?>/Kg</span>
                </p>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/Kg</p>
              <?php }else{?>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/Kg</p>
              <?php }?>
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
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p><b>Pembelian</b></p>
        <p>Pesanan pembelian maks jam 15.00 </p>
        <p>Tidak ada minimal pembelian ikan </p>
        <p><b>Pengiriman</b></p>
        <p>Pengiriman dilakukan jam 16.00</p>
        <p>Setiap pembelian akan dikonfirmasi via Nomor Telephone / WhatsApp</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>