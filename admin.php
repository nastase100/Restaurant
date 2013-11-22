<?php  $pagetitle = "Admin" ; ?>
<?php include_once("/includes/top.php"); ?>
<body>

<div id="content">
	<?php  include_once ("/includes/left.php");?>
   
    
    
    <div id="my_mainContent">
   		
        <?php 
		 if(isset($_COOKIE['NumeCookie'])){// verific daca exista cookie numecookie adica daca useru este logat
			
			$nivelUser=$_COOKIE['nivelUser']; // preiau niveluser din cookie
			if ($nivelUser==1) // e admin
			
			{ // start cod administrator
				if (isset($_GET['st'])) // am id stergere produs
				{
					$deSters=$_GET['st']; // preiau id-ul produsului de sters
					
					$sir="delete from comenzi where ID_Produs='$deSters'";
					mysql_query($sir);	// sterg produsul din comenzi
					
					$sir="delete from produse where ID='$deSters'";
					mysql_query($sir); // sterg produsul din produse
					
					echo "Produsul a fost sters din baza de date";
					
				}

				?>
					Produse :	
				
			<table cellpadding="5" border='0'>
                <tr>
              		<th>Poza</th>
                    <th>Denumire</th>
                    <th>Gramaj</th>
                    <th>Pret</th>
                    <th>Stergere</th>
                </tr>
                
        	<?php
			    $sir="select * from produse ";
				$result=mysql_query($sir);
				while($row=mysql_fetch_array($result)){
					
			?>
            
            
                <tr>
                	<td align="center"><a href="<?php echo $row['Poza'] ?> " target="_new" title="Click pentru Poza marita"><img src="<?php echo $row['Poza'] ?>" style="height:100px; width:100px;"></a></td>
                    <td align="center">   <?php echo $row['Denumire'];?>   </td>
                    <td align="center">   <?php echo $row['Gramaj'];?>     </td>
                    <td align="center">   <?php echo $row['Pretul'];?>     </td>
                
                    <td align="center" id="comanda">  <a href="admin.php?st=<?php echo $row['ID'];?>" title="Sterge produsul">Sterge</a>   </td>
                                   	
                </tr>   
                
               <?php } ?>
				
				</table>				
				
				
				
				
				
			<?php	
				
			// end cod administrator
			}
			else // Nu e admin
				
				echo "<h2> Trebuie sa fiti administrator  </h2>";
			
			

			
			} 
			
		else{ // Terminare verificare existenta cookie 
			
			
				echo "<h2> Trebuie sa va logati  </h2>";
			
			
		}
			 ?>
        
        
    </div>


 <?php include_once('/includes/right.php');?>
  
 
  <?php  include_once ("/includes/footer.php");?>
	

</div> <!--End Content-->



  
</body>
</html>
