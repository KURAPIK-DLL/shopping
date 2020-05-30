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
			
	
	

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
			<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>product name</th>
      <th>category name</th>
      <th>thunbnail</th>
      <th>operation</th>
     
    </tr>
  </thead>

  <tbody>
  <?php 
  //  require_once '../config/connecte.php'   ;
  $sql="SELECT * FROM produits";
  $res = mysqli_query($connection,$sql);
  while($r = mysqli_fetch_assoc($res)) {
   ?>

    <tr>
      <th scope="row"><?php echo $r['id']; ?></th>
      <td><?php echo $r['name']; ?></td>
      <td><?php echo $r['catid']; ?></td>
      <td><?php if($r['thumb']){echo "YES";}else{echo "NO";} ?></td>
      <td> <a href="editproduct.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger">EDIT</button></a> <a href="delproduct.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger">DELETE</button></a></td>
  </tr> 
  <?php } ?>
  </tbody>
		
</table>
			</div>
		</div>
	</section>
    <?php include'inc\footer.php'; ?>
