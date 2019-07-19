<?php
	include '../connect.php';
	$id = $_GET['data_id'];
	$upd = "UPDATE order_product SET order_status = 1 WHERE order_id = '$id'";
	mysqli_query($conn, $upd);
	$getdata = "SELECT * FROM order_product WHERE order_id = '$id'";
	$result = $conn->query($getdata);
    $row = $result->fetch_assoc();
    $sarid = $row['id_sarana'];
    $jum = $row['jumlah'];
    $getsar = "SELECT * FROM sarana WHERE sarana_id = '$sarid'";
    $resultsar = $conn->query($getsar);
    $rowsar = $resultsar->fetch_assoc();
    $stock = $rowsar['stock_sar'];

    $stocknew = $stock - $jum;
    $upsar = "UPDATE sarana SET stock_sar = '$stocknew'";
    mysqli_query($conn, $upsar);
    header('location: banten_valid.php');
?>