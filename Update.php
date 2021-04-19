<?php 
   include('config.php');
        $id=$_GET['ISBN'];
        $BookName=$_POST['BookName'];
        $BookAuthor=$_POST['BookAuthor'];
        $CoverImg=$_POST['CoverImg'];
        $BookDesc=$_POST['BookDesc'];
        $sql="UPDATE books SET Name='$BookName',Author= '$BookAuthor' , Description='$BookDesc' ,Cimage='$CoverImg' WHERE ISBN='$id'";
        $res=mysqli_query($conn,$sql);
        header("Location: /elibrary/index.php");
    
   
    
?>