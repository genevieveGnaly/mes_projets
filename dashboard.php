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
 	<title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

 </head>
<body> 
<div class="container">          
      <?php include('entete2.php'); ?> 

  	        
 <div class="dashboard">
	<div class="row">
	<div class="col-sm-3">
	<?php include('menu.php'); ?>
			</div>

			<?php 
			if (isset($_SESSION['codeuse'])){
			$sql="SELECT * FROM codeuse
			WHERE id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			$dataU=mysqli_fetch_array($res);
					?>
			 <div class="col-sm-3">
			 	<h4>stagiaire:<?php echo ($dataU['nom']."".$dataU['prenom']) ; ?></h4>
			 	<h4 style="color: red;">Née le :<?php echo ($dataU['datenais']) ; ?></h4>
			 	<h4>Telephone: <?php echo ($dataU['tel']) ; ?></h4>
			 	<h4>Email:<?php echo ($dataU['email']) ; ?></h4>
			</div>
			<div class="col-sm-3">
				<div> <h3><?php echo $dataU['description']; ?></h3></div>
				
			</div>
			<div class="col-sm-3">
				<div>
				<img src="upload/<?php echo $dataU['photo'];?>" class="img-circle" width="30px" height="30px" alt="photo profil">
			   </div>
			   <div><h4><?php echo $dataU['specialisation']; ?></h4></div>
				<div>
					<?php 
				} 
			if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuse.id, facebook, twitter, github FROM cv INNER JOIN codeuse ON codeuse.id=cv.id_codeuse
			WHERE codeuse.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			$dataU=mysqli_fetch_array($res);
					?>
				<ul class="list-inline fa-ul">
					<li><a href="<?php echo $dataU['facebook']; ?>"><i class="fa fa-facebook fa-2x" ></i></a>
					</li>
					<li><a href="<?php echo $dataU['twitter']; ?>"><i class="fa fa-twitter fa-2x" ></i></a>
					</li>
					<li><a href="<?php echo $dataU['github']; ?>"><i class="fa fa-github fa-2x" style=""></i></a>
					</li>	
				</ul>
				<?php 
			}
		?>
				</div>
			</div>
		</div>
	</div>
 </div>
  
   
  	<div class="row">
  		<div class="col-sm-3"></div>
  		<div class="col-sm-9">
  		<div class="row" style="text-align: center;"> <div class="col-sm-10" > <marquee><h2>MES EXPERIENCES </h2></marquee></div></div>
<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuses.id, datedebut, datefin, poste, experience.description, organisation FROM experience INNER JOIN codeuse ON codeuse.id= experience.id_codeuse WHERE codeuse.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
					?>
	  		<div class="row">
		  		<div class="col-sm-2"  > <?php echo ($dataU['datedebut']."- ".$data['datefin']) ; ?></div>
		  		<div class="col-sm-2" >><?php echo ($dataU['poste']) ; ?></div>
		  		<div class="col-sm-6" >><?php echo ($dataU['description']) ; ?></div>
		  		<div class="col-sm-2" >><?php echo ($dataU['organisation']) ; ?></div>	
		  	</div>
		  	<?php 
			}
			} ?>
		<div class="row" style="text-align: center;"> <div class="col-sm-10">  <marquee><h2>MES DIPLOMES </h2></marquee></div></div>
		<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuse.id, datediplome, etablissement, diplome FROM diplomes INNER JOIN codeuse ON codeuse.id= diplomes.id_codeuse
			WHERE codeuse.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) { 
				?>
	  		    <div class="row">
		  		<div class="col-sm-3"><?php echo ($dataU['datediplome']) ; ?></div>
		  		<div class="col-sm-3"><?php echo ($dataU['etablissement']) ; ?></div>
		  		<div class="col-sm-6"><?php echo ($dataU['diplome']) ; ?></div>
	  		</div>

     </div>
  </div>
  <?php 
			}
			}

		?>
  		<div class="row" style="text-align: center;"> <div class="col-sm-10">  <marquee><h2>MES CENTRES D'INTERETS </h2></marquee></div></div>
  	<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuse.id, titre, centredinteret.description FROM centredinteret INNER JOIN codeuse ON codeuse.id= centredinteret.id_codeuse
			WHERE codeuse.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) { ?>

         <div class="row">
			<div class="col-sm-4"><?php echo $dataU['titre']; ?></div>
	        <div class="col-sm-8"><?php echo $dataU['description']; ?></div>
		</div>
				<?php 
			}
			}
			
		?>


 <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>