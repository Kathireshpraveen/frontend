<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $error="";
      $eid = mysqli_real_escape_string($db,$_POST['un']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
      $sql = "SELECT email,password FROM userinfo WHERE email = '$eid' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      $captcha_val=$_COOKIE['captcha_crt'];
      if($captcha_val==1){
      if($count == 1) {
    //     session_register("myusername");
         $_SESSION['login_user'] = $eid;
         header("location: welcome.php");
      }else {
         $error = "*Your Login Name or Password is invalid";
      }
    }
    else{
       $error = "*Captcha is invalid";
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
    .button {
  background-color:#f44336; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

</style>
    <script type="text/javascript">  
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) {
              document.cookie="captcha_crt=1";
            }  
            else{

              document.cookie="captcha_crt=0";            }  
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }  
    </script>  
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
<h2 align="center">Login Form</h2>
  

<form action="" method="post">
  <div class="imgcontainer">
    <img src="login_logo.png" alt="login_logo" class="login_logo" height="100" width="120">
  </div>

  <div class="container">
    <label for="uname"><b>E-Mail</b></label>
    <input type="text" placeholder="Enter Username" name="un" id="un" required>
<br><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>
     <br>
   <label><b>Captcha</b></label><br>
    <input type="text" placeholder="Enter Captcha" id="txtCompare"> 
       <input type="text" id="txtCaptcha" style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern; width:150px" >   
    <script>GenerateCaptcha()</script>
      <input type="button" id="btnrefresh" class="button" value="Refresh" onclick="GenerateCaptcha();" />   
    <button type="submit" onclick="ValidCaptcha()">Login</button>
     <div style = "font-size:15px; color:white; margin-top:10px">
      <?php
      if(isset($error)){  
      echo $error;
       }
         ?>
           
         </div>
  </div>
</form>
</body>
</html>
