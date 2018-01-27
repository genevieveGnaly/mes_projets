<?php include('connexion.php');?>
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
 	<title>infos cv</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

 </head>
<body> 
	          
  <?php include('entete.php'); ?> 
   <div class="infodashboard">
	<div class="row">
					<?php 
			if (isset($_GET['id'])){
			$sql="SELECT codeuse.id, nom, prenoms, datenais, tel, email, description, photo, specialisation, facebook, twitter, github FROM cv INNER JOIN codeuse ON codeuse.id=cv.id_codeuse
			WHERE codeuse.id=".$_GET['id'];
			$res=mysqli_query($link, $sql);
			$dataU=mysqli_fetch_array($res);
					?>
			<div class="col-sm-2">
				<h4><?php echo $dataU['nom'].' '.$dataU['prenom']; ?></h4>
				<h5>Née le :<?php echo $dataU['datenais']; ?> </h5>
				<h5>Adresse: </h5>
				<h5>Téléphone : <?php echo $dataU['tel']; ?> </h5>
				<h5>Email: <?php echo $dataU['email']; ?> </h5>
			</div>
			<div class="col-sm-5 ">
				<h4><?php echo $dataU['description']; ?></h4>
			</div>
			<div class="col-sm-3">
				<img src="upload/<?php echo $dataU['photo']; ?>" class="img-circle">
				<h4><?php echo $dataU['specialisation']; ?></h4>

				<ul class="list-inline fa-ul">
					<li><a href="<?php echo $dataU['facebook']; ?>"><i class="fa fa-facebook fa-2x" style=""></i></a>
					</li>
					<li><a href="<?php echo $dataU['twitter']; ?>"><i class="fa fa-twitter fa-2x" style=""></i></a>
					</li>
					<li><a href="<?php echo $dataU['github']; ?>"><i class="fa fa-github fa-2x" style=""></i></a>
					</li>	
				</ul>
			</div>
		</div>
		<?php 
			}
		?>

		<div class="row">
			<div class=""></div>
			<div class="col-sm-6 col-sm-offset-3 " style="background-color: pink; text-align: center;"> <h2>MES EXPERIENCES</h2>
			</div>
		</div>
		<?php 
if (isset($_GET['id'])){
			$sql="SELECT codeuse.id, datenais, datefin, poste, experience.description, entreprise FROM experience INNER JOIN codeuse ON codeuse.id= experience.id_codeuse
			WHERE codeuse.id=".$_GET['id'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
					?>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2">
				<?php echo $dataU['datedebut'].' -- '.$dataU['datefin']; ?>
			</div>
			<div class="col-sm-2"><?php echo $dataU['poste']; ?></div>
			<div class="col-sm-4"><?php echo $dataU['description']; ?></div>
			<div class="col-sm-2"><?php echo $dataU['organisation']; ?></div>
		</div>
		<?php 
			}
			}

		?>
		<div class="row">
			<div class=""></div>
			<div class="col-sm-6 col-sm-offset-3  " style="background-color: pink; text-align: center;"> <h2>MES Diplômes</h2>
			</div>
		</div>
		<?php 
if (isset($_GET['id'])){
			$sql="SELECT codeuse.id, datediplome, etablissement, diplome FROM diplomes INNER JOIN codeuse ON codeuse.id= diplomes.id_codeuse
			WHERE codeuse.id=".$_GET['id'];
			$res=mysqli_query($link, $sql);
			while ( $dataU=mysqli_fetch_array($res)) {
				
					?>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><?php echo $dataU['datediplome']; ?></div>
			<div class="col-sm-2"><?php echo $dataU['etablissement']; ?></div>
			<div class="col-sm-4"><?php echo $dataU['diplome']; ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php 
			}
			}

		?>
		<div class="row">
			<div class=""></div>
			<div class="col-sm-6 col-sm-offset-3 " style="background-color: pink; text-align: center;"> <h2>MES CENTRES D'INTERÊTS</h2>
			</div>
		</div>				<?php 
if (isset($_GET['id'])){
			$sql="SELECT codeuse.id, titre, centredinteret.description FROM centredinteret INNER JOIN codeuse ON codeuse.id= centredinteret.id_codeuse
			WHERE codeuse.id=".$_GET['id'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
				# code...
					?>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><?php echo $dataU['titre']; ?></div>
			<div class="col-sm-2"></div>
			<div class="col-sm-4"><?php echo $dataU['description']; ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php 
			}
			}
			
		?>

			
			
		
		
		
		
	</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>