<?php
include('config.php');
$limit=3;
if (isset($_GET['page']))
{$page=$_GET['page'];}
else{$page=1;}
$offset=($page-1)*$limit;
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
                <form class="d-flex" action="/elibrary/Search.php" method="GET">
                    <input type='hidden'  name='page' value=<?php echo $page; ?>>
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
  <div class="container me-2 mt-2 d-flex justify-content-end "> 
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Sort
        </button>
        <ul class="dropdown-menu " >
            <li><a class="dropdown-item text-center" href="/elibrary/Sort.php?ord=ASC">A-Z</a></li>
            <li><a class="dropdown-item text-center" href="/elibrary/Sort.php?ord=DESC">Z-A</a></li>
        </ul>
    </div>
  </div>
    
    <br>
     <div class="container ">
        <div class='row row-cols-1 row-cols-md-3 g-3 '>
     <?php 
        
        $sq="SELECT * FROM `books` ORDER BY ISBN LIMIT $offset,$limit ";
        $r=mysqli_query($conn,$sq);
        if($r)
        {
            while($row = mysqli_fetch_assoc($r))
            { 
                echo " <div class='col '>
                <div class='card text-center h-100 border-dark' >
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
     ?>
        </div>
     </div>

    <nav aria-label="Page navigation example">
     <?php 
         
        $sql="SELECT * FROM `books`";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $total_record=mysqli_num_rows($result);
            $total_page=ceil($total_record/$limit);
            echo '<ul class="pagination justify-content-center p-2">';
            if($page>1){
                echo '<li class="page-item"><a class="page-link" href="/elibrary/index.php?page='.($page-1).'">&laquo;</a></li>';
            }
            
            for($i=1;$i<=$total_page;$i++)
            {  if($i==$page)
                {$active="active";
                }else{$active="";}
               echo ' <li class="page-item '.$active.'"><a class="page-link" href="/elibrary/index.php?page='.$i.'">'.$i.'</a></li> ';
            }
            if($total_page>$page){
            echo'<li class="page-item"><a class="page-link" href="/elibrary/index.php?page='.($page+1).'">&raquo;</a></li>';
            }
            echo '</ul>';
        }
    ?>
  </nav>

    

  <footer class="footer mt-auto py-3 bg-light" style="text-align: center; " >
    <div class="container" >
        <span class="text-right">&#169;Copyright ColoredCow 2021</span>
    </div>
  </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
     
</body>
</html>