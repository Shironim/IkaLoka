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
            <form method="POST" action='' class="p-4">
              <div class="d-flex justify-content-center flex-column mb-4">
                <h3 class="fs-4 text-center">Daftar Sekarang</h3>
                <p class="text-center">Sudah punya akun ? <a href="login" class="text-decoration-none">Login</a></p>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="" placeholder="Ika Loka">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="" placeholder="admin@ikaloka.id">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="" placeholder="*********">
                <div id="pwddHelp" class="form-text">Masukan minimal 8 karakter untuk kata sandi baru</div>
              </div>
              <button type="submit" name="submit" class="btn btn-primary fw-bold w-100">Selanjutnya</button>
              <div class="sdk">
                <p class="text-center mt-3 p-0 m-0">Dengan Mendaftar Saya Menyetujui</p>
                <p class="text-center p-0 m-0"><strong class="text-primary">Syarat dan Ketentuan</strong> serta <strong class="text-primary">Kebijakan Privasi</strong></p>
              </div>
            </form>

            <?php
              if (isset($_POST['submit'])) {
                $nm_lengkap = $_POST['nama_lengkap'];
                $email = $_POST['email'];
                $password = password_hash("$_POST[password]",PASSWORD_DEFAULT);

                // if (empty($nm_lengkap) || empty($email) || empty($password)) {
                //   # code...
                // }
                // echo $password;
                $query = mysqli_query($conn,"INSERT INTO user (nama,email,password,bergabung) VALUES('$nm_lengkap','$email','$password',NOW())") or die(mysqli_error());

                if($query){ // Cek jika proses simpan ke database sukses atau tidak
                  // Jika Sukses, Lakukan :
                  $_SESSION['email'] = $email;
                  echo"<script>document.location.href='home'</script>";
                }else{
                  mysqli_connect_errno();
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php require_once('../component/_footer.php')?>
  <?php require_once('../component/script.php')?>
</body>

</html>