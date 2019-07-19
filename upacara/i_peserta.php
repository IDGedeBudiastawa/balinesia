<?php
	include '../connect.php';
	session_start();
    $myusername = $_SESSION['login_user'];
    $user_pass = $_SESSION['login_pass'];
    $get_user = "SELECT * FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
    $id = $row['user_id'];

	$data_id = $_POST['data_id'];
	$fullname = $_POST['fullname'];
	$panggilan = $_POST['panggilan'];
	$alamat = $_POST['alamat'];
	$phone = $_POST['no_telpon'];
	$lahir = $_POST['tanggal_lahir'];
	$usia = $_POST['usia'];
	$jk = $_POST['jenis_kelamin'];
	$ktp = $_POST['no_KTP'];
	$email = $_POST['email'];

	$query = "INSERT INTO peserta (event_id, user_p_id, fullname, panggilan, alamat, phone, lahir, usia, jk, ktp, email) VALUE ('$data_id', '$id', '$fullname', '$panggilan', '$alamat', '$phone', '$lahir', '$usia', '$jk', '$ktp', '$email')";
	if ($conn->query($query) === TRUE) {
		header("location: ../index.php");
	}
	else{
		echo "Periksa Koneksi Anda !";
	}
?>