<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
	       if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
                header('location: login.php');
                
				
			}	
            

            if(isset($_GET) & !empty($_GET))
            {
                
                $id = $_GET['id'];
                $sql = " DELETE FROM category WHERE id='$id' ";
                if(mysqli_query($connection,$sql))
                {
                   // header('location : catalogue.php');
                   echo "<script>window.location.href='catalogue.php';</script>";
                   exit;
                }    
                }else
                {
                    echo "<script>window.location.href='catalogue.php';</script>";
                    exit;
                
                } 
            
      ?>