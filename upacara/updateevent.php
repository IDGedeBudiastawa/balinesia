<?php
    include '../php/connect.php';

    $data_id = $_POST["event_id"];
    $kategori = $_POST["kategori"];
    $navent = $_POST["navent"];
    $date = $_POST["date"];
    $desvent = $_POST["desvent"];
    $price = $_POST["price"];
    $slotmember = $_POST["slotmember"];    
    $place = $_POST["place"];

    $upd = "UPDATE event SET evkat_id='$kategori', event_nama='$navent', des_event='$desvent', price_ev='$price', slot_member='$slotmember', ev_place='$place', ev_date='$date' WHERE event_id='$data_id'";
    mysqli_query($conn, $upd);
    header('location: ../user/v_upacara.php');
?>