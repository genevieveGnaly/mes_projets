<?php 
 include('connexion.php');
 ?>

 		<nav class="navbar navbar-inverse" role="navigation">
 			<div class="navbar-header">
 				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 					<span class="sr-only">menu</span>
				    <span class="icon-bar"></span>
		 		    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
				<a href="index.php" style="text-decoration: none; color: pink;"><h3>sheisthecode cv </h3></a>
 			</div>
 			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 				<ul class="nav navbar-nav navbar-right">
 					<li><a href="#"><h3>A Propos</h3></a></li>
 					<li>					
 					<?php 
					if (isset($_SESSION['codeuse'])) {
					$sql="SELECT * FROM codeuse WHERE id=".$_SESSION['codeuse'];
					$req=mysqli_query($link,$sql);
					$data=mysqli_fetch_array($req);
			
					?>
				     <a href="dashboard.php"><img class="img-circle" src="upload/<?php echo $data['photo']; ?>" style="width: 30px; height: 30px; margin-top: 10px;"></a>

				 	<?php
					}				 
				 ?>	 
				</li>
				<li>
				<form action="" method="POST">
				 <button class="btn" name="deconnexion" style="margin-top: 30px; "   ><a href="index.php" style="margin-top: 40px; color: red; text-decoration: none;">Deconnexion</a></button>
				</form>
				<?php 
				if (isset($_POST['deconnexion'])) {
				 session_destroy();

				}				 
				 ?>	
			</li>
 					
 				</ul>
 			</div>
 		</nav>  
