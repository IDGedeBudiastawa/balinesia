<?php
    include '../php/connect.php';
    echo "masuk";
    $id = $_GET['data_id'];

    $sql = "DELETE FROM sarana WHERE sarana_id ='$id'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../user/v_banten.php");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>