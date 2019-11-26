<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<head>
   <!--
   name=jwilso03
   !-->
   <title>Login</title>
   <script type ="text/javascript" src ="javascript/main.js"></script>
   <link rel="stylesheet" href="css/lightmode.css" type="text/css">
</head>
<body>
   <!--TODO 
      -ADD STYLE SELECTOR
      -Refine css animations
      -vignette?
      -website themes?
      -debug debug debug...
   -->
   <div class="sidenav">
      <a href = "../index.html">Home</a>
      <a href = "../interests.html">Interests</a>
      <a href = "../resume.html">About</a>
      <a onclick="myFunction()" class="dropbtn">Projects &or;</a>
         <div id="myDropdown" class="dropdown-content">
            <a href="./cars/cars.html">cars</a>
            <a href="./toys/toys.html">toys</a>
            <a href="./login/login.html">login</a>
         </div>
      <a onclick="myFunction()" class="dropbtn">Style Options &or;</a>
         <div id="myDropdown" class="dropdown-content">
            <a onclick="swapStyleSheet()" id="lightmode">Default Theme</a>
            <a onclick="swapStyleSheet()" id="darkmode">Dark Theme</a>
            <a onclick="swapStyleSheet()" id="funky">Funky Theme</a>
         </div>
         <div class="sidecontent">
            </div>
      </div>
      <div class="h1" id="main">
         <div class="pagehead">
            Welcome!
         </div>
         <br>
         <div id="content">
            Please login to access birds database!
             <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>
         </div>
      </div>

</body>
</html>