// JavaScript Document
$(document).ready(function(e) {
      
   
$('#LoginId').submit(function(e) {
    

e.preventDefault(); // previne saltul din pagina pe care am pus eu la action adica ramane in pagina .

$.post('login.php',$(this).serialize(),fn_Login ); //apelez functia fn_Raspuns
//'login.php' este pagina catre care trimit 
//$(this).serialize() sunt parametri pe care ii trimit (variabilele name din formular login )
// fn_Raspuns este functie definita de mine care trateaza raspunsul care vine din login.php
function fn_Login (Login){	
	if( Login == 'Succes'){ // daca Loginul e corect atunci ascund formularu 
		alert(Login);
		$('#LoginId').hide(2000);//ascunde casutele cu intarziere 
		$('#Myname').val('');//golesc campurile
		$('#Mypassword').val('');//golesc campurile
		window.location.href="index.php";// redirect catre index.php dupa logare
		
		
		
	}else{ // daca loginu este incorect atunci afisez raspunu din login php 
		
		alert(Login);	
		
	}
						};
	
								});//End #LoginId



$('#RegisterId').submit(function(e) {

  e.preventDefault();  // previne saltul din pagina pe care am pus eu la action adica ramane in pagina .
   $.post('register.php',$(this).serialize(),fn_Register); // $.post functie ajax care trimite care register.php
   //this.serialize = trimite toate variabilele din formular catre register php
   function fn_Register(Register){ 
	   	if(Register == 'Felicitari v-ati inregistrat' ){ // daca sa inregistrat useru sterg toate valorile din formular 
				alert(Register);
				$('#name').val('');//golesc campurile
				$('#email').val('');//golesc campurile
				$('#password1').val('');//golesc campurile
				$('#password2').val('');//golesc campurile	
				window.location.href="index.php";// redirect catre index.php dupa Registrare
				
			
		}
		
		
		
		

	   							};
   
								 });


});//End DocumentRedy