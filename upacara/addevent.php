<?php
    include '../php/connect.php';

    $uid = $_POST["uid"];
    $kategori = $_POST["kategori"];
    $navent = $_POST["navent"];
    $date = $_POST["date"];
    $desvent = $_POST["desvent"];
    $price = $_POST["price"];
    $slotmember = $_POST["slotmember"];    
    $place = $_POST["place"];
    $file_name = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    $jumlah = count($_FILES['gambar']['name']);
    

    $ins = "INSERT INTO event (evkat_id, user_id, event_nama, des_event, price_ev, slot_member, ev_place, ev_date) VALUE ('$kategori', '$uid', '$navent','$desvent','$price','$slotmember', '$place', '$date')";
    if ($conn->query($ins) === TRUE) {
        $last_id = $conn->insert_id;
        // $query = "SELECT * FROM event WHERE (user_id = '$uid' AND event_nama = '$navent') AND ev_date = '$date'";
        // $konek = $conn->query($query);
        // $row = $konek->fetch_assoc();
        // $data_id = $row['event_id'];
        //header("location: ../user/v_upacara.php");
    } else {
        echo("Periksa Koneksi Anda !");
    }

    if ($jumlah > 0) {
        for ($i=0; $i < $jumlah; $i++) {
            $file_name = $_FILES['gambar']['name'][$i];
            $tmp_name = $_FILES['gambar']['tmp_name'][$i];

            $fotobaru = date('dmYHis').$file_name;

            $path = "uploadupacara/".$fotobaru;

            move_uploaded_file($tmp_name, $path);

            mysqli_query($conn,"INSERT INTO fot_event (event_id, url_event) VALUE ('$last_id', '$path')");               
        }
        header("location: selectform.php?data_id=$last_id");
        //echo "Berhasil Upload";
    }
    else{
        echo "Gambar tidak ada";
    }
?>