<?php 
   include('config.php');
        $id=$_GET['ISBN'];
        $bookName=$_POST['bookName'];
        $bookAuthor=$_POST['bookAuthor'];
        $pname = "images/".rand(1000,10000)."-".$_FILES["image"]["name"];
        $tname = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tname, $pname);
        $bookDesc=$_POST['bookDesc'];
        $sql="UPDATE books SET Name='$bookName',Author= '$bookAuthor' , Description='$bookDesc' ,Cimage='$pname' WHERE ISBN='$id'";
        $res=mysqli_query($conn,$sql);
        $msg="Book Edited Successfully";
        header("Location: /elibrary/View_Book_Details.php?ISBN=$id&msg=$msg");    
?>