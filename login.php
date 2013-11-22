<?php

include_once("connect.php");

$nume = $_POST['Myname'];
$parola =$_POST['Mypassword'];

$sir = "SELECT ID,Nume,Nivel FROM user WHERE nume ='$nume' and parola = '$parola'";


$result = mysql_query($sir);



if(mysql_num_rows($result) == 1){
	
	$row = mysql_fetch_array($result);//duce rezultatu care stim ca e o singura linie in vectorul $row
	$nume = $row['Nume']; //citesc numele din vector . ['Nume'] = e din tabel
	$idUser = $row['ID']; //citesc ID-UL userului . ['ID'] = e din tabel
	$nivelUser =$row['Nivel']; //citesc nivelul userului . ['Nivel'] = e din tabel
	
	setcookie("NumeCookie",$nume,time()+3600);// creez un cookie care se cheama Nume si pun in el variabila $nume care expira in 3600 s
	setcookie("idUser",$idUser,time()+3600);// creez un cookie care se cheama idUser si pun in el variabila $idUser care expira in 3600 s
	setcookie("nivelUser",$nivelUser,time()+3600);// creez un cookie care se cheama nivelUser si pun in el variabila $nivelUser care expira in 3600 s	 
	
	echo 'Succes';
	

	
}else{
	
	echo 'Invalid Login';
	
}

?>