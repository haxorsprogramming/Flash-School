<?php
@session_start();
session_destroy();

if ($_GET['page'] == "admin") {
	echo '<script language="javascript"> 
 		window.location="index.php";  
 		</script>';
}



if ($_GET['page'] == "siswa") {
	echo '<script language="javascript"> 

 		window.location="index.php"; 
 
 		</script>';
}
if ($_GET['page'] == "guru") {
	echo '<script language="javascript"> 

 		window.location="index.php"; 
 		</script>';
}
