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
                $sql = " DELETE FROM category WHERE id='$id' ";
                if(mysqli_query($connection,$sql))
                {
                    header('location : catalogue.php');
                    exit();
                    
                }

            }
            else
            {
                header('location : catalogue.php');
                exit();
            } 
        
      ?>