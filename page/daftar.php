<?php require_once('../konfig/konfig.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('../component/meta.php')?>

</head>

<body>
  <?php require_once('../component/headerLogin.php')?>

  <main id="root" class="mt-5">
    <div class="container">
      <div class="row justify-content-sm-center justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-11 col-11 ">
          <div class="border rounded shadow-sm col-12">
            <form method="POST" action='' class="p-4">
              <div class="d-flex justify-content-center flex-column mb-4">
                <h3 class="fs-4 text-center">Daftar Sekarang</h3>
                <p class="text-center fs-6">Sudah punya akun ? <a href="login" class="text-decoration-none">Login</a></p>
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
                <div id="pwddHelp" class="form-text">Masukan kata sandi baru</div>
              </div>
              <button type="submit" name="submit" class="btn btn-primary fw-bold w-100">Selanjutnya</button>
              <!-- <div class="sdk">
                <p class="text-center mt-3 p-0 m-0">Dengan Mendaftar Saya Menyetujui</p>
                <p class="text-center p-0 m-0"><strong class="text-primary">Syarat dan Ketentuan</strong> serta <strong class="text-primary">Kebijakan Privasi</strong></p>
              </div> -->
            </form>

            <?php
              if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $nm_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
                $password = password_hash("$_POST[password]",PASSWORD_DEFAULT);
                $log = mysqli_query($conn,"SELECT email FROM user WHERE email = '$email'");

                // echo $log['email'];
                if (mysqli_num_rows($log) == 0) {
                  $SQL ="INSERT INTO user (nama,email,password,bergabung,telp,alamat,kota,kecamatan,kd_pos) VALUES('$nm_lengkap','$email','$password',NOW(),'','','','','')";
                  $query = mysqli_query($conn,$SQL) or die(mysqli_error($conn));
                  if (!$query) {
                    echo "Not Inserted";
                  } else {
                    // echo "INSERTED!ss";
                    $fetchlog = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'"));
                    $_SESSION['email'] = $email;
                    $_SESSION['nama'] = $nm_lengkap;
                    $_SESSION['id_user'] = $fetchlog['id_user'];
                    echo"<script>alert('Berhasil daftar, Selamat Bergabung')</script>";
                    echo"<script>document.location.href='home'</script>";
                  }
                }else{
                  echo"<script>alert('email sudah ada, silakan login')</script>";
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php require_once('../component/footerLogin.php')?>
  <?php require_once('../component/script.php')?>
</body>

</html>