<?php
    include 'connect.php';

    $kategori = $_POST["kategori"];
    $navent = $_POST["navent"];
    $date = $_POST["date"];
    $desvent = $_POST["desvent"];
    $price = $_POST["price"];
    $slotmember = $_POST["slotmember"];    
    $place = $_POST["place"];

    $ins = "INSERT INTO event (evkat_id, event_nama, des_event, price_ev, slot_member, ev_place, ev_date) VALUE ('$kategori','$navent','$desvent','$price','$slotmember', '$place', '$date')";
    if ($conn->query($ins) === TRUE) {
        header("location: ../php/user.php");
    } else {
        echo("Periksa Koneksi Anda !");
    }
?>