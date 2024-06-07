<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Travela - Tourism Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

     
    <!-- Navbar Start -->
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
              <i class="fa fa-sign-out" style="font-size:15px;color:red"></i></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4"><span style="color:#5050c5">O</span>ur Travel Guides</h1>
                
            </div>
        </div>
        <!-- Header End -->

        <!-- Travel Guide Start -->
        <div class="container-fluid guide py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    
                    <h1 class="mb-0" style="color: #5050c5;" >Meet Our Guide</h1>
                </div>
                
              
    
                <section class="book" id="book">
     


          <div class="col-md-6 py-3 py-md-0">
            <form action="guides.php" method="post">
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
           
           Address FROM guide";
    $result = $conn->query($sql);

        // Check if there are any rows returned
       if ($result->num_rows > 0) {
     echo '<datalist id="pa">';
        // Output options based on the database query result
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['Address'] . '">';
                }
               echo '</datalist>';
                } else {
                  echo "No options available";
                }
               ?>



<br />

               <label for="g">Preferred date</label>
              <input
              id="g"
                type="date"
                class="form-control"
                placeholder="Preferred date"
                
                name="date"
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




    <div class="row">
        <?php
        
        // Step 1: Database connection
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $Address=$_POST['country'];
           $date=$_POST['date'];
           
               
        
        
        $dbservername="localhost";
        $dbusername="root";
        $dapassword="";
        $dbname="dbtravel";
        
        $conn = mysqli_connect($dbservername ,$dbusername, $dapassword,$dbname);
        
           
           $sql="SELECT *FROM guide WHERE Address ='$Address' ;";
           $result=$conn->query($sql);
           
        
       
        // Step 3: Fetch and display data
        if ($result->num_rows > 0) {
          echo'<h2>Avalible Guides</h2>';

            while ($row = $result->fetch_assoc()) {
              
                echo '<div class="col-md-3 mb-4">';
                echo '<div class="card">';
                echo '<img src="./img/'. $row["img"].'"  class="card-img-top" alt="' . $row["Address"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["FirstName"] ." ".$row["LastName"]. '</h5>';
                echo '<h6 class="card-text">' ."languages :". $row["language"] . '</h6>';
                echo '<p class="card-text">' . $row["Address"] . '</p>';
                echo '<p class="card-text">' .  $date . '</p>';
                echo'<a href="sendReq.php" class="button-link" id="bookButton">Book?</a>
                ';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No Guides found</p>";
        }
      }
        $conn->close();
        ?>
    </div>
</div>

<!-- The Modal -->
    <div id="modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="bookingForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>




        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>