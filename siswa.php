<?php
 define('HOST','mysql.idhostinger.com');
 define('USER','u985167226_ts');
 define('PASS','Satriawan99');
 define('DB','u985167226_sch');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values
 $nis = $_REQUEST['nis'];
// $kelas = $_REQUEST['kelas'];

 //Creating sql query
 $sql = "SELECT * FROM  siswa WHERE  NIS =  '$nis' ";

 //executing query
 $result = mysqli_query($con,$sql);

 //fetching result
 $check = mysqli_fetch_array($result);

 
/*  $result = mysql_query("SELECT * FROM index");
$row = mysql_fetch_array($result);
echo $row['title']; */
 
 //if we got some result
 if(isset($check)){
		echo "sucses";
		echo "#";
		echo $check['NIS'];
		echo "#";
		echo $check['nama_siswa'];
		echo "#";
		echo $check['kode_kelas'];

 }else{
 //displaying failure
 echo "failure";
 }
 mysqli_close($con);
 }
?>