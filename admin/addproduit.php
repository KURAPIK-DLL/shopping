<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
			if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
				exit();
			}
				 
				 
			


      ?>
<?php include'inc/header.php'; ?>
<?php include'inc/nav.php'; ?>
			
	
	

<!-- 	
	SHOP CONTENT
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<form method="post">
					<div class="form-group">
						<label for="productname">category name</label>
							<input type="text" class="form-control" id="categoryname" class="categoryname" placeholder="category name">
						</div>
						<button type="submit" class="btn btn-default">submit</button>
				</form>
			</div>
		</div> 
	</section> -->

	
    <?php include'inc\footer.php'; ?>
