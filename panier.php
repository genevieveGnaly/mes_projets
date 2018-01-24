<?php
if(!(isset($_SESSION['panier']))){
$panier=array();
}
else{
$panier=$_SESSION['panier'];
}
?>
<table border="1">
<tr>
<th>Ref Produit</th><th>Designation</th><th>Quantite</th>
<th>Prix</th>
</tr>
<?php
$total=0;
for($i=0;$i<count($panier);$i++){
$total=$total+ $panier[$i]['quantite']* $panier[$i]['prix'];
?>
<tr>
<td><?php echo($panier[$i]['refProduit']) ?></td>
<td><?php echo($panier[$i]['designation']) ?></td>
<td><?php echo($panier[$i][ ($panier[$i]['quantite' 'quantite']) ?> </td>
<td><?php echo($panier[$i]['prix']) ?> </td>
<td><a href="supprimerDuPanier.php?index=<?php echo($i) ?>"> Supp</a></td>
</tr>
<?php } ?>
<tr>
<td colspan="3">Total:</td><td><?php echo($total)?></td>
</tr>
</table>
<input type="button" value="Commander" onclick="document.location='commander.php'" />