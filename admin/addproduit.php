<?php

use function PHPSTORM_META\type;

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
            
				$price=mysqli_real_escape_string($connection,$_POST['productprice']);
				if(isset($_FILES) & !empty($_FILES))
				{
					$name=$_FILES['productimage']['name'];
					$size=$_FILES['productimage']['size'];
					$type=$_FILES['productimage']['type'];
					$tmp_name=$_FILES['productimage']['tmp_name'];
					
					$max_size=5000000;
					 $extention = substr($name , strpos($name , '.')+1);
					 if(isset($name) & !empty($name))
					 {
						 if(($extention=="jpg" || $extention=="png" || $extention=="jpeg") & $type == "image/jpeg" & $size<= $max_size )
						 {
							 $location = "uploads/";

							 if(move_uploaded_file($tmp_name,$location.$name))
							 {
								 echo "upload successfully";
							 }
							 else{
								 echo "fialed to upload";
							 }

						 }else
						 {
							 echo "only jpg  less than 5MB ";
						 }
						
					 }else
					 {
						 echo "please select file";
					 }
				}

                $sql = "INSERT INTO produits (name , description , catid,	price , thumb) VALUES ('$name',' $description',' $category','$price','')";
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
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="productname">product name</label>
							<input type="text" class="form-control" id="productname" name="productname"  placeholder="product name">
						</div>
						<div class="form-group">
						<label for="productdiscreption">product description</label>
							<textarea class="form-control" name="productdiscreption" id="productdiscreption"  rows="3"></textarea>
						
						</div>
						<div class="form-group">
						<label for="productprice">product price</label>
						<input type="text" class="form-control" id="productprice" name="productprice" laceholder="product price">
						</div>
						<div class="form-group">
							
						<label for="productcategory">product category</label>
						<select class="form-control" name="productcategory" id="productcategory">

						<option value="">--select category--</option>
						<?php 
                          require_once '../config/connecte.php'   ;
                         $sql="SELECT * FROM category";
                         $res = mysqli_query($connection,$sql);
                         while($r = mysqli_fetch_assoc($res)) {
						 ?> 
						 <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                        <?php   } ?>
						</select>
							<!-- <input type="text" class="form-control" id="productprice" class="productprice" placeholder="product price"> -->
						</div>
						<div class="form-group">
						<label for="productimage">product image</label>
						
						
							<input type="file" id="productimage" name="productimage" >
						<small>*jpg or png only </small> 
							
						</div>
						<button type="submit" class="btn btn-default">submit</button>
				</form>
			</div>
		</div> 	
	</section>

	
    <?php include'inc\footer.php'; ?>
