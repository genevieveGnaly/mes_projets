<div id="entete">
<table width="100%">
<tr>
<td width="14%" height="89" align="left">
<div id="logo"><img src="img/logo.jpg" width="147"
height="71"></div>
</td>
<td width="40%" align="center">
<div id="pub"><img src="img/pub1.jpg" "img/pub1.jpg" width="500"
height="87"></div>
</td>
<td width="35%" align="right" valign="bottom">
<div id="authentification">
<div>
<?php if(isset($_SESSION['ROLE_USER'])){ ?>
Authentification avec Login : <?php echo($_SESSION['LOGIN']);?>
<?php }?>
</div>

<div>
<form method="post" action="authentifier.php">
Login : <input type="text" name="login" size="12" />
Pass:<input type="password" name="pass" size="12"/>
<input type="submit" value="OK"/>
</form>
</div>
</div>
</td>
</tr>
</table>
</div>

<div id="menu">
<table width="100%">
<tr>
<td width="24%" valign="top">
<form method="post" action="index.php" id="form2">
<input type="text" name="motCle"/>
<input type="submit" value="Chercher"/>
</form>
</td>
<td width="8%"><a href="index.php">Home</a></td>
<td width="10%">
    <a href="index.php?promo index.php?promo=1">Promotions</a></td>
<td width="8%"><a href="index.php">Selection</a></td>
<td width="7%"><a href="index.php?panier=1">Panier</a></td>
<td width="10%"><a href="index.php">Commander</a></td>
<?php if(isset($_SESSION['ROLE_USER'])){ ?>
<td width="15%"><a href="GestionCategories.php">Gestion Gactegories</a></td>
<td width="17%"><a href="GestionProduits.php">Gestion Produits</a></td>
<?php } ?>
<td width="1%">&nbsp;</td>
</tr>
</table>
</div>