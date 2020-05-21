<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
			if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
				//exit();
			}
				 
				 
			


      ?>
<?php include'inc/header.php'; ?>
<?php include'inc/nav.php'; ?>
			
	
	

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
			<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">category name</th>
      <th scope="col">operations</th>
     
    </tr>
  </thead>

  <tbody>
  <?php 
  $sql="SELECT * FROM category";
  $res = mysqli_query($connection,$sql);
  while($r = mysqli_fetch_assoc($res)) {
   ?>
    <tr>
      <th scope="row"><?php echo $r['ID']; ?></th>
      <td><?php echo $r['name']; ?></td>
      <td> <a href="editcategory.php?id=<?php echo $r['ID']; ?>"><button type="button" class="btn btn-danger">EDIT</button></a> <a href="delcategory.php?id=<?php echo $r['ID']; ?>"><button type="button" class="btn btn-danger">DELETE</button></a></td>
  </tr> <?php }  ?>
			</table>
			
	
</table>
			</div>
		</div>
	</section>
    <?php include'inc\footer.php'; ?>
