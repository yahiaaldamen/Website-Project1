<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pakeges</title>

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
  
  <style>
    *{
        text-decoration: none;
    }
    body {
      font-family: 'Sono', sans-serif;
      text-decoration: none;
    }

    .pricing-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      gap: 2rem;
      text-decoration: none;
    }

    .pricing-plan {
      flex: 1;
      max-width: 400px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      text-align: center;
    }

    .plan-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .plan-price {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .plan-features {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .plan-features li {
      margin-bottom: 20px;
    }

    .plan-button {
      padding: 10px;
      background-color: #5050c5;
      color: #fff;
      border-radius: 5px;
      border: none;
      text-decoration:#5050c5;
    }

    @media (max-width: 1250px) {
      .pricing-container {
        flex-direction: column;
        height: 100%;
      }
    }
  </style>
</head>

<body>

   
      
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="error.php" id="logo"
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





  <div class="pricing-container">

    <div class="pricing-plan">
      <div class="plan-title" style="font-size: small;">travel with EasyGoVoyage</div>
      <div class="plan-price">Europe packages</div>
      <h3></h3>
      <button class="plan-button"><a href="EuropePa.php" style="color: #f2f2f2;">Explore</a>
    </div>

    <div class="pricing-plan">
      <div class="plan-title "style="font-size: small;">travel with EasyGoVoyage</div>
      <div class="plan-price">Asian packages</div>
      
      <button class="plan-button"><a href="Asian.php" style="color: #f2f2f2;">Explore</a>
      </div>
    
  </div>

</body>

</html>