<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $fullname=$_POST['name'];
   $cardNumber=$_POST['cardnumber'];
   $cvc=$_POST['cvc'];


 

   include_once 'include/dbh.inc.php';

   
   $sql="SELECT *FROM payment WHERE CVC='$cvc'";
   $result=$conn->query($sql);
   if($result->num_rows==1){
    header("Location: afterPay.php");
    exit();
   }
   else{
      echo "Wrong Password Or UserName";
   }
    $conn->close();
  }

  
?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	 <style>
    @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Ubuntu', sans-serif;
}
div p{
  text-align: center;
  font-weight: 100;
}
body{
  background: white;
  margin: 0 10px;
}

.payment{
  background:whitesmoke;
  max-width: 360px;
  margin: 80px auto;
  height: auto;
  padding: 35px;
  padding-top: 70px;
  border-radius: 5px;
  position: relative;
}

.payment h2{
  text-align: center;
  letter-spacing: 2px;
  margin-bottom: 40px;
  color: #0d3c61;
}

.form .label{
  display: block;
  color: #555555;
  margin-bottom: 6px;
}

.input{
  padding: 13px 0px 13px 25px;
  width: 100%;
  text-align: center;
  border: 2px solid #dddddd;
  border-radius: 5px;
  letter-spacing: 1px;
  word-spacing: 3px;
  outline: none;
  font-size: 16px;
  color: #555555;
}

.card-grp{
  display: flex;
  justify-content: space-between;
}

.card-item{
  width: 48%;
}

.space{
  margin-bottom: 20px;
}

.icon-relative{
  position: relative;
}

.icon-relative .fas,
.icon-relative .far{
  position: absolute;
  bottom: 12px;
  left: 15px;
  font-size: 20px;
  color: #555555;
}

.btn{
  margin-top: 40px;
  background: #5050c5;
  padding: 12px;
  text-align: center;
  color: #f8f8f8;
  border-radius: 5px;
  cursor: pointer;
}


.payment-logo{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  background: #f8f8f8;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  text-align: center;
  line-height: 85px;
}

.payment-logo:before{
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  width: 90px;
  height: 90px;
  background: #5050c5;
  border-radius: 50%;
}

.payment-logo p{
  position: relative;
  color: #5050c5;
  font-family: 'Baloo Bhaijaan', cursive;
  font-size: 58px;
}


@media screen and (max-width: 420px){
  .card-grp{
    flex-direction: column;
  }
  .card-item{
    width: 100%;
    margin-bottom: 20px;
  }
  .btn{
    margin-top: 20px;
  }
}
   </style>
   
</head>
<body>
	


<div class="wrapper">
  <div class="payment">
   
    
    
    <h2>pay With <span style="color:#5050c5">E</span>asyGoVoyage</h2>
    
 <form method="post" action="payment.php">
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Name:</label>
        <input type="text" class="input" placeholder="Full Name" name="name">
        <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" name="cardnumber">
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">Expiry date:</label>
          <input type="text" name="expiry-data" class="input" data-mask="00 / 00"  placeholder="00 / 00" name="exdate">
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="text" class="input" data-mask="000" placeholder="000" name="cvc">
          <i class="fas fa-lock"></i>
        </div>
      </div>
      <div class="input-group mb-3">
              <button class="btn btn-lg btn-primary w-100 fs-6">pay</button>
            </div>
      
       </div>
     </div>
   </div>
</form>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>