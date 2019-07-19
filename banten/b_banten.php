<?php
	include '../connect.php';
	$sarid = $_POST['bid'];
	$uid = $_POST['uid'];
	$price = $_POST['harga'];
	$jum = $_POST['jumlah'];
	$total = $price*$jum;

	$qins = "INSERT INTO order_product (id_sarana, user_id, jumlah, price_product, price_total) VALUE ('$sarid', '$uid', '$jum', '$price', '$total')";
	if ($conn->query($qins) === TRUE) {
		header("location: ../user");
	}else{
		echo "Gagal Daftar, Periksa Koneksi";
		echo $sarid;
		echo $uid;
		echo $price;
		echo $jum;
	}
?>