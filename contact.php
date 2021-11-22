<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {

      $email = mysqli_real_escape_string($db,$_POST['un']);
      $issue = mysqli_real_escape_string($db,$_POST['is']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $err = "*Invalid format and please re-enter valid email"; 
      }
      else{
         $s="INSERT INTO issue (email,issue) VALUES('$email','$issue')";
         if(mysqli_query($db,$s)) {
          echo "<script>window.alert('Thank you for feedback');window.location.assign('index.html');</script>";
        }
          else{
            $err=mysqli_error($db);
          }
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<h2 align="center">Contact</h2>
  

<form action="" method="post">

  <div class="container">
    <label for="uname"><b>E-Mail:</b></label>
    <input type="text" placeholder="Enter Username" name="un" id="un" required>
<br><br>
    <label for="psw"><b>Issue:</b></label>
    <input type="text" placeholder="Enter issue" name="is" id="is" required>
     <br>

    <button type="submit">Submit</button>
     <div style = "font-size:15px; color:white; margin-top:10px">
      <?php
      if(isset($err)){  
      echo $err;
       }
         ?>
           
         </div>
  </div>
</form>
</body>
</html>
