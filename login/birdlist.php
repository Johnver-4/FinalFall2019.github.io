<?php

require_once ("config.php");

$conn = new mysqli ($host, $dbuname, $dbp, $db);

if ( $conn -> connect_error) {
   die($conn->connect_error);
}


function good_way($conn) {

   $myarray=[];
   $allrows=[];
   $mytarget="%";
   # example of a call:
   # db_json_02_parameter.php?foo=%r%
   $mytarget=$_GET['foo'];
   $query="select * from t2 where name like ?";
   $statement=$conn->prepare($query);
   $statement->bind_param('s',$mytarget);
   $statement->execute();
   $myf1="";
   $myf2="";
   $statement->bind_result($myf1,$myf2);
   //print_r ($statement);
   while ($statement->fetch()) {
      $myarray["name"]=$myf1;
      $myarray["stars"]=$myf2;
      $allrows[]=$myarray;
      //print ("data:".$myf1.'<br />');

   }
   print (json_encode($allrows));
   $statement->close();

}

good_way($conn);

$conn->close();


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