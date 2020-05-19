<?php

$connection=mysqli_connect('localhost','root','','ecomphp');

if(!$connection)
{
    echo "enable to connect to the data base" ."<br> <br>";
    echo "enable errno ". mysqli_connect_errno()."<br><br> " ;
    echo "enable error" . mysqli_connect_error()."<br> <br>";
    exit;

}















?>