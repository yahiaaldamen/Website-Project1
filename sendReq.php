
<?php 

include_once 'include/dbh.inc.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $fullname=$_POST['name'];
    $email=$_POST['email'];
    $date=$_POST['date'];
    $Duration=$_POST['Duration'];
    $loc=$_POST['location'];

     
    

     
        $insertQuery="INSERT INTO requests(
          traveler_name,trip_date,location,days,Email)
                       VALUES ('$fullname','$date','$loc','$Duration','$email')";
            if($conn->query($insertQuery)==TRUE){
                header("location: guides.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     
   

}

?>
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
 <!-- #region -->
 <!-- #region -->
  

       
 <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Hello</h2>
              <p>Fill Your Info</p>
            </div>
            <form method="post" action="sendReq.php">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Full Name"
                name="name"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="email"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Email"
                name="email"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="date"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Trip Date"
                name="date"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="number"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Duration"
                min="0"
                max="100"
                name="Duration"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="text"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Location"
                name="location"
              />
            </div>
           
            <div class="input-group mb-3">
              <button class="btn btn-lg btn-primary w-100 fs-6">Send Request</button>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </form>
  
   





  
</body>
</html>