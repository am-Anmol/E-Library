<?php 
   include('config.php');
        $id=$_GET['ISBN'];
        $sql="DELETE FROM `books`WHERE ISBN='$id'";
        $res=mysqli_query($conn,$sql);
        $msg="Book Deleted Successfully";
        header("Location: /elibrary/index.php?msg=$msg");  
    
?>