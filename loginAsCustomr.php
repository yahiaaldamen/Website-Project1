<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $email=$_POST['email'];
   $password=$_POST['password'];

 

   include_once 'include/dbh.inc.php';

   
   $sql="SELECT *FROM customer WHERE Email='$email' AND Password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows==1){
    header("Location: mainAfterLog.php");
    exit();
   }
   else{
      echo "Wrong Password Or UserName";
   }
    $conn->close();
  }

  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="navbar.css">
    
    <title>Login</title>
  </head>
  <body>
    <!-- Navbar Start -->
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
                <i class="bi bi-person-circle"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    fill="currentColor"
                    class="bi bi-person-circle"
                    viewBox="0 0 16 16"
                  >
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path
                      fill-rule="evenodd"
                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 
                      11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
                    /></svg
                ></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="loginAsCustomr.php">Sign in</a></li>
                <li><a class="dropdown-item" href="signup.php">Sign up</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>




    <!----------------------- Main Container -------------------------->

    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <!----------------------- Login Container -------------------------->

      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div
          class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
        >
          <div class="featured-image mb-3">
            <img src="images/logo.png" class="img-fluid" width="350px"/>
          </div>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Hello,Again</h2>
              <p>We are happy to have you back.</p>
            </div>
            <form method="post" action="loginAsCustomr.php">
            <div class="input-group mb-3">
              <input
                type="email"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Email address"
                name="email"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="password"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Password"
                name="password"
              />
            </div>
            <div class="input-group mb-5 d-flex justify-content-between">
              <div class="form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="formCheck"
                />
                <label for="formCheck" class="form-check-label text-secondary"
                  ><small>Remember Me</small></label
                >
              </div>
            </div>
            <div class="input-group mb-3">
              <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
            </div>

            <div class="row">
              <small
                >Don't have account? <a href="signup.php">Sign Up</a></small
              >
              <small
                > <a href="loginAsAdmin.php">log in as admin</a></small
              >
              <small
                ><a href="loginAsGuide.php">log in as guide</a></small
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
