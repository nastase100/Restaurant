
<?php  $pagetitle = "Mancaruri Cautate" ; ?>
<?php include_once("/includes/top.php"); ?>
<body>


<div id="content">
	<?php  include_once ("/includes/left.php");?>
   
    
    
    <div id="my_mainContent">
   				<h2>Mancarurile Gasite</h2>
                <?php 
					
					$search = $_GET['cauta'];
					 
					  
		
		$query = "SELECT ID,Denumire,Gramaj,round(Pretul-Pretul*Reducere/100,2) Pretul,Poza FROM PRODUSE WHERE Denumire like '%".$search."%'";//Aduce din tabela produse toate produsele care au denumirea asemanatoare cu continutu din variabila $search .
		$result=mysql_query($query,$link);
		if(mysql_num_rows($result)==0){
		?>
        
        <p>Nu exista Aperitive</p>
        	
        
        <?php
		}else{
			
        ?>
        		<table cellpadding="5">
                <tr>
              		<th>Poza</th>
                    <th>Denumire</th>
                    <th>Gramaj</th>
                    <th>Pret</th>
                    <th>Order</th>
                    </tr>
        	<?php
				while($row=mysql_fetch_array($result)){
					
			?>
            
            
                <tr>
                	<td align="center"><a href="<?php echo $row['Poza'] ?> " target="_new" title="Click pentru Poza marita"><img src="<?php echo $row['Poza'] ?>" style="height:100px; width:100px;"></a></td>
                    <td align="center"><?php echo $row['Denumire']?></td>
                    <td align="center"><?php echo $row['Gramaj']?></td>
                    <td align="center"><?php echo $row['Pretul']?></td>
                    <td align="center" id="comanda"><a href="comanda.php?id= <?php echo $row['ID'];  ?>">Comanda</a></td>
                
                </tr>
                        
	            
            			
			  <?php
				}
				?>
			
	
            
       		
        	</table>
    <?php
	
		}
	
	?>
					 
				
				
				
			
                
                
    </div>


 <?php include_once('/includes/right.php');?>
  
 
  <?php  include_once ("/includes/footer.php");?>
	

</div> <!--End Content-->



  
</body>
</html>
