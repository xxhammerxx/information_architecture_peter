<!DOCTYPE html>
<html lang="en">
<?php

session_start();


$message = "";

if ($_POST) {
$username = testinfo($_POST['username']);
$password = md5($_POST['password']);

include('connect.php');


$query = "SELECT * FROM `users` WHERE `user_name`= '$username' AND `password` = '$password';";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
  
  $_SESSION['loggedin'] = true;

} else{

  $message = "<p style='color:#b40c00'>Incorrect name or password</p>";
}

}

function testinfo($data){
$data1 = trim($data);
$data2 = stripslashes($data1);
$data3 = htmlspecialchars($data2);
return $data;
}

?>
<title>LogIn Area</title>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <link href="../css/media.css" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
     
<div id="wrapper1">
    <div id="container">
     	<div id="header_container">
    <div id="leftheader"><img id="hinge" class="img1" src="../images/logo1.jpg" alt="AllStyles Home Logo" title="Allstyles Company Logo."/></div>            
       	</div>
		<div id="rightheader"><img  class="img1" src="../images/logo_right.png" alt="AllStyles Contact Logo"  title="Company Contact Information."/>
		</div>
 	</div>
    
 <div id="navbar">
      <ul id="nav">
        <li>
          <a class="active" href="../index.html">HOME</a>
        </li>
        <li>
          <a href="../pages/about.html">ABOUT US</a>
        </li>
        <li>
          <a href="../pages/designs.html">DESIGNS</a>
        </li>
        <li>
          <a href="../pages/processes.html">OUR PROCESSES</a>
        </li>
        <li>
          <a href="../pages/testimonials.html">TESTIMONIALS</a>
        </li>
        <li>
          <a href="../pages/faqs.html">FAQs</a>
        </li>
        <li>
          <a href="contact.php">CONTACT US</a>
        </li>
        <li class="loginli"><a href="login.php">LOG IN AREA</a></li>
      </ul>
 </div> 
 
 <div id="adminarea"><div >
<h2>Administrator Area</h2>
<section class = "col-sm-offset2 col-sm-10">

              
<?php echo $message;

if (!isset($_SESSION['loggedin'])) {
  echo "<form role='form' action=" . htmlspecialchars($_SERVER['PHP_SELF'] ) . " method='POST'>
  <div class='form-group'>
    <label for='username'>Username:</label>
    <input type='username' class='form-control' id='username' name='username'>
  </div>
  <div class='form-group'>
    <label for='password'>Password:</label>
    <input type='password' class='form-control' id='password' name='password'>
  </div>

  <button type='submit' class='btn btn-default'>Submit</button>
</form>";

}

if (isset($_SESSION['loggedin'])) {
 
 include('connect.php');

$query2 = "SELECT * FROM `emaillist`;";

$result2 = mysqli_query($con, $query2);
echo "<a href='logout.php' class='btn btn-success'>Log Out</a>";

  echo "<br><br><h2>To delete customer from mailing list enter email</h2><form role='form' action='removefromlist.php' method='POST'>
  <div class='form-group'>
    <label for='email'>Email address:</label>
    <input type='email' class='form-control' id='email' name='email'>
  </div>
  
  <button type='submit' class='btn btn-danger'>Delete</button>
</form>";

echo "<table class='table table-striped'>
  <thead>
    <tr >
      <th>Name</th><th>Email</th>
    </tr>
  </thead>
  <tbody >";

while ($row = mysqli_fetch_assoc($result2)) {
  echo "<tr style='border: 1px black solid'> <td >" . $row['username'] . "</td><td >" . $row['email'] . "</td></tr>";
}

echo "<tbody></table>";

}

?>


        </section>  <!-- Closes the "email_container" section-->
</div>


</div>
<div class="foot" id="footer">
      <a href="../pages/privacy_statement.pdf" target="_blank">Privacy Statement </a> |
      <a href="../pages/web_site_terms.pdf" target="_blank">Terms &amp; Conditions </a>| 
      <a href="../pages/sitemap.html">Site Map</a> | &#169; 2015
      AllStyle Homes
      <div class="adobe">
      <a href="http://get.adobe.com/reader/" target="_blank"><img src="../images/adobe.png" alt="Get Adobe Reader." style="float:right;"></a>
      </div>
      
  <div class="validate">
    <a href="">
    <img style="border:0;width:88px;height:31px"
    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
    alt="Valid CSS!" />
    </a>
    </div>
 </div>
</div>
</body>
</html>