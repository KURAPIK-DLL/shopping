<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
	if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
			}	
			

		 if(isset($_POST) & !empty($_POST))
		 {
			 $name = mysqli_real_escape_string($connection,$_POST['categoryname']);
			 $sql = "INSERT INTO category (name) VALUES ('$name')";
			 $res = mysqli_query($connection,$sql);

			 if($res)
			 {
				 echo "categorie added";
			 }
			 else
			 {
				 echo "failed to add category";
			 }
		 }
		

      ?>

<?php include'inc/header.php'; ?>
<?php include'inc/nav.php'; ?>
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
			<form method="post">
			 <div class="form-group">
				 <label for="productname">category name</label>
				 <input type="text" value="" class="form-control" name="categoryname"  id="categoryname" placeholder="category name">
			 </div>
			<button type="submit" class="btn btn-default">submet</button>
		 
			</form>
			
			</div>
		</div>
	</section>
    <?php include'inc\footer.php'; ?>
