<?php require_once("connexion.php") ?>
<?php
$req="select * from categories";
$rs=mysql_query($req) or die(mysql_error());
?>
<table>
<?php while($cat=mysql_fetch_assoc($rs)){ ?>
<tr>
<td>
<a href="index.php?idCat=<?php echo($cat['CODE_CAT'])?>">
<?php echo($cat['NOM_CAT'])?>
</a>
</td>
</tr>
<?php } ?>
</table>
<?php
mysql_free_result($rs);
?>

<?php require_once("connection.php") ?>
<?php
if (isset($_POST['motCle'])){
$motCle=$_POST['motCle'];
$req="select * from PRODUITS where DESIGNATION LIKE
'%$motCle%'";
}
elseif (isset($_GET['idCat'])){
$idCat=$_GET[ =$_GET['idCat'];
$req="select * from PRODUITS where CODE_CAT=$idCat";
}
elseif (isset($_GET['promo'])){
$req="select * from PRODUITS where PROMOTION=1";
}
else{
$req="select * from PRODUITS where SELECTIONNE=1";
}
$rsProd=mysql_query($req) or die (mysql_error());
?>
<div id="produits">
<?php while($prod=mysql_fetch_assoc($rsProd)) { ?>
<div id="produit">
<table>
<tr>
<td>Reference :</td><td><?php echo $prod['REF_PRODUIT'] ?></td>
<td rowspan="4"><img src="images/<?php echo
$prod['PHOTO' 'PHOTO']?>"></td>
</tr>
<tr><td width="80px">Designation :</td><td width="100px"><?php echo
$prod['DESIGNATION']?></td></tr>
<tr><td width="80px">prix:</td><td><?php echo $prod['PRIX']?></td></tr>
<tr><td width="80px">quantite:</td><td><?php echo $prod['QUANTITE']?></td>
</tr>

<tr>
<td colspan="3" align="right">
<div id="formPanier">
<form method="post" action="addCaddie.php" id="form2">
<input type="text" name="quantite" size="8" value="1" />
<input type="hidden" name="refProduit" value="<?php echo
$prod['REF_PRODUIT']?>" />
<input type="hidden" name="designation" value="<?php echo
$prod['DESIGNATION'] ?>" />
<input type="hidden" name="prix" value="<?php echo $prod['PRIX'] ?>" />
<input type="image" src="img/panier50.jpg" value="submit" />
</form>
</div>
</td>
</tr>
</table>
</div>
<?php }
mysql_free_result($rsProd);
?>
</div>