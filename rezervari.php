
<?php  $pagetitle = "Rezervari" ; ?>
<?php include_once("/includes/top.php"); ?>
<body>


<div id="content">
	<?php  include_once ("/includes/left.php");?>
   
    
    
    <div id="my_mainContent">
    
		<?php 
		    if(isset($_COOKIE['NumeCookie'])){// verific daca exista cookie numecookie adica daca useru este logat
			$idUser=$_COOKIE['idUser']; // preiau iduser din cookie
					if(isset ( $_GET['data']) and isset ($_GET['persoane'])){
					//Am persoane si data rezervarii deci fac rezervare 	
					$persoane = $_GET['persoane'];
					$rezervare = $_GET['data']; 
					$date = date('Y-m-d', strtotime(str_replace('-', '/', $rezervare)));					
					$sir = "INSERT INTO REZERVARI (Id_User,Data ,Persoane) values($idUser,'$date',$persoane)";
					$resultat=mysql_query($sir);
					echo 'Rezervarea a fost facuta';
					}else {
						//Nu fac rezervare 
						?>
                        
                          <h2> Efectuati Rezervarea   </h2>
            <div id="rezervari">
            	<form method="GET" action="rezervari.php" >
                	Alegeti Data Rezervarii<input type="date" name="data"/><br>
                    
                    Numarul de Persoane&nbsp<input type="text" name="persoane"/><br>
                    <input type="submit" value="Rezerva"/>
                
                
                </form>
            
            
            </div>
                        
                        
                        
                        <?php
						
					}
			?>
            
            
          
            
		<?php	
		}else{
			
			//Nu este logat 
			echo '<h2> Trebuie sa va Logati ca sa puteti Rezerva </h2>';	
			
			
		}
			?>
    </div>


 <?php include_once('/includes/right.php');?>
  
 
  <?php  include_once ("/includes/footer.php");?>
	

</div> <!--End Content-->



  
</body>
</html>
