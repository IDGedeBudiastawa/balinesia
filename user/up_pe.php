<?php
	include '../connect.php';
	$id = $_POST['pes_id'];
	$file_name = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $fotobaru = date('dmYHis').$file_name;
    $path = "bukti/".$fotobaru;

    //echo $path;

    move_uploaded_file($tmp, $path);

    $upd = "UPDATE peserta SET peserta_path = '$path' WHERE peserta_id = '$id'";
    mysqli_query($conn, $upd);
    
    header('location: status_pendaftar.php');
?>