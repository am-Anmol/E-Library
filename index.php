<?php 
   include('config.php');
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
   
        $BookName=$_POST['BookName'];
        $BookAuthor=$_POST['BookAuthor'];
        $CoverImg=$_POST['CoverImg'];
        $BookDesc=$_POST['BookDesc'];
        $sql="INSERT INTO `books` (`Name`, `Author`, `Description`, `Cimage`) VALUES ('$BookName', '$BookAuthor','$BookDesc','$CoverImg')";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Book Inserted Successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } 
    }
   
    
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>E-Library</title>
</head>


<body style="background-color: #dee2e6;">
    <?php include 'config.php';?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/elibrary/index.php">
                <img src="img/logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top"
                    onclick="window.location.href='/index.php';">
                E-Library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <div class="navbar-nav me-auto mb-2 mb-lg-0"></div>
                <form class="d-flex" >
                    <input class="form-control  me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                    <button type="button" class="btn btn-outline-primary me-3 p-2"
                    onclick="window.location.href='/elibrary/Add_Book.php';">AddBook</button>
                </form>
                
            </div>
        </div>
    </nav>
    <br>
     <div class="container ">
        <div class='row row-cols-1 row-cols-md-3 g-3'>
     <?php 
        $sq="SELECT * FROM `books`";
        $r=mysqli_query($conn,$sq);
        if($r)
        {
            while($row = mysqli_fetch_assoc($r))
            { 
                echo " <div class='col'>
                <div class='card text-center h-100 border-dark' >
                  <img src=".$row['Cimage']. " class='card-img-top' alt='Not avaible' style=' width='500' height='600';'>
                      <div class='card-body '>
                          <h5 class='card-title'>". $row['Name'] . "</h5>
                          <h5 class='card-author'>". $row['Author'] . "</h5>
                          <p class='card-text'>". $row['Description'] . "</p>
                      </div>
                      <div class='card-footer bg-transparent border-dark'>
                          <div class='card-body'>
                              <a href='/elibrary/Veiw_Details.php?ISBN=". $row['ISBN'] ." '  class='card-link'>Veiw</a>
                          </div>
                      </div>
                  </div>
               </div>";
            }
        }
     ?>
        </div>
     </div>
    

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center p-2">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>