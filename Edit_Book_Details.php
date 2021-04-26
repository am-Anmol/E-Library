<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Edit Book</title>
    <link rel = "icon" href = "/elibrary/img/logo.svg" type = "image/x-icon">
</head>
<style>
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;           
}
</style>
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
<?php
 include('config.php');
 $id = $_GET['ISBN'];
 $sql = "SELECT * FROM books WHERE ISBN=$id";
 $res=mysqli_query($conn,$sql);
    
  if(mysqli_num_rows($res)>0)
  {
    while($data = mysqli_fetch_assoc($res))
    {      
?>
    <div class="container mt-4">
        <form action="/elibrary/Update_Book.php?ISBN=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3 ">
                <label for="bookName" class="form-label">Enter Book Name</label>
                <input value="<?php echo $data['Name']; ?>" type="text" class="form-control" name="bookName" id="bookName" aria-describedby="emailHelp">
            </div>
            <div class="form-group mb-3">
                <label for="bookAuthor" class="form-label">Enter Book Author</label>
                <input value="<?php echo $data['Author']; ?>" type="text" class="form-control"  name="bookAuthor" id="bookAuthor">
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label">Enter Book Cover Image</label>
                <input  type="file" class="form-control"  name="image" id="image">
                <spam> <p><?php echo substr($data['Cimage'],12); ?></p> </spam>
            </div>
            <div class="form-group mb-3">
                <label for="bookDesc" class="form-label">Enter Book Description</label>
                <textarea  type="text" class="form-control"  name="bookDesc" id="bookDesc" cols="30" rows="6"><?php echo $data['Description']; ?></textarea>
            </div>
            <button type="submit" name="Update" value="Update" class="btn btn-primary ">Update</button>
        </form>
    </div>
<?php
      }
    }
?>
    <br>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>