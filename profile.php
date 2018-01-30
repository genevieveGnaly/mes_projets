<?php 
$modif="";
if (isset($_POST['modif'])){
	$sql= "UPDATE codeuses SET
	     nom='".mysqli_real_escape_string($link, $_POST['nom'])."',        
	     prenoms='".mysqli_real_escape_string($link, $_POST['prenom'])."',
	     datenais='". $_POST['datenais']."', 
	     description='".mysqli_real_escape_string($link, $_POST['description'])."'
	     email='".mysqli_real_escape_string($link, $_POST['email'])."',
	     specialisation='".mysqli_real_escape_string($link, $_POST['specialisation'])."', 
	     tel='". $_POST['tel']."',
	     mdp='".mysqli_real_escape_string($link,md5($_POST['mdp']))."',
	     photo='".$_FILES['photo']['name']."'  
	     WHERE id=".$_SESSION['codeuse'];

	     $result=mysqli_query($link,$sql);
		if ($result){
		  $modif='votre cv a été modifier avec succes';
		}else{
			$modif=mysqli_error($link);
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
		<div class="col-sm-6">
				<form  role=form action="" name="form1" method="Post" >
				<legend>veuillez modifier votre cv</legend>
               <h3 style="color: blue"> <?php echo $modif;?> </h3>
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
 
             <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="modif" value="modifier profile" name="modif"> </div>
         	</form>
		</div>
		
		
	</div>
 

	
	<div class="row">
			<table class="table">

				<thead>
					<tr>
						<th> NOM</th>
						<th> PRENOMS</th>
						<th> DATE DE NAISSANCE</th>
						<th> EMAIL</th>
						<th> TELEPHONE</th>
						<th> PHOTO</th>
						<th> SPECIALISATION</th>
					</tr>
				</thead>
			
				<tbody>
		                  <?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {

							$list="SELECT  
							nom,
							prenom,
							datenais,
							email,
							tel,
							photo,
							specialisation,
							id
							FROM codeuse WHERE id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
	                       while ($data = mysqli_fetch_array($res)){
				       ?>
					<tr>
							<td><?php echo $n;?></td>
							<td><?php echo $data['nom']; ?></td>
							<td><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['datenais']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['tel']; ?></td>
							<td> <img src="upload/<?php echo $data['photo'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['specialisation']; ?></td>
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


<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>