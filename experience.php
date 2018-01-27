<?php 
	$msg="";
	if (isset($_POST['btnvalider'])){
		$sql= "INSERT INTO experience (poste, datedebut, datefin, organisation, description) VALUES (
		'".mysqli_real_escape_string($link,$_POST['poste'])."',
		 '".$_POST['datedebut']."', 
		 '".$_POST['datefin']."',
		  '".mysqli_real_escape_string($link,$_POST['organisation'])."',
		   '".mysqli_real_escape_string($link,$_POST['description'])."',
		    '".$_SESSION['codeuse']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE experience SET 
			poste='".mysqli_real_escape_string($link, $_POST['poste'])."',
		    datedebut='".$_POST['datedebut']."',
			datefin='".$_POST['datefin']."',
			 organisation='".mysqli_real_escape_string($link,$_POST['organisation'])."', 
			 description='".mysqli_real_escape_string($link,$_POST['description'])."',
			 id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='experience enregistré avec success';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM experience WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM experience WHERE id=".$_GET['sup'];
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
 	<title>les experience de la codeuse</title>
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
		<div class="col-sm-6">
	
			<form  role=form action="" name="form1" method="Post" enctype="multipart/form-data" >
				<legend>vos experiences</legend>
				<div class="form-group">
					<label for="">organisation </label>
					<input type="text" name="organisation" id="organisation" class="form-control" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for=""> poste occupé </label>
					<input type="text" name="poste" id="poste" class="form-control" placeholder="poste occupé dans l'entreprise" required="">
				</div>
				<div class="form-group">
					<label for=""> description </label>
					<textarea type="text" name="description" id="description" class="form-control" placeholder=" la description du poste" required=""></textarea>
				</div>
				<div class="form-group">
					<label for=""> date debut </label>
					<textarea type="date" name="datedebut" id="datedebut" class="form-control" placeholder="" required=""> </textarea>
				</div>
				<div class="form-group">
					<label for=""> date fin </label>
					<textarea type="date" name="datefin" id="datefin" class="form-control" placeholder="" required=""> </textarea>
				</div>
				
              <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="btnvalider" value="valider" name="btnvalider"> </div>
         		
			</form>
		</div>
		
		
	</div>
	</div>
	<div class="container">
		<div class="row">
		
			<table class="table">

				<thead>
					<tr>
						<th> numero</th>
				         <th> organisation </th>
						<th> poste</th>
						<th>Description</th>
						<th> date debut</th>
						<th> date fin</th>
						<th>id_codeuse</th>
					     <th> action</th>

					</tr>
				</thead>
				
				<tbody>
                      <?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
							$list=" SELECT 
							organisation,
							poste,
							experience.description,
							datedebut,
							datefin,
							codeuse.id,
							 experience.id
							  FROM experience INNER JOIN codeuse ON codeuse.id=experience.id_codeuse WHERE codeuse.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
	                       while ($data = mysqli_fetch_array($res)){
				       ?>
					<tr>
							<td><?php echo $n;?></td>
							<td><?php echo $data['organisation']; ?></td>
							<td><?php echo $data['poste']; ?></td>
							<td><?php echo $data['description'];?></td>
							<td><?php echo $data['datedebut']; ?></td>
							<td><?php echo $data['datefin']; ?></td>
                            <td><?php echo $data['id_codeuse']; ?></td>
 
							<td><a href="?id=<?php echo $data['id']; ?>">modifier</a> <a href="?id=<?php echo $data['id']; ?>"> suprimer</a></td>
							
					</tr>
		                 <?php 
						$n++;
					    }
					}
					    ?>
					</tbody>
				</table>
</div>
</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>