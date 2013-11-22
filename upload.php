<?php
$folder="img/"; // declar numele directorului cu poze
$allowedExts = array("gif", "jpeg", "jpg", "png"); // vectorul cu extensii permise
$marime=2000000; // marimea maxima admisa in bytes pentru un fisier

$vector = explode(".", $_FILES["file"]["name"]); // fac vector separand elementele dupa semnul "."
$extension = end($vector); //selectez ultimul element din vector ca sa aflu extensia

if ($_FILES["file"]["size"] < $marime && in_array($extension, $allowedExts)) // verific marimea si extensia permisa
  {
  if ($_FILES["file"]["error"] > 0) // in caz de eroare la upload
    {
    echo "Eroare: " . $_FILES["file"]["error"] . "<br>";
    }
  else // daca nu e eroare
    {
    if (file_exists($folder . $_FILES["file"]["name"])) // verifica daca fisierul exista deja
      {
      	echo $_FILES["file"]["name"] . " exista. ";
      }
    else //fisierul nu exista
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], $folder . $_FILES["file"]["name"]);
      echo "Fisierul a fost salvat in: " . $folder . $_FILES["file"]["name"];
      }
    }
  }
else // fisier prea mare sau extensie nepermisa
  {
  	echo "Fisier invalid";
  }
?>