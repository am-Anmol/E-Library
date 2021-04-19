<?php
include('config.php');
$limit=3;
$Search=$_GET['Search'];
if (isset($_GET['page']))
{$page=$_GET['page'];}
else{$page=1;}
$offset=($page-1)*$limit;
$sq="SELECT * FROM `books` WHERE ((Name LIKE '$Search%') OR (Author LIKE '$Search%') OR (Name LIKE '%$Search%') OR (Author LIKE '%$Search%')) LIMIT $offset,$limit";
$r=mysqli_query($conn,$sq);
$sr=mysqli_num_rows($r);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Search Result</title>
    <link rel = "icon" href = "/elibrary/img/logo.svg" type = "image/x-icon">
</head>
<body style="background-color: #dee2e6;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
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
                <form class="d-flex" action="/elibrary/Search.php" name="addBook" method="GET">
                    <input class="form-control  me-2" type="search" name="Search" placeholder="Search" aria-label="Search" required>
                    
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
                <div >
                <button type="button" class="btn btn-outline-primary add-book"
                    onclick="window.location.href='/elibrary/Add_Book.php';">Add Book</button>
                </div>
            </div>
        </div>
    </nav>  
    

    <br>
     <div class="container ">
     <h2><a href='/elibrary/index.php'><img src='https://img.icons8.com/metro/26/000000/circled-left-2.png'/></a> <?php echo $sr; ?> Search Result for  "<u><?php echo strtoupper( $Search);?></u>"</h2>
        <div class='row row-cols-1 row-cols-md-3 g-3 mt-3'> 
     <?php    
        if($Search)
        {   if(mysqli_num_rows($r)>0)
            {
            while($row = mysqli_fetch_assoc($r))
            { 
                echo " <div class='col'>
                <div class='card text-center h-100 border-dark ' >
                  <img src=".$row['Cimage']. " class='card-img-top' alt='Not avaible' style=' width='500' height='600';'>
                  <div class='card-body '>
                          <h5 class='card-title'>". $row['Name'] . "</h5>
                          <h5 class='card-author'>". $row['Author'] . "</h5>
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
            else{
                echo"<div style='color:#dc3545;'><h3> &nbsp;&nbsp;&nbsp; No Result Found </h3></div>";
            }
        }
        else{
            echo"<div style='color:#dc3545;'><h3> &nbsp;&nbsp;&nbsp; No Result Found </h3></div>";
        }
     ?>
        </div>
     </div>
     

     <nav aria-label="Page navigation example">
     <?php 
         
        $sql="SELECT * FROM `books` WHERE ((Name LIKE '$Search%') OR (Author LIKE '$Search%') OR (Name LIKE '%$Search%') OR (Author LIKE '%$Search%')) ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $total_record=mysqli_num_rows($result);
            $total_page=ceil($total_record/$limit);
            echo '<ul class="pagination justify-content-center p-2">';
            if($page>1){
                echo '<li class="page-item"><a class="page-link" href="/elibrary/Search.php?Search='.($Search).'&page='.($page-1).'">&laquo;</a></li>';
            }
            
            for($i=1;$i<=$total_page;$i++)
            {  if($i==$page)
                {$active="active";
                }else{$active="";}
               echo ' <li class="page-item '.$active.'"><a class="page-link" href="/elibrary/Search.php?Search='.($Search).'&page='.$i.'">'.$i.'</a></li> ';
            }
            if($total_page>$page){
            echo'<li class="page-item"><a class="page-link" href="/elibrary/Search.php?Search='.($Search).'&page='.($page+1).'">&raquo;</a></li>';
            }
            echo '</ul>';
        }
    ?>
  </nav>






   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>