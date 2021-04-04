<?php 
  require_once('../konfig/konfig.php');
  $users = mysqli_query($conn,"SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'");
  $user = mysqli_fetch_array($users);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('../component/meta.php')?>
</head>

<body>
  <?php require_once('../component/header.php')?>

  <main id="root" class="mt-5">
    <div class="container-xl container-md container-sm container">
      <form action="" method="POST" class="row mb-5">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4 px-sm-0 px-md-3">
          <h3 class="fs-4">Detail Pengiriman</h3>
          <div class="border p-3 rounded">
            <div class="mb-3">
              <label for="Nama_Lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Ika Loka" value="<?= $user['nama']?>">
            </div>
            <div class="mb-3">
              <label for="Nomor_Telp" class="form-label">Nomor Telephone</label>
              <input type="text" name="telp" class="form-control" id="nomor_telp" placeholder="0891-8988-2234" value="<?= $user['telp']?>">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly placeholder="contoh@ikaloka.com" value="<?= $user['email']?>">
            </div>
            <div class="mb-3">
              <label for="floatingTextarea">Alamat Pengiriman</label>
              <input type="text" class="form-control" placeholder="Jl. Taman Kendalisada no 8A"
                id="alamat_pengiriman" name="alamat" value="<?= $user['alamat']?>"></input>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="inputCity" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" id="inputCity" placeholder="Kota Semarang" value="<?= $user['kota']?>">
              </div>
              <div class="col-6">
                <label for="inputState" class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" id="inputCity" placeholder="Candisari" value="<?= $user['kecamatan']?>">
              </div>
            </div>
            <div class="mb-3">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" name="kd_pos" class="form-control" id="inputZip" placeholder="50252" value="<?= $user['kd_pos']?>">
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <h3 class="fs-4">Metode Pembayaran</h3>
          <div class="row">
            <div class="rounded border p-3 mb-4">
              <div class="d-flex flex-row mb-3">
                <i class="fs-4 fas fa-wallet me-2"></i>
                <span>Cash On Delivery</span>
                <input class="form-check-input ms-auto align-self-center" type="radio" name="flexRadioDefault"
                  id="flexRadioDefault2" checked>
              </div>
              <div class="form-text"><i class="fas fa-exclamation-circle me-2"></i>Bayar Dirumah Saat pesanan sudah
                sampai</div>
            </div>
            <h3 class="fs-4">Belanjaan Anda</h3>
            <div class="produk">
              <div class="row mb-3 he-60 justify-content-between">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                  <p class="fs-5 m-0 text-center">#</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-3">
                  <p class="fs-5 m-0 text-center">Produk</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                  <p class="fs-5 m-0 text-center">Jumlah</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                  <p class="fs-5 m-0 text-center">Harga</p>
                </div>
              </div>
              <?php
                foreach ($_SESSION['items'] as $key => $val) {
                  $produks = mysqli_query($conn,"SELECT * from produk WHERE id_produk='$key'");
                  $produk = mysqli_fetch_array($produks);
                  // ambil harga per produk
                  $harga = $produk['harga'];
                  // echo $harga;
                  echo "</br>";
                  if ($produk['diskon'] > 0) {
                    $diskon = $produk['diskon']*$harga/100;
                    // echo $diskon;
                    // echo "</br>";
                  }else{
                    $diskon = 0;
                  }
                  // harga yang dibayarkan per satuan produk
                  $harga_total = $harga - $diskon;
                  // echo $harga_total;
                  // echo "</br>";
                  $harga_total_rp = number_format($harga_total);
                  $subtotal = $harga_total*$val;
                  $subtotal_rp = number_format($subtotal);
                  $kilo = $produk['satuan'] * $val;
                  @$total = $total + $subtotal;
                  $total_rp = number_format($total);
                  $total_bayar = number_format(10000 + $total);
                ?>
              <div class="row mb-3 he-60 justify-content-between">
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 text-center">
                  <img class="img-fluid w-auto he-60"
                    src="<?= base_url('asset/img/'.$produk['gambar'])?>" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-3">
                  <p class="fs-5 m-0"><?= $produk['nama_produk']?></p>
                  <p class="fs-6 m-0"><?= $harga_total_rp?>/kg</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-3 text-center">
                  <p class="fs-5 m-0"><?= $kilo?> Kg</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 text-end">
                  <p class="fs-5 m-0">Rp. <?= $subtotal_rp?></p>
                </div>
              </div>
              <?php }?>
            </div>
            <hr>
            <div class="row">
              <div class="subtotal d-flex justify-content-between">
                <span class="fs-5">Subtotal</span>
                <span class="fs-5">Rp. <?= $total_rp?></span>
              </div>
            </div>
            <div class="row">
              <div class="subtotal d-flex justify-content-between">
                <span class="fs-5">Biaya Pengiriman</span>
                <span class="fs-5">Rp. 10.000</span>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="subtotal d-flex justify-content-between">
                <span class="fs-4">Total</span>
                <span class="fs-4 fw-bold">Rp. <?= $total_bayar?></span>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="bayar" class="btn btn-dark mt-4">Bayar</button>
      </form>
      <?php
        $_SESSION['total_bayar'] = $total + 10000;
        if (isset($_POST['bayar'])) {
          if (empty($_POST['nama_lengkap']) || empty($_POST['telp']) || empty($_POST['email']) || empty($_POST['alamat'])|| empty($_POST['kota'])|| empty($_POST['kecamatan']) || empty($_POST['kd_pos'])) {
            echo "<script>alert('mohon lengkapi detail pengiriman');</script>";
          }else{
            mysqli_query($conn,"UPDATE user SET
            telp = '$_POST[telp]',
            alamat = '$_POST[alamat]',
            kota = '$_POST[kota]',
            kecamatan = '$_POST[kecamatan]',
            kd_pos = '$_POST[kd_pos]'

            WHERE id_user = '$_SESSION[id_user]'

            ");
            
            foreach ($_SESSION['items'] as $key => $val) {
              $produks = mysqli_query($conn,"SELECT * from produk WHERE id_produk='$key'");
              $produk = mysqli_fetch_array($produks);
              $stok = $produk['stok'] - $val;
              $harga = $produk['harga'];
              if ($produk['diskon'] > 0) {
                $diskon = $produk['diskon']*$harga/100;
              }else{
                $diskon = 0;
              }
              // harga yang dibayarkan per satuan produk
              $harga_total = $harga - $diskon;
              $subtotal = $harga_total*$val;
              mysqli_query($conn,"INSERT INTO detailpesanan(id_user,id_produk,jumlah,total_harga,status,tanggal) VALUES('$_SESSION[id_user]','$key','$val','$_SESSION[total_bayar]','B',NOW())");
              mysqli_query($conn,"UPDATE produk SET
                stok = '$stok'
  
                WHERE id_produk = '$key'
              ");
              // echo $val;
              // echo "</br>";
              if (isset($key)) {
                if (isset($_SESSION['items'][$key])) {
                  unset($_SESSION['items'][$key]);
                  unset($_SESSION['total_bayar']);
                }
              }
            }
            echo"<script>alert('Pembelian Berhasil')</script>";
            echo"<script>document.location.href='home'</script>";
          }
        }
      ?>
    </div>
  </main>

  <?php require_once('../component/script.php')?>
</body>

</html>