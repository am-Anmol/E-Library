<?php 
   include('config.php');
        $id=$_GET['ISBN'];
        $sql="DELETE FROM `books`WHERE ISBN='$id'";
        $res=mysqli_query($conn,$sql);
        header("Location: /elibrary/index.php");  
    
?>