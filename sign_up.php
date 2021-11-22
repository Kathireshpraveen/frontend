<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $email = mysqli_real_escape_string($db,$_POST['em']);
      $username = mysqli_real_escape_string($db,$_POST['un']);
      $password = mysqli_real_escape_string($db,$_POST['pwd']); 
      $cpassword=mysqli_real_escape_string($db,$_POST['cpwd']);
      $number = preg_match('@[0-9]@', $password);
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $specialChars = preg_match('@[^\w]@', $password);
      $sql = "SELECT email FROM userinfo WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $err = "*Invalid format and please re-enter valid email"; 
      }
      else if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
       $err="*Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      }
      else if(strcmp($password,$cpassword)){
        $err="*Confirm password and password must be same";
      }
      else if($count == 1) {
         $err="*Email id already!! use different email id";
      }else {
         $s="INSERT INTO userinfo (name,password,email) VALUES('$username','$password','$email')";
         if(mysqli_query($db,$s)) {
          echo "<script>window.alert('Account created successfully Redirecting to login page');window.location.assign('login.php');</script>";
        }
          else{
            $err=mysqli_error($db);
          }
      }
   }
?>
<!DOCTYPE html>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  @import url("css1.css");
  @import url("sign_upcss.css"); 
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
    <div class="navbar"> 
      <fieldset style="background-color: white">
          <img src="logo.jpg" width="75" height="75" align="left">
    <h1 align="center";>Heart disease predicter</h1>
            </fieldset>
            
  <a href="index.html">Home</a>
  <a href="login.php">Login</a>
  <a href="sign_up.php">Sign up</a>
  <a href="contact.php">Contact</a>
</div>
<br><br><br><br><br><br><br> 
<form action="" method="post" style="border:1px solid #ccc">
  <div class="container">
     <div class="imgcontainer">
    <img src="login_logo.png" alt="login_logo" class="login_logo" height="100" width="120">
  </div>

    <legend>Please fill in this form to create an account</legend>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="em" name="em" required>

     <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" id="un" name="un" required>

    <label for="psw"><b>Password</b></la.bel>
    <input type="password" placeholder="Enter Password" id="pwd"name="pwd" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" id="cpwd" name="cpwd" required> 
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="index.html">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
     <div style = "font-size:15px; color:white; margin-top:10px">
      <?php
      if(isset($err)){  
      echo $err;
       }
       ?>
  </div>
</form>
</body>
</html>
