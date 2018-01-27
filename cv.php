<?php 
$msg="";
if (isset($_POST['btnvalider'])){
		$sql= "INSERT INTO cv (facebook, twitter, github, id_codeuse) VALUES ('".$_POST['facebook']."', '".$_POST['twitter']."', '".$_POST['github']."', '".$_SESSION['codeuse']."' )";
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='votre cv a été enregistré avec success';
		}else{
			$msg=mysqli_error($link);
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
 	<title>creation de cv</title>
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

	
			<form  role=form action="" name="form1" method="Post">
				<legend style="color: blue; text-align: center t">vos liens reseaux sociaux</legend>
	         <h3 style="color: blue; text-align: center"> <?php echo $msg;?> </h3>
				<div class="form-group">
					
				<div class="form-group">
					<label for=""> facebook </label>
					<input type="text" name="facebook" id="facebook"  class="form-control" placeholder=" lien facebook " required="">
				</div>
				
				<div class="form-group">
					<label for="">twitter</label>
					<input type="text" name="twiter" id="twiter" class="form-control"  placeholder="" required="">
					<div class="form-group">
					<label for="">github</label>
					<input type="text" name="github" id="github" class="form-control"  placeholder="" required="">
				</div>
                <div><input type="submit" class="btn btn-block btn-lg btn-primary" id="btnvalider" value="valider" name="btnvalider"> </div>
		 	
			</form>
		</div>
		
		
	</div>


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
</body>
</html>