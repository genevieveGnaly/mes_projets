<?php
session_start();
$panier=$_SESSION['panier'];
$index=$_GET['index'];
unset($panier[$index]);
$_SESSION['panier']=$panier;
header("location:index.php?panier=1");
?>