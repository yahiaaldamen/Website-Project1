<!--<h1>hiiiiiiiiiiiiiii</h1> -->
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 90%; 
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }
       
        h1 {
            text-align: left;
            color: #a2d2ff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 1em;
        }
        th {
            background-color: #f2f2f2;
            color:#a2d2ff;
        }
        .contact-options {
            text-align: center;
        }
        .action-buttons {
            text-align: center;
        }
        .accept-btn, .reject-btn {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            color: #fff;
        }
        .accept-btn {
            background-color: #5cb85c; /* Green */
        }
        .reject-btn {
            background-color: #d9534f; /* Red */
        }
    </style>
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

    <div class="container">
        <h1>Guide Requests</h1>
        <table>
            <tr>
                <th>Traveler Name</th>
                <th>Trip Date</th>
                <th>Location</th>
                <th>How many days</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        <?php
        // Database connection
        $dbservername="localhost";
        $dbusername="root";
        $dapassword="";
        $dbname="dbtravel";
        
        $conn = mysqli_connect($dbservername ,$dbusername, $dapassword,$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Select data from requests table
        $sql = "SELECT * FROM requests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through rows of data
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["traveler_name"]. "</td>";
                echo "<td>" . $row["trip_date"]. "</td>";
                echo "<td>" . $row["location"]. "</td>";
                echo "<td>" . $row["days"]. "</td>";
                echo "<td>" . $row["Email"]. "</td>";
                echo "<td class='action-buttons'>";
                echo '<button class="accept-btn" type="reset" onclick="return confirm(\'Are you sure ?\')">Accept</button>';
                echo '<button class="reject-btn" type="reset" onclick="return confirm(\'Are you sure you want to reject ?\')">Reject</button>';
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No new requests</td></tr>";
        }

        $conn->close();
        ?>
        </table>
    </div>

    <script>
        function acceptRequest(requestId) {
            // Here you can write code to handle accepting the request with the given requestId
            console.log("Accept request with ID " + requestId);
            // Example: You can use AJAX to send a request to the server to accept the request
        }

        function rejectRequest(requestId) {
            // Here you can write code to handle rejecting the request with the given requestId
            console.log("Reject request with ID " + requestId);
            // Example: You can use AJAX to send a request to the server to reject the request
        }
    </script>
     <script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>