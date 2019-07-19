<?php
    include '../php/connect.php';

    $data_id = $_POST['data_id'];
    $uid = $_POST["uid"];
    $kategori = $_POST["kategori"];
    $sarnama = $_POST["sarnama"];
    $dessar = $_POST["dessar"];
    $alamat = $_POST["alamat"];
    $stocksar = $_POST["stocksar"];
    $price = $_POST["price"];
    $pilih = $_POST["pilih"];

    $upd = "UPDATE sarana SET sarkat_id='$kategori', sar_nama='$sarnama', des_sar='$dessar', dibuat='$alamat', stock_sar='$stocksar', sar_price='$price', pilihan='$pilih' WHERE sarana_id='$data_id'";

    if ($conn->query($upd) === TRUE) {
        header("location: ../user/v_banten.php");
    } else {
        echo("Periksa Koneksi Anda !");
    }
?>