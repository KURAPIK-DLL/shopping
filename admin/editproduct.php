<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
			if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
				exit();
            }
            if(isset($_POST) & !empty($_POST))
            {
                $name=mysqli_real_escape_string($connection,$_POST['productname']);
                $description=mysqli_real_escape_string($connection,$_POST['productdiscreption']);
                $category=mysqli_real_escape_string($connection,$_POST['productcategory']);
                $price=mysqli_real_escape_string($connection,$_POST['productimage']);

                $sql = "INSERT INTO produits (name , description , catid,	price) VALUES ('$name',' $description',' $category','$price')";
                $res = mysqli_query($connection,$sql);
   
                if($res)
                {
                    $vmsg= "product added";
                   
                }
                else
                {
                    $fmsg= "failed to add product";
                    
                }

            }
				 
				 
			


      ?>
<?php include'inc/header.php'; ?>
<?php include'inc/nav.php'; ?>
			
	
	

	
	
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<form method="post">
					<div class="form-group">
						<label for="productname">product name</label>
							<input type="text" class="form-control" id="productname" class="productname" placeholder="product name">
						</div>
						<div class="form-group">
						<label for="productname">product description</label>
							<textarea class="form-control" name="productcategory" id="productcategory"  rows="3"></textarea>
						
						</div>
						<div class="form-group">
							
						<label for="productprice">product price</label>
						<select class="form-control" name="productcategory" id="productcategory">

						<option value="">--select category--</option>
						</select>
							<!-- <input type="text" class="form-control" id="productprice" class="productprice" placeholder="product price"> -->
						</div>
						<div class="form-group">
						<label for="productimage">product image</label>
							<input type="file" id="productimage"  class="productimage" placeholder="product image">
							<small>*jpg or png only </small>
							
						</div>
						<button type="submit" class="btn btn-default">submit</button>
				</form>
			</div>
		</div> 
	</section>

	
    <?php include'inc\footer.php'; ?>
