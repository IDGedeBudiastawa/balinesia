<?php
	include '../connect.php';
	$id = $_POST['order_id'];
	$file_name = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $fotobaru = date('dmYHis').$file_name;
    $path = "bukti/".$fotobaru;

    move_uploaded_file($tmp, $path);

    $upd = "UPDATE order_product SET order_path= '$path' WHERE order_id = '$id'";
    mysqli_query($conn, $upd);
    
    header('location: keranjang.php');
?>