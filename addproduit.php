
<?php require_once("connexion.php") ?>
<?php
$ref=$_POST["refProduit"]; $des=$_POST["designation"];
$idCat=$_POST["idCat"]; $prix=$_POST["prix"]; $quantite=$_POST["quantite"];
$nomPhoto=$_FILES['photo']['name'];
$fichierTemporaire=$_FILES['photo']['tmp_name'];
move_uploaded_file($fichierTemporaire,"./images/$nomPhoto");
if(isset($_POST[ ($_POST['promotion' 'promotion'])) $promo=1; ])) $promo=1; else $promo=0; $promo=0;
if(isset($_POST['selectionne'])) $sel=1; else $sel=0;
if(isset($_POST['disponible'])) $dispo=1; else $dispo=0;
$req="insert into PRODUITS(REF_PRODUIT,DESIGNATION,QUANTITE,PRIX,PHOTO,
DISPONIBLE,PROMOTION,SELECTIONNE,CODE_CAT)
values
('$ref','$des',$quantite,$prix,'$nomPhoto',$dispo,$promo,$sel,$idCat)";
mysql_query($req) or die(mysql_error());
?>
<html> <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php require_once("entete.php") ?>
<h3> DonnÃ©es EnregistrÃ©es avec succÃ©s</h3>
<table border="1">
<tr> <td>REF :</td><td><?=$ref?> </td> </tr>
<tr> <td>Designation :</td><td><?=$des?> </td></tr>
<tr> <td>Photo :</td><td><img src="images/<?=$nomPhoto?>" width="100"
height="50"/></td></tr>
<tr> <td>Prix :</td><td><?=$prix?> </td> </tr>
<tr> <td>QuantitÃ© :</td><td><?=$quantite?> </td> </tr>
<tr> <td>Code CatÃ©gorie :</td><td><?=$idCat?> </td> </tr>
<tr> <td>Disponible :</td><td><?=$dispo?> </td> </tr>
<tr> <td>Promotion :</td><td><?=$promo?> </td> </tr>
<tr> <td>SÃ©lectionnÃ© :</td><td><?=$sel?> </td> </tr>
</table>
<a href="index.php">Home</a>
</body></html>
<?php
mysql_close($conn);
?>