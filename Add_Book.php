<?php 
   include('config.php');
   $flag=0;
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
       if (isset($_POST['submit'])){
        $BookName=$_POST['BookName'];
        $BookAuthor=$_POST['BookAuthor'];
        $CoverImg=$_POST['CoverImg'];
        $BookDesc=$_POST['BookDesc'];
        $sql="INSERT INTO `books` (`Name`, `Author`, `Description`, `Cimage`) VALUES ('$BookName', '$BookAuthor','$BookDesc','$CoverImg')";
        $res=mysqli_query($conn,$sql);
        $msg="Book Added Successfully";
        $flag=1;
        }
        if($flag==1)
    {   
        $s="SELECT * FROM books WHERE Name='$BookName'";
        $r=mysqli_query($conn,$s);
        $data = mysqli_fetch_assoc($r);
        $ISBN=$data['ISBN'];
        header("Location: /elibrary/View_Book_Details.php?ISBN=$ISBN&msg=$msg"); 
    
    }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Add Book</title>
    <link rel = "icon" href = "/elibrary/img/logo.svg" type = "image/x-icon">
</head>
<body style="background-color: #dee2e6;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/elibrary/index.php">
                <img src="img/logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top" onclick="window.location.href='/elibrary/index.php';">
                E-Library
            </a>
            <form class="d-flex me-4">
                <button type="button" class="btn btn-outline-danger " onclick="window.location.href='/elibrary/index.php';">Back</button>
            </form>
        </div>
    </nav>
    <div class="container mt-4 "  >
        <form action="/elibrary/Add_Book.php" name="addBook" onsubmit="return validateForm()" method="POST">
            <div class="form-group mb-3 " id="bname">
                <label for="BookName" class="form-label">Enter Book Name <b style="color:#dc3545;">*</b></label>
                <input type="text" class="form-control" name="BookName" id="BookName" >
                <strong><span class="formerror alert-danger" ></span></strong>                
            </div>
            <div class="form-group mb-3" id="Aname">
                <label for="BookAuthor" class="form-label">Enter Book Author <b style="color:#dc3545;">*</b></label>
                <input type="text" class="form-control"  name="BookAuthor" id="BookAuthor" >
                <strong><span class="formerror alert-danger" ></span></strong>
            </div>
            <div class="form-group mb-3">
                <label for="CoverImg" class="form-label">Enter Book Cover Image</label>
                <input type="text" class="form-control"  name="CoverImg" id="CoverImg">
            </div>
            <div class="form-group mb-3">
                <label for="BookDesc" class="form-label">Enter Book Description</label>
                <textarea class="form-control"  name="BookDesc" id="BookDesc" cols="30" rows="6"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit"  >Submit</button>
        </form>
    </div>
    <br>
    <footer class="footer mt-auto py-3 bg-light" style="text-align: center; " >
        <div class="container" >
            <span class="text-right">&#169;Copyright ANMOL GUPTA 2021</span>
        </div>
    </footer>
      
<script src="/elibrary/Form_Valid.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>