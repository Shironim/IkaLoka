<?php require_once('../config/_config.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('../component/meta.php')?>
</head>

<body>
  <?php require_once('../component/header.php')?>

  <main id="root" class="mt-5">
  <div class="container-xl container-md container-sm container">
  <div class="row mb-5">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4 px-sm-0 px-md-3">
      <h3 class="fs-4">Detail Pengiriman</h3>
      <form class="border p-3 rounded">
        <div class="mb-3">
          <label for="Nama_Lengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama_lengkap" placeholder="Ika Loka">
        </div>
        <div class="mb-3">
          <label for="Nomor_Telp" class="form-label">Nomor Telephone</label>
          <input type="text" class="form-control" id="nomor_telp" placeholder="0891-8988-2234">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="contoh@ikaloka.com">
          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
          <label for="floatingTextarea">Alamat Pengiriman</label>
          <input type="text" class="form-control" placeholder="Jl. Taman Kendalisada no 8A"
            id="alamat_pengiriman"></input>
        </div>
        <div class="row mb-3">
          <div class="col-6">
            <label for="inputCity" class="form-label">Kota</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Kota Semarang">
          </div>
          <div class="col-6">
            <label for="inputState" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Candisari">
          </div>
        </div>
        <div class="mb-3">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="text" class="form-control" id="inputZip" placeholder="50252">
        </div>
      </form>
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
        <form class="">
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
            <div class="row mb-3 he-60 justify-content-between">
              <div class="col-lg-3 col-md-3 col-sm-3 col-3 text-center">
                <img class="img-fluid w-auto he-60"
                  src="https://dashboard.tumbasin.id/wp-content/uploads/2020/05/Kentang_t.png" alt="">
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-3">
                <p class="fs-5 m-0">Ikan Tuna</p>
                <p class="fs-6 m-0">16.000/0.5kg</p>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-3 text-center">
                <p class="fs-5 m-0">2Kg</p>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-3 text-end">
                <p class="fs-5 m-0">Rp. 32.000</p>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="subtotal d-flex justify-content-between">
              <span class="fs-5">Subtotal</span>
              <span class="fs-5">Rp. 80.000</span>
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
              <span class="fs-4 fw-bold">Rp. 90.000</span>
            </div>
          </div>
        </form>
      </div>
    </div>
    <button class="btn btn-dark mt-4">Bayar</button>
  </div>
</div>
  </main>

  <?php require_once('../component/script.php')?>
</body>

</html>