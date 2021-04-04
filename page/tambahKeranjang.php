<?php
  if ($_POST['act'] == 'tambah') {
    $id = $_POST['id'];
    // echo $id;
    $qty = 1;

  //Mengecek produk sudah siap
  //jika produk sudah di keranjang maka bertambah 1 , jika belum maka masuk ke record
    if (isset($_SESSION['items'][$id])) {
      $_SESSION['items'][$id] += $qty;
    }
    echo"<script>document.location.href='keranjang'</script>";
  }else if ($_POST['act'] == 'kurang') {
    $id = $_POST['id'];
    // echo $id;
    $qty = 1;

  //Mengecek produk sudah siap
  //jika produk sudah di keranjang maka bertambah 1 , jika belum maka masuk ke record
    if (isset($_SESSION['items'][$id])) {
      $_SESSION['items'][$id] -= $qty;
    }
    echo"<script>document.location.href='keranjang'</script>";
  }
?>