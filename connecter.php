<?php
 include('connexion.php');
if(isset($_POST['btnvalider'])) {
	$sql="SELECT * FROM codeuse WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' AND mdp='".mysqli_real_escape_string($link, md5($_POST['mdp']))."' LIMIT 0, 1";
	$req= mysqli_query($link, $sql);
		if (mysqli_num_rows($req)>0) {
		$data= mysqli_fetch_array($req);
		$_SESSION['codeuse']=$dataU['id'];
		header('location:dashboard.php');
		}else{
		echo "mot de passe ou email incorrect";
			}
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
 	<title>CONNEXION</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

 </head>
<body>
	         
	<div class="container">
 	<?php include('entete.php'); ?> 


 		<div class="row">
		<div class="col-sm-6 col-sm-offset-3 form2">
	
			<form  role=form action="" name="form1" method="Post">
				<legend style="text-align: center;">connectez vous</legend>
				<div class="form-group">
					
				<div class="form-group">
					<label for="">Email </label>
					<input type="email" name="email" id="email"  class="form-control" placeholder=" votre email " required="">
				</div>
				
				<div class="form-group">
					<label for="">Mot de passe </label>
					<input type="password" name="mdp" id="mdp" class="form-control" value=""  placeholder="" required="">
				</div>
             
                	<div>
					<button name="btnvalider" type="submit" class="btn btn-lg btn-primary "> <h2>ok</h2></button>
				</div>
			</form>
		</div>
		
		</form>
	</div>
		
			
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>