<?php
define('HOST','mysql.idhostinger.com');
 define('USER','u985167226_ts');
 define('PASS','Satriawan99');
 define('DB','u985167226_sch');

	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

	$hari = $_REQUEST['hari'];
	$kode_guru = $_REQUEST['kode_guru'];
 
	$sql ="SELECT `j`.`kode_kelas` Kelas, `m`.`nama_mapel` Mapel, `j`.`jam_ke` Jam
FROM `jadwal` j INNER JOIN `guru_mapel` gm ON j.`kode_guru` = gm.`kode_guru`
INNER JOIN `guru` g ON gm.`kode_guru` = g.`kode_guru`
INNER JOIN `mapel` m ON gm.`kode_mapel` = m.`kode_mapel`
WHERE `j`.`hari` = '$hari' AND  g.`kode_guru` = '$kode_guru' ORDER BY `j`.`jam_ke` ASC";

	$result = mysqli_query($con,$sql);
	$r = array(); 
	while($row = mysqli_fetch_array($result)){ 
		array_push($r,array( 
		"Kelas"=>$row['Kelas'],
		"Mapel"=>$row['Mapel'],
		"Jam"=>$row['Jam']
		));
	}
	echo json_encode($r);
	mysqli_close($con);
?>