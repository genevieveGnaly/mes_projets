<?php 
$msg="";
	if (isset($_POST['btnvalider'])){
		$sql= "INSERT INTO centredinteret (titre, description, id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['titre'])."', '".$_POST['description']."', '".$_SESSION['codeuse']."')"; 
		if (isset($_GET['id'])){
			$sql="UPDATE centredinteret SET titre='".mysqli_real_escape_string($link, $_POST['titre'])."', description='".$_POST['description']."', id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='centre interets enregistré';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM centredinteret WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM centredinteret WHERE id=".$_GET['sup'];
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
	
			<form  role=form action="" name="form1" method="Post" >
				<legend style="text-align: center;color: blue;">vos centres d'interet</legend>
				<div class="form-group">
					<label for=""> centres d'interet </label>
					<input type="text" name="titre" id="interet" class="form-control" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for=""> description</label>
					<textarea type="text" name="description" id="description" class="form-control" placeholder="veuillez decrire votre centre d'interet" required=""></textarea>
				</div>
				
				 
          <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="btnvalider" value="valider" name="btnvalider"> </div>
         		
			</form>
	
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Centre d'intérêt</th>
							<th>Description</th>
							<th>action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								
								$list=" SELECT codeuse.id, titre, centredinteret.description, interets.id FROM centredinteret INNER JOIN codeuses ON codeuse.id=centredinteret.id_codeuse WHERE codeuse.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td> <?php echo $data['description']; ?> </td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
							</td>
							<td><a href="?sup=<?php echo $data['id']; ?>">Supprimer</a></td>
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
</div>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>