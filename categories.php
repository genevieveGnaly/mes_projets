<?php include ('connexion.php') ?>
<?php
$req="select * from CATEGORIES";
$rs=mysqli_query($req) or die(mysqli_error());
?>
<table>
<?php while($cat=mysqli_fetch_assoc($rs)){ ?>
<tr>
<td>
<a href="index.php?idCat=<?php echo($cat['code_cat'])?>">
<?php echo($cat['nom_cat'])?>
</a>
</td>
</tr>
<?php } ?>
</table>
<?php
mysqli_free_result($rs);
?>