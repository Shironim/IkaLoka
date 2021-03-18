<?php require_once('../config/_config.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('../component/meta.php')?>

</head>

<body>
  <?php require_once('../component/_header.php')?>

  <main id="root" class="mt-5">
    <div class="container">
      <div class="row justify-content-sm-center justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-11 col-11 ">
          <div class="border rounded shadow-sm col-12">
            <form class="p-4">
              <div class="d-flex justify-content-center flex-column mb-4">
                <h3 class="fs-4 text-center">Daftar Sekarang</h3>
                <p class="text-center">Sudah punya akun ? <a href="<?=base_url('page/login.php')?>" class="text-decoration-none">Login</a></p>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="" placeholder="Ika Loka">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="" placeholder="admin@ikaloka.id">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control" id="" placeholder="*********">
                <div id="pwddHelp" class="form-text">Masukan minimal 8 karakter untuk kata sandi baru</div>
              </div>
              <button type="submit" class="btn btn-primary fw-bold w-100">Selanjutnya</button>
              <div class="sdk">
                <p class="text-center mt-3 p-0 m-0">Dengan Mendaftar Saya Menyetujui</p>
                <p class="text-center p-0 m-0"><strong class="text-primary">Syarat dan Ketentuan</strong> serta <strong class="text-primary">Kebijakan Privasi</strong></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php require_once('../component/_footer.php')?>
  <?php require_once('../component/script.php')?>
</body>

</html>