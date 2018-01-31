<?php include('connexion.php');?>
<!DOCTYPE html>

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
	          
	         <?php include('entete.php'); ?> 

	         <?php 
			$list="SELECT nom,prenom,resume,specialisation,photo FROM codeuse";
			$res= mysqli_query($link,$list);
			while ($data = mysqli_fetch_array($res)){								
		    ?>

	       <div class="row" style="margin: 30px;">
		
			<div class="accueil" style="background-color: pink;">
			<div class="col-sm-4" style="background-color: pink;" >
		  				
		<a href="infoscv.php?id=<?php echo $data['id']; ?>""> <img src="upload/<?php echo $data['photo'];  ?>" class="img-circle" width="180px" height="150px" alt=""> </a>
		<h3><?php echo ($data['nom']."  ".$data['prenom']) ; ?></h3>
		</div>
		<div class="col-sm-5" >
			<h2 style="color: black ; text-align: center; font-size: 50px"><?php echo ($data['specialisation']) ; ?></h2>
			<section style="font-size:30px "> <?php echo substr($data['resume'], 0, 200) ; ?>...</section>

							
		</div>
	
		<div class="col-sm-3" style="padding: 50px; background-color: pink;">
		<button class="btn btn" type="submit"><a style=" text-decoration: none; font-size: 20px;" href="infoscv.php?id=<?php echo $data['id']; ?>"> consultez le cv </a></button>
			
		</div>
		
	</div>
</div>
	<?php  
		}
	?>

</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>