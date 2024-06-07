
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

</body>
</html>
<?php

// Database connection
$dbservername="localhost";
$dbusername="root";
$dapassword="";
$dbname="dbtravel";

$conn = mysqli_connect($dbservername, $dbusername, $dapassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        
// Function to manage admins
function manageAdmins() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_admin"])) {
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $user = $_POST["user"];
        $password = $_POST["password"];

        $sql = "INSERT INTO admin (FirstName, LastName, User, Password) VALUES ('$firstName', '$lastName', '$user', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New admin added successfully.";
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
                exit();
        } else {
            echo "Error adding admin: " . $conn->error;
        }
    }

    // Retrieve admins from the database
    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);

    // Display admins in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>User</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".$row["User"]."</td><td>".$row["Password"]."</td></tr>";}
       
            echo "<td>";
            if (isset($row["status"]) && $row["status"] != "Cancel") {
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
                echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
                echo "</form>";
            } else {
                echo '<button class="status-button deactivated" type="reset" onclick="return confirm(\'Are you sure you want to deactivate this account?\')">Deactivate</button>';
            }
            echo "</td>";
       
            echo "</table>";
    } else {
        echo "0 results";
    }
}


// Function to add a new admin
function addAdminForm() {
    ?>
    <h3>Add New Admin</h3>
    <form method="post">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="user">User:</label><br>
        <input type="text" id="user" name="user" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="add_admin" value="Add Admin">
    </form>
    <?php
}

// Function to manage tour guides
function manageGuides() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_guide"])) {
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $user = $_POST["user"];
        $address = $_POST["address"];
        $phoneNumber = $_POST["phone_number"];
        $password = $_POST["password"];

        $sql = "INSERT INTO guide (FirstName, LastName, User, Address, PhoneNumber, Password) VALUES ('$firstName', '$lastName', '$user', '$address', '$phoneNumber', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New guide added successfully.";
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
            exit();
        } else {
            echo "Error adding guide: " . $conn->error;
        }
    }

    // Retrieve guides from the database
    $sql = "SELECT * FROM guide";
    $result = $conn->query($sql);

    // Display guides in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>User</th><th>Address</th><th>Phone Number</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".$row["User"]."</td><td>".$row["Address"]."</td><td>".$row["PhoneNumber"]."</td><td>".$row["Password"]."</td></tr>";
       
            echo "<td>";
            if (isset($row["status"]) && $row["status"] != "Cancel") {
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
                echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
                echo "</form>";
            } else {
                echo '<button class="status-button deactivated" type="reset" onclick="return confirm(\'Are you sure you want to deactivate this account?\')">Deactivate</button>';
            }
            echo "</td>";
       
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

// Function to add a new guide
function addGuideForm() {
    ?>
    <h3>Add New Guide</h3>
    <form method="post">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="user">User:</label><br>
        <input type="text" id="user" name="user" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br>
        <label for="phone_number">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="add_guide" value="Add Guide">
    </form>
    <?php
}

// Function to manage customers
function manageCustomers() {
        global $conn;

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deactivate"])) {
            $customerId = $_POST["FirstName"];
    
            // Update the customer status to deactivated or suspected
            $sql = "UPDATE customer SET status = 'deactivated' WHERE id = '$customerId'";
            if ($conn->query($sql) === TRUE) {
                
                echo "Customer account deactivated successfully.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } 
        
        // Retrieve customers from the database
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);
    
        // Display customers in a table
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Address</th><th>Phone Number</th><th>Password</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".$row["Email"]."</td><td>".$row["Address"]."</td><td>".$row["PhonNum"]."</td><td>".$row["Password"]."</td></tr>";
             
                echo "<td>";

                if (isset($row["status"])) {
                   echo "<button class='status-button ".($row["status"] == "deactivated" ? "deactivated" : "")."'>".$row["status"]."</button>";
                } else { 
                    echo '<button class="status-button" type="reset" onclick="return confirm(\'Are you sure ?\')">Unknown</button>';
                }
                echo "</td>";
                
                echo "<td>";

                if (isset($row["status"]) && $row["status"] != "deactivated")  {
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='customer_id' value='".$row["FirstName"]."'>";
                    echo "<input type='submit' name='deactivate' value='Deactivate'>";
                    echo "</form>";
                } else {
                  echo '<button class="status-button deactivated" type="reset" onclick="return confirm(\'Are you sure you want to deactivate this account?\')">Deactivate</button>';
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }


// Function managing feedback
function manageFeedback() {

        global $conn ;
        $query = "SELECT * FROM feedback";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Message: ". $row['message']. "</p>";
                echo "<a href='delete_feedback.php?id=". $row['name']. "'>Delete</a><br><br>";
            }
        } else {
            echo "No feedback found.";
        }
    }
    
    function delete_feedback($conn, $id) {
        $query = "DELETE FROM feedback WHERE id = '$id'";
        mysqli_query($conn, $query);
        echo "Feedback deleted successfully.";
    }


   

// Function to manage reservations
function manageBooking() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel_reservation"])) {
        $reservationId = $_POST["reservation_id"];

        // Update the reservation status to canceled
        $sql = "UPDATE book SET status = 'canceled' WHERE id = '$reservationId'";
        if ($conn->query($sql) === TRUE) {
            // Code to send notification to the customer
            // You can implement this part using email or any other notification mechanism
            echo "Reservation canceled successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Retrieve reservations from the database
    $sql = "SELECT * FROM bookticket";
    $result = $conn->query($sql);

   // Display reservations in a table
if ($result->num_rows > 0) {
    echo "<table border='1'>";  
    echo "<tr><th>Line Type</th><th>Flight Class</th><th>The Starting Point</th><th>Destination</th><th>Date1</th><th>Date2</th><th>Price</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["LineType"]."</td>";
        echo "<td>".$row["Flightclass"]."</td>";
        echo "<td>".$row["TheStartingPoint"]."</td>";
        echo "<td>".$row["Destination"]."</td>";
        echo "<td>".$row["Date1"]."</td>";
        echo "<td>".$row["Date2"]."</td>";
        echo "<td>".$row["Price"]."</td>";

        echo "<td>";
        if (isset($row["status"]) && $row["status"] != "Cancel") {
            echo "<form method='post' style='display:inline;'>";
            echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
            echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
            echo "</form>";
        } else {
            echo '<button class="status-button cancel" type="reset" onclick="return confirm(\'Are you sure you want to cancel?\')">Cancel</button>';
        }
        echo "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
}
function manageHotels() {
    global $conn;

    // Retrieve hotels from the database
    $sql = "SELECT * FROM hotels";
    $result = $conn->query($sql);

    // Display hotels in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>City</th><th>Stars</th><th>Hotel Price</th><th>Hotel name</th><th>Start date</th><th>End date</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["city"]."</td>";
            echo "<td>".$row["stars"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["hotel_name"]."</td>";
            echo "<td>".$row["start_date"]."</td>";
            echo "<td>".$row["end_date"]."</td>";
       
            echo "<td>";
            if (isset($row["status"]) && $row["status"] != "Cancel") {
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
                echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
                echo "</form>";
            } else {
                echo '<button class="status-button cancel" type="reset" onclick="return confirm(\'Are you sure you want to cancel?\')">Cancel</button>';
            }
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
        }
      

function manageCars() {
    global $conn;

    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);

    // Display cars 
    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>Car name</th><th>Airport</th><th>Car type</th><th>Price</th><th>Date1</th><th>Date2<th>Action</th></th>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["carNmae"]."</td>";
            echo "<td>".$row["airport"]."</td>";
            echo "<td>".$row["cartype"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["date1"]."</td>";
            echo "<td>".$row["date2"]."</td>";
       
            echo "<td>";
            if (isset($row["status"]) && $row["status"] != "Cancel") {
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
                echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
                echo "</form>";
            } else {
                echo '<button class="status-button cancel" type="reset" onclick="return confirm(\'Are you sure you want to cancel?\')">Cancel</button>';
            }
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

function managePackages() {
    global $conn;

    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);

    // Display cars 
    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>Country</th><th>Price</th><th>Days</th><th>Stars</th><th>Include</th><th>Action</th>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["country"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["days"]."</td>";
            echo "<td>".$row["stars"]."</td>";
            echo "<td>".$row["include"]."</td>";
       
            echo "<td>";
            if (isset($row["status"]) && $row["status"] != "Cancel") {
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='reservation_id' value='".$row["id"]."'>";
                echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
                echo "</form>";
            } else {
                echo '<button class="status-button cancel" type="reset" onclick="return confirm(\'Are you sure you want to cancel?\')">Cancel</button>';
            }
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}


// Function to monitor web pages
function monitorWebPages() {
    global $conn;

    $logFile = 'access.log'; 
    $suspiciousPatterns = ['UNION SELECT', 'DROP TABLE', '--', '/*', '*/', '<script>', 'alert('];
    $intrusionDetected = false;

    if (file_exists($logFile)) {
        $logs = file($logFile);
        foreach ($logs as $log) {
            foreach ($suspiciousPatterns as $pattern) {
                if (strpos($log, $pattern) !== false) {
                    $intrusionDetected = true;
                    break 2;
                }  
            }
        }
    }

    // Check for security programs 
    $securityPrograms = ['mod_security', 'firewalld'];
    $securityStatus = [];

    foreach ($securityPrograms as $program) {
        $output = shell_exec("which $program");
        $securityStatus[$program] = !empty($output);
    }

    // If intrusion is detected, simulate sending an alert to the administrator
    if ($intrusionDetected) {
        // Code to send an alert (e.g., email notification)
        echo "Alert: A potential intrusion attempt has been detected!<br>";
    }

    // Display monitoring status
    echo "<h3>Web Page Monitoring Status:</h3>";

    // Display intrusion detection status
    if ($intrusionDetected) {
        echo "<p style='color: red;'>Intrusion attempt detected! Please check the logs for more details.</p>";
    } else {
        echo "<p style='color: green;'>No intrusion attempts detected.</p>";
    }

    // Display security program status
    echo "<h4>Security Programs Status:</h4>";
    echo "<ul>";
    foreach ($securityStatus as $program => $status) {
        echo "<li>" . $program . ": " . ($status ? "<span style='color: green;'>Installed</span>" : "<span style='color: red;'>Not Installed</span>") . "</li>";
    }
    echo "</ul>";

    // Placeholder for revealing the invention process
    echo "<h4>Invention Process:</h4>";
    echo "<p>The invention process is monitored and documented.</p>";
}

// Main dashboard page
function adminDashboard() {
    ?>
    <!-- HTML code for the admin dashboard -->
    <html>
    <head>
        <title>Admin Dashboard</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
            .status-button {
                background-color: #264653;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .status-button.deactivated {
                background-color: #2a9d8f;
            }
        </style>
    </head>
    <body>
        <br><br>
        <h1>Welcome to Admin Dashboard</h1>
        <div>
            <h2>Manage Admins: </h2>
            <?php manageAdmins(); ?>
            <?php addAdminForm(); ?>
        </div>
        <div>
        <div>
            <h2>Manage Tour Guides: </h2>
            <?php manageGuides(); ?>
            <?php addGuideForm(); ?>
        </div>
            <h2>Manage Customers: </h2>
            <?php manageCustomers(); ?>
        </div>
        <div>
            <h2>Manage feedback: </h2>
            <?php manageFeedback(); ?>
        </div>
        <div>
            <h2>Manage ticket reservations: </h2>
            <?php manageBooking(); ?>
        </div>
        <div>
            <h2>Manage booking hotels: </h2>
            <?php manageHotels(); ?>
        </div>
        <div>
            <h2>Manage means of transportation: </h2>
            <?php manageCars(); ?>
        </div>
        <div>
            <h2>Manage booking travel packages: </h2>
            <?php managePackages(); ?>
        </div>
        <div>
            <h2>Monitor Web Pages: </h2>
            <?php monitorWebPages(); ?>
        </div>
    
      
    <script
      
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    </body>
    </html>
    <?php
}

// Call the main dashboard function
adminDashboard();

?>
