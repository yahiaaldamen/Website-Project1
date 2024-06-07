<?php
include_once 'include/dbh.inc.php';
  

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

    <!-- Navbar End -->

    <!-- Home Section Start -->
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
            <form action="#">
              <input
                type="text"
                class="form-control"
                placeholder="Where To"
                required
              /><br />
              <input
                type="text"
                class="form-control"
                placeholder="From Where"
                required
              /><br />
              <input
                type="text"
                class="form-control"
                placeholder="How Many"
                required
              /><br />
              <input
                type="date"
                class="form-control"
                placeholder="Arrivals"
                required
              /><br />
              <input
                type="date"
                class="form-control"
                placeholder="Leaving"
                required
              /><br />

              <input onclick="no()" type="submit" value="Book Now" class="submit" required />
            </form>
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
                <h3>Luxury Cars</h3>
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
                <h3>Amazing Packages</h3>
                <p>
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
    <footer id="footer">
      <h1><span>E</span>asyGoVoyage</h1>
      <p style="font-weight: 500">
        Our social networks<br />
        Follow us
      </p>
      <div class="social-links">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <p>
          <a href="http://"
            ><button><p>give us feedback</p></button></a
          >
        </p>
      </div>

      <div class="copyright">
        <p>&copy;All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer End -->
     <script>
      function no(){
        window.alert("log in first!");
      }
     </script>
    <script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
