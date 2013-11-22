<?php  $pagetitle = "Register" ; ?>

<body>
<?php include_once("/includes/top.php"); ?>

<div id="content">
	<?php  include_once ("/includes/left.php");?>
 
   <?php include_once('/includes/right.php');?>
  
  
    <div id="my_mainContent">
    
    
   <div id="FormularRegister">
 
    <form method="post" action="register.php" id="RegisterId">
     <input type="text" name="name" id="name" placeholder="Enter name" required/><br>
     <input type="email" name="email" id="email" placeholder="Enter Email" required/><br>
     <input type="password" name="password1" id="password1" placeholder="Enter Password" required/><br>
      <input type="password" name="password2" id="password2" placeholder="Confirm Password" required/><br>
      <input type="submit" value="Register"/>
    
    
    </form>
  </div><!--End Formular Register-->
  </div><!--End my_mainContent-->
   
  <?php  include_once ("/includes/footer.php");?>

</div> <!--End Content-->



  
</body>
</html>
