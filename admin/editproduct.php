<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
			if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
				exit();
			}
			 
            if(isset($_GET) & !empty($_GET))
            {
                $id = $_GET['id'];

            }else
            {
                header('location : produit.php');
			}
			if(isset($_POST) & !empty($_POST))
            {
                $pname=mysqli_real_escape_string($connection,$_POST['productname']);
                $description=mysqli_real_escape_string($connection,$_POST['productdiscreption']);
                $category=mysqli_real_escape_string($connection,$_POST['productcategory']);
            
				$price=mysqli_real_escape_string($connection,$_POST['productprice']);

				

                 $sql = "UPDATE produits SET description='$description' ,name='$pname' , catid='$category',price='$price' WHERE id=$id";
                $res = mysqli_query($connection,$sql);
   
                if($res)
                {
                    $vmsg= "product updeted";
                   
                }
                else
                {
                    $fmsg= "failed to updete the  product";
                    
                }

            }

      ?>
<?php include'inc/header.php'; ?>
<?php include'inc/nav.php'; ?>
				
	<section id="content">
		<div class="content-blog">
			<div class="container">
			<?php    
						 if(isset($fmsg))
						 { ?>
                           <div class="alert alert-danger" role="alert"><?php echo $fmsg;	 ?></div> <?php  } ?>

	
					

					<?php    
						 if(isset($vmsg))
						 { ?>
                           <div class="alert alert-success" role="alert"><?php echo $vmsg;	 ?> </div> <?php  } ?>

			<?php 
				//  require_once '../config/connecte.php'   ;  
  $sql="SELECT * FROM produits WHERE id = $id ";
  $res = mysqli_query($connection,$sql);
  $r = mysqli_fetch_assoc($res) ;

      ?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="productname">product name</label>
							<input type="text" class="form-control" id="productname" name="productname" placeholder="product name" value="<?php echo $r['name']; ?> ">
						</div>
						<div class="form-group">
						<label for="productdiscreption">product description</label>
							<textarea class="form-control" name="productdiscreption" id="productdiscreption"  rows="3"><?php echo $r['description']; ?></textarea>
						
						</div>
						<div class="form-group">
							
						<label for="productprice">product price</label>
						<input class="form-control" name="productprice" id="productprice" value="<?php echo $r['price']; ?>"></div>

						<div class="form-group">

						<label for="productcategory">product category</label>
						<select class="form-control" name="productcategory" id="productcategory">
						<?php 
                        //   require_once '../config/connecte.php'   ;
                         $catsql="SELECT * FROM category";
                         $catres = mysqli_query($connection,$catsql);
                         while($catr = mysqli_fetch_assoc($catres)) {
						 ?> 
						 
						<option value="<?php echo $catr['id']; ?>" <?php if($catr['id']==$r['catid']){echo "selected";}  ?>> <?php echo $catr['name']; ?> </option>
						<?php }?> 
						</select>
						</div>
							<!-- <input type="text" class="form-control" id="productprice" class="productprice" placeholder="product price"> -->
						
						<div class="form-group">
						<label for="productimage">product image</label>
						<?php  
						if(isset($r['thumb']) & !empty($r['thumb'])) 
						{
							
							?> <br> <img src="<?php echo $r['thumb']; ?>"  width="100px" height="100px">
							<a href="delimag.php?id=<?php echo $r['id']; ?>">Delete Image </a>
						<?php } else { ?>

							<input type="file" id="productimage"  class="productimage">
							<p class="help-block">*jpg or png only</p> <?php } ?> 

						</div>
						<button type="submit" class="btn btn-default">submit</button>
				</form>
			</div>
		</div> 
	</section>

	
    <?php include'inc\footer.php'; ?>
