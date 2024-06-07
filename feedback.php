
<?php 

include_once 'include/dbh.inc.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['feedback'];
    

  
        $insertQuery="INSERT INTO feedback(
          name,email,message)
                       VALUES ('$name','$email','$message')";
            if($conn->query($insertQuery)==TRUE){
                header("location: feedback.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     
   
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Booking</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css" />
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
        background: url("backgg.jpg") no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
      }

      h1 {
        margin-bottom: 20px;
        text-align: center;
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input,
      textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
      }

      button {
        width: 100%;
        padding: 10px;
        background-color: #5050c5;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      button:hover {
        background-color: #5050c5;
      }

      .hidden {
        display: none;
      }

      #successMessage {
        margin-top: 20px;
        text-align: center;
        color: #28a745;
        font-weight: bold;
      }
    </style>
  </head>
  <body>






 



    <div class="container">
      <h1>Feedback</h1>
      <form method="post" action="feedback.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="feedback">your Feedback:</label>
        <textarea id="feedback" name="feedback" rows="5" required></textarea>

        <button onclick="messge()" type="submit" onclick="messge()">Submit</button>
      </form>
     


	<script>
		function messge(){
			window.alert("Done")
		}
	</script>
  </body>
</html>
