<?php 
			session_start();
			require_once '../config/connecte.php'   ;  
			if(!isset($_SESSION['email']) &  empty($_SESSION['email']) )
			{
				header('location: login.php');
				exit();
            }
if(isset($_GET['id']) && !empty($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT thumb  FROM produits WHERE id = $id ";
$res = mysqli_query($connection,$sql);
$r = mysqli_fetch_assoc($res);
if(!empty($r['thumb']))
{
    if(unlink($r['thumb']))
    {
        $delsql ="DELETE FROM  produits  WHERE id=$id ";
        if(mysqli_query($connection,$delsql))
        {
            header('location: produit.php');
        }
    }
}else
{ 
    
    $delsql ="DELETE FROM  produits  WHERE id=$id ";
    if(mysqli_query($connection,$delsql))
    {
        header('location: produit.php');
    }

}

}else
{
    header('location: produits.php');
}


    



            ?>