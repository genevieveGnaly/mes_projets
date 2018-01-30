<?php include('connexion.php');
$msg="";
	if (isset($_POST['btnvalider'])){
    if (move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$_FILES['photo']['name'])) {

    	$sql="SELECT * FROM codeuse WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
			$req= mysqli_query($link, $sql);
			if (mysqli_num_rows($req)>0) {
			 echo  "l'email existe déja";
			}else{
	$sql="INSERT INTO codeuse (nom, prenom, datenais, photo, specialisation, tel, email, mdp, resume) VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
		'".mysqli_real_escape_string($link,$_POST['prenom'])."',
		            '".$_POST['datenais']."',
		            '".$_FILES['photo']['name']."',
		            '".mysqli_real_escape_string($link,$_POST['specialisation'])."',
					'".$_POST['tel']."',
					'".mysqli_real_escape_string($link,$_POST['email'])."',
					'".mysqli_real_escape_string($link, md5($_POST['mdp']))."',
					'".mysqli_real_escape_string($link,$_POST['resume'])."')";
		$result=mysqli_query($link,$sql);
		if ($result){
		  $msg='felicitation vous êtes enregistrée';
		}else{
			$msg=mysqli_error($link);
		}
	}
}
}

 ?>



<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta neme="description" content="gestion de cv des codeuses de sheisthecode en ligne">
		<meta name="author" content="GNALY GENEVIEVE">
	 	<title>INSCRIPTION</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
<body>
	<div class="container">

			
			<?php include('entete.php'); ?> 
                 <div class="col-sm-6 col-sm-offset-3 form2">
				<form  role=form action="" name="form1" method="Post" enctype="multipart/form-data" >
				<legend>Inscription</legend>
				 <h3 style="color: blue"> <?php echo $msg;?> </h3>
				<div class="form-group">
					<label for=""> Nom </label>
					<input type="text" name="nom" id="nom" value="" class="form-control" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for=""> Prenoms</label>
					<input type="text" name="prenom" id="prenom" class="form-control" value=""  placeholder="entrez votre prenom" required="">
				</div>
				<div class="form-group">
					<label for=""> Date de naissance </label>
					<input type="date" name="datenais" id=datenais class="form-control" value=""  placeholder=" votre date de naissance" required="">
				</div>
				<div class="form-group">
					<label for=""> Resume</label>
					<textarea type="text" name="resume" id="resume" class="form-control" placeholder="" value=""  required=""> </textarea>
				</div>
				<div class="form-group">
					<label for=""> Email </label>
					<input type="email" name="email" id="email"  class="form-control" placeholder=" votre email " value=""  required="">
				</div>
				<div class="form-group">
					<label for="">Telephone </label>
					<input type="number" name="tel" id="tel"  class="form-control"  value=""  placeholder="votre de numero de telephone" required="">
				</div>
				<div class="form-group">
					<label for="">Mot de passe </label>
					<input type="password" name="mdp" id="mdp" class="form-control"  placeholder="" required="">
				</div>
				<div class="form-group">
					<label for="">Specialisation</label>
					<input type="text" name="specialisation" id="specialisation" class="form-control" value=""  placeholder="" required="">
				</div>
				<div class="form-group">
                 <label for="image">Photo de votre cv </label><input name="photo"  type="file" class="form-control" placeholder="telechargez votre photo de profil"> </div>  
             <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="btnvalider" value="Enregistrer" name="btnvalider"> </div>
         	</form>
		</div>
		
	</div>


<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>