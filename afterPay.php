<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Three Stylish Buttons</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="navbar.css">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
  <style>
    .button-container {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    .btn {
      margin: 10px;
      font-size: 18px;
      /* Customize button styles here (optional) */
      background-color: #4CAF50;  /* Green */
      color: white;
      border: none;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      transition: 0.3s ease-in-out;
      border-radius: 5px;
    }

    .btn:hover {
      opacity: 0.8;
    }

    .btn-primary {
      background-color: #007bff;
      
    }

    .btn-secondary {
      background-color: #777;
    }
  </style>
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

    <!-- Navbar End -->
    <br><br><br><br>
     <h2 style="text-align:center ;">Thank You For Trust In EasyGoVoyage...</h2>
     <h2 style="text-align:center ;">For more reservation details, please check your email</h2>

      

<script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>
