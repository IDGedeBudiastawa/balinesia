<?php
	include '../connect.php';
	$id = $_GET['data_id'];
	$upd = "UPDATE peserta SET status = 1 WHERE peserta_id = '$id'";
	mysqli_query($conn, $upd);
	$getdata = "SELECT * FROM peserta WHERE peserta_id = '$id'";
	$result = $conn->query($getdata);
    $row = $result->fetch_assoc();
    $eid = $row['event_id'];
    $getsar = "SELECT * FROM event WHERE event_id = '$eid'";
    $resultsar = $conn->query($getsar);
    $rowsar = $resultsar->fetch_assoc();
    $stock = $rowsar['slot_member'];

    $stocknew = $stock - 1;
    $upsar = "UPDATE event SET stock_sar = '$stocknew'";
    mysqli_query($conn, $upsar);
    header('location: peserta_valid.php');
?>