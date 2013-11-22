<?php

include_once("connect.php");



$name = $_POST['name'];
$email = $_POST['email'];
$password1=$_POST['password1'];
$password2 = $_POST['password2'];



if($password1 ==  $password2 ){ // Daca sunt egale permit Register

	
	$sir ="INSERT INTO user (Nume ,Email ,Parola ) values('$name','$email','$password1')";
	 $result = mysql_query($sir,$link); // $ result nu este obligatoriu sa il pun la comenzi insert sau delete !!! in register aici.
	 echo 'Felicitari v-ati inregistrat' ;
	
	
	
	
		
	
	
}else{
	
	echo 'Parolele nu Coincid !!!';	
	
}


?>