

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Booking</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Link -->

    <!-- Font Awesome Cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <!-- Font Awesome Cdn -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
    <style>
      .book {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php" id="logo"
          ><span>E</span>asyGoVoyage</a
        >

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#mynavbar"
        >
          <span><i class="fa-solid fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav ms-auto mb-1">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#book">Book</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallary">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>

            
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-circle"><i class="fa fa-sign-out" style="font-size:15px;color:red"></i></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Log Out</a></li>
             
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    
    <section class="book" id="book">
      <div class="container">
        <div class="main-text">
          <h1><span>B</span>ook Laxury Car With Us!</h1>    
        </div>

        <div class="row">
          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="./images/carLogo.png" alt="" />
            </div>
          </div>

          <div class="col-md-6 py-3 py-md-0">
            <form action="carBook.php" method="post">
              <input
               list="Airport"
                type="text"
                class="form-control"
                placeholder="Airport"
                name="Airport"
                required
              />
              <?php

include_once 'include/dbh.inc.php';

     $sql = "SELECT 
           airport FROM cars";
    $result = $conn->query($sql);

        // Check if there are any rows returned
       if ($result->num_rows > 0) {
     echo '<datalist id="Airport">';
        // Output options based on the database query result
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['airport'] . '">';
                }
               echo '</datalist>';
                } else {
                  echo "No options available";
                }
               ?>

              <br />


              <input
               list="car"
                type="CarType"
                class="form-control"
                placeholder="Car Type"
                name="CarType"
                required
              />
              <?php

include_once 'include/dbh.inc.php';

     $sql = "SELECT 
           cartype FROM cars";
    $result = $conn->query($sql);

        // Check if there are any rows returned
       if ($result->num_rows > 0) {
     echo '<datalist id="car">';
        // Output options based on the database query result
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['cartype'] . '">';
                }
               echo '</datalist>';
                } else {
                  echo "No options available";
                }
               ?>
              <br />
              
              <input
                type="price"
                class="form-control"
                placeholder="Price"
                name="price"
                required
            
             
              
<br />
              Start date
              <input
                type="date"
                class="form-control"
                placeholder="Arrivals"
                name="date1"
                required
              /><br />
              End date
              <input
                type="date"
                class="form-control"
                placeholder="Leaving"
                name="date2"
                required
              /><br />
             
              <input
               
                
                type="submit"
                value="Dispaly"
                class="submit"
                required
              />
            </form>
          </div>
        </div>
      </div>
    </section>
<div class="container">
    
    <div class="row">
        <?php
        
        // Step 1: Database connection
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $airportt=$_POST['Airport'];
           $type=$_POST['CarType'];
           $pricee=$_POST['price'];
           
           $date1=$_POST['date1'];
           $date2=$_POST['date2'];
          
        
        
           include_once 'include/dbh.inc.php';
        
           
           $sql="SELECT *FROM cars WHERE airport ='$airportt' AND cartype='$type' AND price <='$pricee';";
           $result=$conn->query($sql);
           
        
       
        // Step 3: Fetch and display data
        if ($result->num_rows > 0) {
          echo'<h2>Avalible Cars</h2>';

            while ($row = $result->fetch_assoc()) {
              
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="./cars/'. $row["img"].'"  class="card-img-top" alt="' . $row["carNmae"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["carNmae"] . '</h5>';
                echo '<h3 class="card-text">' . $row["cartype"] . '</h3>';
                
                echo '<p class="card-text">' . $row["price"] . "$".'</p>';
                echo'<a href="listActions.php" class="button-link">Book?</a>
                ';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No hotels found</p>";
        }
      }
       
        ?>
    </div>
</div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>
