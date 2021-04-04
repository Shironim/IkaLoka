<?php
  $id = $_GET['id'];
  $produks = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$id'");

  $produk = mysqli_fetch_array($produks);
  $harga = $produk['harga'];
  if ($produk['diskon'] > 0) {
    $diskon = $produk['diskon']*$harga/100;
  }else{
    $diskon = 0;
  }
  // harga yang dibayarkan per satuan produk
  $harga_total = $harga - $diskon;
  $jumlah_barang = @$_SESSION['items'][$id];
?>

<section class="container-xl container-md container-sm container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
      <img src="<?= base_url('asset/img/'.$produk['gambar'])?>" class="p-0 img-responsive-md img-fluid rounded" alt="...">
    </div>
    <div class="col-lg-8 col-md-8 col-sm-10 col-10">
      <h1 class="fs-3"><?= $produk['nama_produk']?></h1>
      <div class="price-div">
        <?php
          if ($produk['diskon'] > 0) {?>
            <p class="harga-diskon mb-2 text-muted">
              <span class="diskon"><?= $produk['diskon']?>%</span>
              <span class="price">Rp. <?= number_format($produk['harga'])?>/0.5Kg</span>
            </p>
            <p class="fs-5 fw-bold">Rp. <?= number_format($harga_total)?>/0.5Kg</p>
        <?php }else{?>
          <p class="fs-5 fw-bold">Rp. <?= number_format($harga_total)?>/0.5Kg</p>
        <?php }?>
      </div>
      <hr>
      <form class="detail" method="POST" action="beli">
        <span class="fs-5 fw-bold text-primary border-bottom border-primary border-2">Detail</span>
        <p>
          <?= $produk['deskripsi']?>
        </p>
        <div class="jml-produk">
          <div class="kuantiti-produk mb-1">
            <span>Jumlah : </span>
            <input type="number" name="jumlah" value="1" maxlength="2" size="4" min="1" max=<?= $produk['stok']?> require>
            <span>Stok <b><?= $produk['stok']?></b></span>
          </div>
          <div class="button d-flex mt-4">
            <input type="hidden" name="id" value="<?php echo $produk['id_produk']?>" />
            <button type="submit" class=" col-lg-6 col-md-6 col-sm-10 col-12 btn btn-primary me-3"><i class="fas fa-cart-plus"></i> <span>Keranjang Belanja</span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<section id="produk-ikan">
  <div class="container-xl container-md container-sm container mt-5 mb-4">
    <h2 class="fs-2">Ikan Lainnya</h2>
    <div class="row">
    <?php 
      $produks = mysqli_query($conn,"SELECT * FROM produk WHERE NOT id_produk = '$produk[id_produk]'");

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
                  <span class="price text-muted">Rp. <?= number_format($produk['harga'])?>/0.5Kg</span>
                </p>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/0.5Kg</p>
              <?php }else{?>
                <p class="card-price mb-0">Rp. <?= number_format($harga_total)?>/0.5Kg</p>
              <?php }?>
            </div>
          </div>
        </a>
      </div>
      <?php }?>
    </div>
  </div>
</section>