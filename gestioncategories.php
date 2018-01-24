<?php require_once("connection.php")?>
<?php
session_start();
$req="select * from CATEGORIES";
$rsCat=mysql_query($req) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content "Content-Type" content content="text/html; charset charset=utf-8" />
<title>Gestion des categories</title>
<link rel="stylesheet" type="text/css" href="style1.css" />
<script language="javascript">
function confirmation(idCat){
var rep=confirm("Etes vous sÃ»re de vouloir supprimer cette catÃ©gorie ?");
if(rep==true){
document.location="supprimerCategorie.php?idCat="+idCat
}
}
</script>
</head>
<body>
<?php require_once("entete.php") ?>
<div id="formCategories" align="center">
<form method="post" action="addCategogie.php">
<table>
<tr>
<td>Nom Categorie:</td>
<td><input type="text" name="nomCat" /></td>
</tr>
<tr>
<td>Description:</td>
<td><textarea name="description" rows="3" cols="50"></textarea></td>
</tr>
<tr>
<td><input type="submit" value="ajouter" /></td>
</tr>
</table>
</form>
</div>
<div id="listeCategories" align="center">
<table border="1">
<tr>
<th>CODE CAT</th><th>NOM CAT</th><th>Description</th>
</tr>
<?php while($cat=mysql_fetch_assoc($rsCat)){?>
<tr>
<td><?php echo($cat['CODE_CAT'])?></td>
<td><?php echo($cat['NOM_CAT'])?></td>
<td><?php echo($cat['DESCRIPTION'])?></td>
<td>
<a href="javascript:confirmation(<?php echo($cat['CODE_CAT'])?>)">
Supprimer
</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>