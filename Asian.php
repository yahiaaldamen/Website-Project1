

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
      a{
        text-decoration: none;
         
        
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="mainAfterLog.php" id="logo"
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
              <a class="nav-link active" href="mainAfterLog.php">Home</a>
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
          <h1><span>B</span>ook packages With Us!</h1>
        </div>


          <div class="col-md-6 py-3 py-md-0">
            <form action="Asian.php" method="post">
              <input 
                list="pa"
                type="text"
                class="form-control"
                placeholder="Choose Country"
                name="country"
                required
              />
              <?php

              include_once 'include/dbh.inc.php';

                   $sql = "SELECT 
                         
country FROM packages";
                  $result = $conn->query($sql);

                      // Check if there are any rows returned
                     if ($result->num_rows > 0) {
                   echo '<datalist id="pa">';
                      // Output options based on the database query result
                  while($row = $result->fetch_assoc()) {
                      echo '<option value="' . $row['country'] . '">';
                              }
                             echo '</datalist>';
                              } else {
                                echo "No options available";
                              }
                             ?>
              
              
              
              <br />


              <input
                type="number"
                class="form-control"
                placeholder="Preferred price"
                min="1"
                max="2500"
                name="price"
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
           $City=$_POST['country'];
           
           $pricee=$_POST['price'];
          
          
        
        
        
        $dbservername="localhost";
        $dbusername="root";
        $dapassword="";
        $dbname="dbtravel";
        
        $conn = mysqli_connect($dbservername ,$dbusername, $dapassword,$dbname);
        
           
           $sql="SELECT *FROM packages WHERE country ='$City' AND Price <='$pricee';";
           $result=$conn->query($sql);
           
        
       
        // Step 3: Fetch and display data
        if ($result->num_rows > 0) {
          echo'<h2>Avalible packages</h2>';

            while ($row = $result->fetch_assoc()) {
              
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="./packages/'. $row["img"].'"  class="card-img-top" alt="' . $row["country"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["country"] . '</h5>';
                echo '<h3 class="card-text">' . $row["include"] . '</h3>';
                echo '<p class="card-text">' . $row["days"] .  " Days".'</p>';
                echo '<p class="card-text">' . $row["stars"] .  " Stars ".'</p>';
                echo '<p class="card-text">' . $row["price"] . "$".'</p>';
                echo'<a href="payment.php" class="button-link">Book?</a>
                ';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No packages found</p>";
        }
      }
        $conn->close();
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
