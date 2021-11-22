<?php
   include('session.php');
?>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>
      Heart disease predicter
   </title>
   <style>
   @import url("logincss.css"); 
   @import url("css1.css");
   body{
  background-image:url('heart.jpg'); 
  background-repeat:no-repeat;
  background-size:cover;
  background-attachment:fixed;
  backface-visibility:transparent;
    } 
  </style>
   </head>
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h1 align="center">Heart disease predictor</h1>
<form action="#action" method="post" style="border:1px solid #ccc">
  <div class="container">
     <div class="imgcontainer">
    <img src="login_logo.png" alt="login_logo" class="login_logo" height="100" width="120">
  </div>
    <p>Please fill in this form to predict disease</p>
    <hr>
    <label for="age">Age<b></b></label>
    <input type="text" placeholder="Enter age" id="age" name="age" required>
     <label for="gender">Gender<b></b></label>
    <input type="text" placeholder="Enter gender" id="gender" name="gender" required>
     <label for="chestpain">Chest pain type<b></b></label>
    <input type="text" placeholder="Enter chestpain" id="chestpain" name="chestpain" required>
     <label for="cholestrol">Cholestrol<b></b></label>
    <input type="text" placeholder="Enter cholestrol" id="cholestrol" name="cholestrol" required>
     <label for="bp">Blood pressure<b></b></label>
    <input type="text" placeholder="Enter Blood pressure " id="bp" name="bp" required>
     <label for="sugar">Sugar<b></b></label>
    <input type="text" placeholder="Enter Sugar" id="sugar" name="sugar" required>
     <label for="ecg">ECG<b></b></label>
    <input type="text" placeholder="Enter ecg" id="ecg" name="ecg" required>
     <label for="heartrate">Maxheart rate<b></b></label>
    <input type="text" placeholder="Enter Maxheart rate" id="heartrate" name="heartrate" required>
     <label for="alcohol">Drinking alcohol<b></b></label>
    <input type="text" placeholder="alcohol" id="alcohol" name="alcohol" required> 
    <label for="peak">Old peak<b></b></label>
    <input type="text" placeholder="Enter Old peak" id="peak" name="peak" required> 
    <label for="vessel">Vessel coloured<b></b></label>
    <input type="text" placeholder="Enter vessel coloured" id="vessel" name="vessel" required> 
    <label for="slope">Slope<b></b></label>
    <input type="text" placeholder="Enter slope" id="slope" name="slope" required>

    <label for="psw"><b>Password</b></la.bel>
    <input type="password" placeholder="Enter Password" id="pwd"name="pwd" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" id="cpwd" name="cpwd" required> 
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="index.html">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
 <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
</html>