

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EasyGoVoyage</title>

    <link rel="stylesheet" href="style.css" />

    <!-- Bootstrap Link -->
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
    <!-- Google Fonts -->
  </head>
  <body>


      
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="#home" id="logo"
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

    <!-- Navbar End -->

    <!-- Home Section Start -->
    <div>
    <div class="home">
      <div class="content">
        <h5>Welcome To EasyGoVoyage</h5>
        <h1>Visit <span class="changecontent"></span></h1>
        <p style="font-weight: 800">
          Discover your favorite destination and book your ticket with just a
          few clicks.
        </p>
        <a href="#book">Book Place</a>
      </div>
    </div>
    <!-- Home Section End -->

    <!-- Section Book Start -->
    <section class="book" id="book">
      <div class="container">
        <div class="main-text">
          <h1><span>B</span>ook ticket</h1>
        </div>

        <div class="row">
          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="./images/Book.jpg" alt="" />
            </div>
          </div>

          <div class="col-md-6 py-3 py-md-0">
          <?php if (isset($message)): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
            <form method="post" action="mainAfterLog.php">
              
              <input
              list="from"
                type="text"
                class="form-control"
                placeholder="Where To"
                name="destination"
                required
              />
               <?php

include_once 'include/dbh.inc.php';

$sql = "SELECT 
Destination FROM bookticket";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    echo '<datalist id="from">';
    // Output options based on the database query result
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['Destination'] . '">';
    }
    echo '</datalist>';
} else {
    echo "No options available";
}
?>

              <br />

              <input
              list="to"
                type="text"
                class="form-control"
                placeholder="From Where"
                name="fromWhere"
                required
              />
              <?php

include_once 'include/dbh.inc.php';

$sql = "SELECT TheStartingPoint FROM bookticket";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '<datalist id="to">';
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['TheStartingPoint'] . '">';
    }
    echo '</datalist>';
} else {
    echo "No options available";
}
?>
<br />
              <input
                type="text"
                class="form-control"
                placeholder="Traveller(s)"
                name="Traveller(s)"
                required
              /><br />
              <input
                type="text"
                list="colorList"
                class="form-control"
                placeholder="Flight class"
                name="tripType"
                required
              />
              <datalist id="colorList">
    <option value="First Class">
    <option value="Business">
    <option value="Economy">
  </datalist><br />
              <input
                type="date"
                class="form-control"
                placeholder="Arrivals"
                name="date1"
                required
              /><br />
              <input
                type="date"
                class="form-control"
                placeholder="Leaving"
                name="date2"
                required
              /><br />
               
              <input type="submit" value="Book Now" class="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallPageModal" required />
              
              </div>

              <div class="container">
    
    <div class="row">
        <?php
        
        // Step 1: Database connection
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
           $des=$_POST['destination'];
           $from=$_POST['fromWhere'];
           $type=$_POST['tripType'];
           
           $date1=$_POST['date1'];
           $date2=$_POST['date2'];
          
        
        
           include_once 'include/dbh.inc.php';
        
           
           $sql="SELECT *FROM bookticket WHERE TheStartingPoint ='$from' AND Destination='$des' ";
           $result=$conn->query($sql);
           
        
       
        // Step 3: Fetch and display data
        if ($result->num_rows > 0) {
          echo'<h2>Avalible Tickets</h2>';

            while ($row = $result->fetch_assoc()) {
              
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="./ticket/'. $row["img"].'"  class="card-img-top" alt="' . $row["Destination"] . '">';
                echo '<div class="card-body">';
                echo '<h4 class="card-title">' . $row["TheStartingPoint"] . "-".$row["Destination"].'</h4>';
                echo '<h4 class="card-text">' . $row["LineType"] . '</h4>';
                
                echo '<p class="card-text">' .'<h5>'. $row["Flightclass"] .'</h5>'.'</p>';
                echo '<p class="card-text">' .'<h5>'. $row["Date1"] .'</h5>'.'</p>';
                echo '<p class="card-text">' .'<h5>' .$row["Price"] . "$".'</h5>'.'</p>';

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
      

















    <div class="modal fade" id="smallPageModal" tabindex="-1" aria-labelledby="smallPageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="smallPageModalLabel">Small Page</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>This is the content of the small page.</p>
          </div>
        </div>
      </div>
    </div>
          
    </section>
    <!-- Section Book End -->
    
    

<!-- Section Services Start -->
<section class="services" id="services">
      <div class="container">
        <div class="main-txt">
          <h1><span>S</span>ervices</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-hotel"></i>
              <div class="card-body">
                <h3>
                  <a style="color: black;" href="hotelBook.php">Affordable Hotel</a>
                </h3>
                <p>
                You can book a hotel and enjoy a comfortable stay without spending a lot of money.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-car"></i>
              <div class="card-body">
                <h3>
                <a style="color: black;" href="carBook.php">Luxury Cars</a>

                </h3>
                <p>
                From here, you can confidently select the transportation option that best fits your needs.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-bullhorn"></i>
              <div class="card-body">
                <h3>
                  <a style="color: black;" href="guides.php">Safty Guide</a>
                </h3>
                <p>
                You can choose a tour guide who will accompany you throughout your trip with sufficient experience.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div></div>
        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-map-marked-alt"></i>
              <div class="card-body">
              <h3>
                  <a style="color: black;" href="asian.php">Amazing Packages</a>
                </h3>                <p>
                Simplify your booking process and save time, effort and money with our packages.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-plane"></i>
              <div class="card-body">
                <h3><a style="color: black;" href="#book">Fastest Travel</a></h3>
                <p>
                You can book your ticket easily and smoothly according to your preferences
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fab fa-cc-visa"></i>
              <div class="card-body">
                <h3>Easy payment</h3>
                <p>
                Enjoy easy payments—now simpler than ever
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Services End -->

    <!-- Section Gallary Start -->
    <section class="blog" id="blog">
      <div class="container">
        <div class="main-txt">
          <h1><span>B</span>log</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g1.png" alt="" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g2.png" alt="" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g3.png" alt="" height="230px" />
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g4.png" alt="" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g5.png" alt="" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/g6.png" alt="" height="230px" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Gallary End -->

    <!-- About Start -->
    <section class="about" id="about">
      <div class="container">
        <div class="main-txt">
          <h1>About <span>Us</span></h1>
        </div>

        <div class="row" style="margin-top: 50px">
          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="./images/logo.png" alt="" />
            </div>
          </div>

          <div class="col-md-6 py-3 py-md-0">
            <h2>How Travel Agency Work ...</h2>
            <p>
              At EasyGo Voyage, we see ourselves as more than just facilitators
              – we collaborate with you in organizing your trip. We have a range
              of accommodation options for all levels. We have selected the best
              in its category - whether it is a 5, 4 or 3-star hotel, you will
              travel in style and be guaranteed a comfortable and luxurious
              stay. We offer ticket prices that suit you. Furthermore, we offer
              you friendly and experienced guides and drivers who will accompany
              you throughout your trip, so you can rest assured that your
              experience goes smoothly with the help of locals. And to ease any
              worries about getting around, we arrange transportation from the
              airport to your accommodation. EasyGo Voyage is the result of a
              dream to have a leading travel agency offering the world in an
              extraordinary way and trips with a different taste by adhering to
              the highest standards. So, with EasyGo Voyage Travel Agency,
              you're in good hands.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- About End -->

    <!-- Footer Start -->
    <style>
      i a{
      background-color: #5050c5;
      color: white;
      text-decoration: none;
       
     }
     i a:hover{
      background-color: white;
     }
    </style>
    <footer id="footer">
      <h1><span>E</span>asyGoVoyage</h1>
      <p style="font-weight: 500">
        Our social networks<br />
        Follow us
      </p>
      <div class="social-links">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <br>
        <i><a href="feedback.php">feedback</a></i>
        
         
        </p>
      </div>

      <div class="copyright">
        <p>&copy;All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer End -->

    <script>
    // Function to open the modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Function to close the modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}
</script>

    <script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
