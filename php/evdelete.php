<?php
    include 'connect.php';
    echo "masuk";
    $id = $_GET['data_id'];

    $sql = "DELETE FROM event WHERE event_id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("location: user.php");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>