<?php
	include '../connect.php';

	$kec_id = $_POST['kec_id'];
	$sql_kel = mysqli_query(
		$conn, "SELECT * FROM kelurahan WHERE kec_id = $kec_id"
	);
	//echo($kab_id);

	echo '<option value="pilih">--- Pilih Kelurahan ---</option>';
	// echo '<option value="pilih">'.$kab_id.'</option>';
	while($rowkel = mysqli_fetch_array($sql_kel)){
		echo '<option value="'.$rowkel['kel_id'].'">'
		.$rowkel['kel_nama'].
		'</option>';
	}
?>