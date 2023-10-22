<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'secretaria' and @$_SESSION['nivel_usuario'] != 'Admin'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
}
 ?>