<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
	       if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
                header('location: login.php');
                
				
			}	
            

            if(isset($_GET) & !empty($_GET))
            {
                require_once '../config/connecte.php'   ;
                $id = $_GET['id'];
                $sql = " DELETE FROM category WHERE id='$id' ";
                if(mysqli_query($connection,$sql))
                {
                    header('location : catalogue.php');
                    
                    
                }

            }
            else
            {
                header('location : catalogue.php');
                
            } 
        
      ?>