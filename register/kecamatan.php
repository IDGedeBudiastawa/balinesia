<?php
	include '../connect.php';

	$kab_id = $_POST['kab_id'];
	$sql_kec = mysqli_query(
		$conn, "SELECT * FROM kecamatan WHERE kab_id = $kab_id"
	);
	//echo($kab_id);

	echo '<option value="pilih">--- Pilih Kecamatan ---</option>';
	// echo '<option value="pilih">'.$kab_id.'</option>';
	while($rowkec = mysqli_fetch_array($sql_kec)){
		echo '<option value="'.$rowkec['kec_id'].'">'
		.$rowkec['kec_nama'].
		'</option>';
	}
?>