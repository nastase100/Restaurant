<?php  $pagetitle = "Comanda" ; ?>
<?php include_once("/includes/top.php"); ?>
<body>

<div id="content">
	<?php  include_once ("/includes/left.php");?>
   
    
    
    <div id="my_mainContent">
   		
        <?php 
		 if(isset($_COOKIE['NumeCookie'])){// verific daca exista cookie numecookie adica daca useru este logat
			$idUser=$_COOKIE['idUser']; // preiau iduser din cookie
			
			if(isset ($_GET['id'])) { //daca pagina este accesata cu id produs 
			// inserez produsul respectiv in cos sau in comanda	
						
			$idProdus=$_GET['id'];// preiau id produs din GET
			//inserez in tabela comenzi produsul comandat de userul logat
			
			$sir="insert into comenzi (ID_User,ID_Produs) values ('$idUser','$idProdus')";
			mysql_query($sir);			
			?>
			Produsul a fost adaugat 	
            <?php
			}else{ // daca pagina nu este accesata cu id produs atunci afisez tot cosul
			
			if(isset($_GET['st'])){ // daca pagina este apelata cu id produs de sters din comanda
				$deSters = $_GET['st'];
				$sir2="DELETE FROM Comenzi Where ID_Comanda = $deSters";
				mysql_query($sir2);
				echo 'Produsul a fost Sters din comanda<br>';
			}
			
			
			
			
			
			?>
			Comanda dumneavoastra este :	
				
			<table cellpadding="5" border='0'>
                <tr>
              		<th>Poza</th>
                    <th>Denumire</th>
                    <th>Gramaj</th>
                    <th>Pret</th>
                    <th>Cantitate</th>
                    <th>Lei</th>
                    <th>Stergere</th>
                </tr>
        	<?php
			    $sir="select ID_Comanda,Poza,Denumire,Gramaj, round(Pretul-Pretul*Reducere/100,2) Pretul,sum(cantitate) Cantitate, sum(cantitate)*round(Pretul-Pretul*Reducere/100,2) Valoare from comenzi C, produse P WHERE C.id_produs=P.id and id_user='$idUser' group by id_produs ";
				$result=mysql_query($sir);
				while($row=mysql_fetch_array($result)){
					
			?>
            
            
                <tr>
                	<td align="center"><a href="<?php echo $row['Poza'] ?> " target="_new" title="Click pentru Poza marita"><img src="<?php echo $row['Poza'] ?>" style="height:100px; width:100px;"></a></td>
                    <td align="center">   <?php echo $row['Denumire'];?>   </td>
                    <td align="center">   <?php echo $row['Gramaj'];?>     </td>
                    <td align="center">   <?php echo $row['Pretul'];?>     </td>
                    <td align="center">   <?php echo $row['Cantitate'];?>  </td>
                    <td align="center">   <?php echo $row['Valoare'];?>    </td>
                    <td align="center" id="comanda">  <a href="comanda.php?st=<?php echo $row['ID_Comanda'];?>" title="Elimina o Portie">Sterge</a>   </td>
                    
                	
                </tr>            

        	
			
			<?php	
			     } // end while
				$sir3= "SELECT sum(cantitate*round(Pretul-Pretul*Reducere/100,2)) Valoare FROM Comenzi c , Produse p WHERE c.id_produs = p.id and id_user =$idUser group by id_user";
				$result = mysql_query($sir3);

				while($row=mysql_fetch_array($result)){
					
					$suma = $row['Valoare'];	
										
				}
				
					if (mysql_num_rows($result)==0) //daca are 0 produse in comanda 
					$suma=0;
				
			?>
            <tr>
            	<td colspan="7" align="center">Total General de Plata = <b><?php echo $suma; ?> RON</b></td>
            	
            </tr>
            </table>
            	 
			<?php	 
			} // else id_produs
			
		}else{ // Terminare verificare existenta cookie 
			
			
				echo "<h2> Trebuie sa va Logati ca sa puteti comanda  </h2>";
			
			
		}
			 ?>
        
        
    </div>


 <?php include_once('/includes/right.php');?>
  
 
  <?php  include_once ("/includes/footer.php");?>
	

</div> <!--End Content-->



  
</body>
</html>
