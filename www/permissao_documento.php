<?
$usuario = $_COOKIE["root"];
if ((empty($usuario)) || (strcmp($usuario, "valido") != 0)){
	header("Location: index.php"); 
}
?>