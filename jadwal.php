<?php
define('HOST','mysql.idhostinger.com');
 define('USER','u985167226_ts');
 define('PASS','Satriawan99');
 define('DB','u985167226_sch');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

	$hari = $_REQUEST['hari'];
	$kelas = $_REQUEST['kelas'];
 
	$sql ="SELECT `m`.`nama_mapel` Mapel, `g`.`nama_guru` Guru, `j`.`jam_ke` Jam, `g`.`gambar` Gambar FROM `jadwal` j INNER JOIN `guru_mapel` gm ON j.`kode_guru` = gm.`kode_guru`
INNER JOIN `guru` g ON gm.`kode_guru` = g.`kode_guru`
INNER JOIN `mapel` m ON gm.`kode_mapel` = m.`kode_mapel`
WHERE `j`.`hari` = '$hari' AND `j`.`kode_kelas` = '$kelas' ORDER BY `j`.`jam_ke` ASC";

	$result = mysqli_query($con,$sql);
	$r = array(); 
	while($row = mysqli_fetch_array($result)){ 
		array_push($r,array( 
		"Mapel"=>$row['Mapel'],
		"Guru"=>$row['Guru'],
		"Jam"=>$row['Jam'],
		"Gambar"=>$row['Gambar']
		));
	}
	echo json_encode($r);
	mysqli_close($con);	
?>
			