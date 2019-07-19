<?php
    include '../php/connect.php';

    $uid = $_POST["uid"];
    $kategori = $_POST["kategori"];
    $sarnama = $_POST["sarnama"];
    $dessar = $_POST["dessar"];
    $alamat = $_POST["alamat"];
    $stocksar = $_POST["stocksar"];
    $price = $_POST["price"];
    $pilih = $_POST["pilih"];
    $file_name = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    $jumlah = count($_FILES['gambar']['name']);

    $ins = "INSERT INTO sarana (sarkat_id, user_id, sar_nama, des_sar, dibuat, stock_sar, sar_price, pilihan) VALUE ('$kategori', '$uid', '$sarnama','$dessar', '$alamat', '$stocksar', '$price', '$pilih')";
    if ($conn->query($ins) === TRUE) {
        //header("location: ../user/v_upacara.php");
        $query = "SELECT * FROM sarana WHERE (user_id = '$uid' AND sar_nama = '$sarnama') AND des_sar ='$dessar'";
        $konek = $conn->query($query);
        $row = $konek->fetch_assoc();
        $data_id = $row['sarana_id'];
    } else {
        echo("Periksa Koneksi Anda !");
    }

    if ($jumlah > 0) {
        for ($i=0; $i < $jumlah; $i++) {
            $file_name = $_FILES['gambar']['name'][$i];
            $tmp_name = $_FILES['gambar']['tmp_name'][$i];

            $fotobaru = date('dmYHis').$file_name;

            $path = "uploadbanten/".$fotobaru;

            move_uploaded_file($tmp_name, $path);

            mysqli_query($conn,"INSERT INTO fot_sar (sarana_id, url_sarana) VALUE ('$data_id', '$path')");
        }
        header("location: ../user/v_banten.php");
        //echo "Berhasil Upload";
    }
    else{
        echo "Gambar tidak ada";
    }
?>