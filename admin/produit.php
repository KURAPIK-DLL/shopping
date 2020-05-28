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

    <tr>
      <th scope="row">S.NO</th>
      <td>product name</td>
      <td>category name</td>
      <td>yes/no name</td>
      <td> <a href=""><button type="button" class="btn btn-danger">EDIT</button></a> <a href=""><button type="button" class="btn btn-danger">DELETE</button></a></td>
  </tr> 
			
  </tbody>
		
</table>
			</div>
		</div>
	</section>
    <?php include'inc\footer.php'; ?>
