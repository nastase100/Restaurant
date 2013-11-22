<?php
setcookie("NumeCookie","",time()-1);//setez cookie ca fiind expirat
unset($_COOKIE['NumeCookie']); // disctrug (sterg) cookie
header("Location: index.php"); // redirect catre index.php
?>