<?php require_once("connection.php") ?>
<?php
session_start();
$req="select * from CATEGORIES";
$rsCat=mysql_query($req) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion des catÃ©gories</title>
<link rel="stylesheet" type="text/css" href="style1.css" />
</head>
<body>
<?php require_once("entete.php") ?>
<div id="formProduits" align="center">
<form method="post" action="addProduit.php"
enctype="multipart/form-data">
<table>
<tr>
<td>REF Produit: REF Produit:</td>
<td><input type="text" name="refProduit" /></td>
</tr>
<tr>
<td>Designation:</td>
<td><input type="text" name="designation" /></td>
</tr>
<tr>
<td>CatÃ©gorie:</td>
<td>
<select name="idCat">
<?php while($cat=mysql_fetch_assoc($rsCat)){?>
<option value="<?php echo($cat['CODE_CAT'])?>">
<?php echo($cat['NOM_CAT'])?>
</option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td>QuantitÃ©:</td><td><input type="text" name="quantite" /></td>
</tr>
<tr>
<td>Prix:</td><td><input type="text" name="prix" /></td>
</tr>

<tr>
<td>Photo:</td><td><input type="file" name="photo" /></td>
</tr>
<tr>
<td>Disponible:</td><td><input type="checkbox" name="disponible" checked="checked"
/></td>
</tr>
<tr>
<td>En Promotion:</td><td><input type="checkbox" name="promotion" /></td>
</tr>
<tr>
<td>SÃ©lectionnÃ©:</td><td><input type="checkbox" name="selectionne"
checked="checked"/></td>
</tr>
<tr>
<td><input type="submit" value="Ajouter" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>