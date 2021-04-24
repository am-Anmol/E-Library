<?php
 include('config.php');
     $id = $_GET['ISBN'];
     $sql = "SELECT * FROM books WHERE ISBN=$id";
     $res=mysqli_query($conn,$sql);
     if($res){
     $data = mysqli_fetch_assoc($res);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Book Details</title>
    <link rel = "icon" href = "/elibrary/img/logo.svg" type = "image/x-icon">
</head>
<body style="background-color: #dee2e6;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/elibrary/index.php">
                <img src="img/logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top "
                    onclick="window.location.href='/elibrary/index.php';">
                E-Library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <div class="navbar-nav me-auto mb-2 mb-lg-0"></div>
            <form class="d-flex">
                <button type="button" class="btn btn-outline-primary me-3"
                    onclick="window.location.href='/elibrary/Edit_Book_Details.php?ISBN=<?php echo $data['ISBN']; ?>';">Edit details</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
            </form>
        </div>
        </div>
    </nav>
     <?php
      if(isset($_GET['msg'])) {
      echo' <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>'. $_GET['msg'] .'</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    ?>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you really want to delete this book?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='/elibrary/Delete_Book.php?ISBN=<?php echo $data['ISBN']; ?>';">Yes</button>
      </div>
    </div>
  </div>
</div>

  <?php
     if($res){
         echo " <div class='container mt-4 '>
         <div class='row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center'>
             <div class='col'>
                 <div class='card text-center'>
                     <img src=".$data['Cimage']. " class='card-img-top' style=' width='400' height='500';' alt='...'>
                     <div class='card-body border border-dark '>
                         <h5 class='card-title'>". $data['Name'] . "</h5>
                         <h5 class='card-author'>". $data['Author'] . "</h5>
                         <p class='card-text'>". $data['Description'] . " </p>
                     </div>
                 </div>
             </div>
        </div>
     </div>";
     }      
  ?>
    <br>
    <footer class="footer mt-auto  py-3 bg-light" style="text-align: center; " >
      <div class="container" >
          <span class="text-right">&#169;Copyright ANMOL GUPTA 2021</span>
      </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>