
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

    
    <!-- Section Book Start -->
    <section class="book" id="book">
      <div class="container">
        <div class="main-text">
          <h1><span>B</span>ook</h1>
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
            <form method="post" action="bookTickits.php">
              
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
    <option value="Red">
    <option value="Green">
    <option value="Blue">
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
              <style>
                .a1{
                  display: flex;
                }
              </style>
              <div class="a1">
    
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
              
                echo '<div class="col-md-7 mb-4">';
                echo '<div class="card">';
                echo '<img src="./ticket/'. $row["img"].'"  class="card-img-top" alt="' . $row["Destination"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["Destination"] . '</h5>';
                echo '<h3 class="card-text">' . $row["Price"] . '</h3>';
                
                echo '<p class="card-text">' . $row["Price"] . "$".'</p>';
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
      

</body>
</html>