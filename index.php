<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" "http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8" />
<title>Vente en ligne</title>
<link rel="stylesheet" type="text/css" href="style.css"
/>
</head>

<body>
<?php include ('entete.php') ?>
<table width="100%">
<tr>
<td width="22%" valign="top">
<div id="categories">
<?php require_once("categories.php") ?>
</div>
</td>
<td width="78%">
<div id="contenu" "contenu" align="left">
<?php
if(isset($_GET['panier']))
require_once("panier.php");
else
require_once("produits.php")
?>
</div>
</td>
</tr>
</table>
</body>
</html>