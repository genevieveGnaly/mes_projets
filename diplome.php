
<?php 
	$msg="";
	if (isset($_POST['btnvalider'])){
		$sql= "INSERT INTO diplomes (etablissement, diplome, datediplome, id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['etablissement'])."','".$_POST['diplome']."', '".$_POST['datediplome']."', '".$_SESSION['codeuse']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE diplomes SET
			etablissement='".mysqli_real_escape_string($link, $_POST['etablissement'])."', 
			diplome='".$_POST['diplome']."',
			datediplome='".$_POST['datediplome']."', 
		    id_codeuse='".$_SESSION['codeuse']."'
			  WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link ,$sql);
		if ($result) {
			$msg='diplome enregistré';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM diplomes WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM diplomes WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}
?>
<!DOCTYPE html>
<html>
<head>
	<html lang="fr">
 <head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta neme="description" content="gestion de cv des codeuses de sheisthecode en ligne">
	<meta name="author" content="GNALY GENEVIEVE">
 	<title>sheisthecode cv</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

 </head>
<body>
	          
	<div class="container">
 		<?php include('entete2.php'); ?> 
       <div class="row">
       	<div class="col-sm-3">
       	<?php include('menu.php'); ?>
       </div>
		<div class="col-sm-9">
	<form  role=form action="" name="form1" method="Post" enctype="multipart/form-data" >
				<legend style="text-align:center; font-size: 20px;">diplomes</legend>
				<div class="form-group">
					<label for=""> ETABLISSEMENT </label>
					<input type="text" name="etablissement" id="etablissement" class="form-control" placeholder=" le nom de l'etablissement de l'obtention du diplôme" required="">
				</div>
				<div class="form-group">
					<label for="">LE TITRE DU DU DIPLOME</label>
					<input type="text" name="diplome" id="diplome" class="form-control" placeholder="diplome" required="">
				</div>
				<div class="form-group">
					<label for="">LA DATE DE L'OBTENTION DU DIPLÔME</label>
					<input type="date" name="datediplome" id="datediplome" class="form-control" placeholder=" " required="">
				</div>
				 
          <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="btnvalider" value="valider" name="btnvalider"> </div>
         		
			</form>
		
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Etablissement</th>
							<th>Diplome</th>
							<th>Année d'obtention</th>
							<th>ACTION</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT codeuses.id, etablissement, diplome, datediplome, diplomes.id FROM diplomes INNER JOIN codeuse ON codeuse.id=diplomes.id_codeuse WHERE codeuse.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['etablissement']; ?></td>
							<td> <?php echo $data['diplome']; ?> </td>
							<td> <?php echo $data['datediplome']; ?> </td>
							<td>
						<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
					
							<a href="?sup=<?php echo $data['id']; ?>">Supprimer</a></td>
						</tr>
						<?php $n++;
						 } 
							}
						 ?>
					</tbody>
				</table>

			</div>
		</div>
		
		
	</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>