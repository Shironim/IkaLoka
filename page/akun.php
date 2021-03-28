<?php
  $users = mysqli_query($conn,"SELECT * FROM user WHERE email = '$_SESSION[email]'");
  // echo $_SESSION['id_user'];
  $user = mysqli_fetch_array($users);
?>
<div class="container-xl container-md container-sm container mt-4">
  <div class="row mb-5 justify-content-center">
    <div class="col-lg-8 col-md-6 col-sm-12 col-12 mb-4 px-sm-0 px-md-3">
      <div class="profile text-center">
        <!-- <div class="img"><img class="rounded-circle" style="width: 100px; height: 100px;" src="asset/img/1.jpg"
            alt=""></div> -->
        <p class="fs-4 mt-3">Hai <?= $user['nama']?></p>
        <!-- <button class="btn btn-dark mt-2">Edit Profile</button> -->
      </div>
      <form method="POST" action="">
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
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly placeholder="contoh@ikaloka.com" value="<?= $user['email']?>">
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
        <button type="submit" name="submit" class="btn btn-dark w-100">Perbarui Data</button>
      </form>
      <?php
        if (isset($_POST['submit'])) {
          $nm_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
          $telp = mysqli_real_escape_string($conn, $_POST['telp']);
          $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
          $kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
          $kota = mysqli_real_escape_string($conn, $_POST['kota']);
          $kd_pos = mysqli_real_escape_string($conn, $_POST['kd_pos']);

          $query = mysqli_query($conn,"UPDATE user SET
          nama = '$nm_lengkap',
          telp = '$telp',
          alamat = '$alamat',
          kecamatan = '$kecamatan',
          kota = '$kota',
          kd_pos = '$kd_pos'
          WHERE id_user = '".$_SESSION['id_user']."'") or die(mysqli_error());

          if($query){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            echo"<script>document.location.href='akun'</script>";
          }else{
            // mysqli_connect_errno();
            echo "gagal";
          }
        }
      ?>
    </div>
  </div>
</div>