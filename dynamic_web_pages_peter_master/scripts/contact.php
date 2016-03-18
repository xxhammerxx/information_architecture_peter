<?php

if ($_POST) {
$name = testinfo($_POST['name']);
$email = testinfo($_POST['email']);

include('connect.php');

$query = "INSERT INTO `emaillist` (`userID`, `username`, `email`) VALUES (NULL, '$name', '$email');";

$result = mysqli_query($con, $query);

}

function testinfo($data){
$data1 = trim($data);
$data2 = stripslashes($data1);
$data3 = htmlspecialchars($data2);
return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<!--[if lt IE 8 ]>
  <p>Your browser is out of date please upgrade your browser to view this site</p>
  <a href="http://windows.microsoft.com/en-US/internet-explorer/download-ie"> Download new browser here</a>
<![endif]-->
<head>
  <link href="../css/styles.css" rel="stylesheet" type="text/css">
  <link href="../css/media.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <script src="http://maps.google.com/maps/api/js?sensor=false" type=
  "text/javascript">
  </script>
  <script type="text/javascript">
  function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-24.8520522,152.39065619999997),mapTypeId: google.maps.MapTypeId.TERRAIN};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-24.8520522, 152.39065619999997)});infowindow = new google.maps.InfoWindow({content:"<b>AllStyle Homes<\/b><br/>255 Serenity Drive<br/>4670 Bundaberg" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
  </script>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <title>Contact Us</title>
  <style type="text/css">
  </style>
</head>
<body>
  <div id="wrapper1">
    <div id="container">
      <div id="header_container">
        <div id="leftheader"><img alt="AllStyles Home Logo" class="img1" src=
        "../images/logo1.jpg" title="Allstyles Company Logo."></div>
      </div>
      <div id="rightheader"><img alt="AllStyles Home Logo" class="img1" src=
      "../images/logo_right.png" title="Company Contact Information."></div>
    </div>
   <div id="navbar">     
<ul id="nav">
	<li><a class="active" href="../index.html">HOME</a></li>	
    <li><a href="../pages/about.html">ABOUT US</a></li>
    <li><a href="../pages/designs.html">DESIGNS</a></li>
    <li><a href="../pages/processes.html">OUR PROCESSES</a></li>
    <li><a href="../pages/testimonials.html">TESTIMONIALS</a></li>
    <li><a href="../pages/faqs.html">FAQs</a></li>
    <li><a href="contact.php">CONTACT US</a></li>
    <li class="loginli"><a href="login.php">LOG IN AREA</a></li>
   </ul>
</div>
<div id="intro">
      <p>Please contact us by phone or complete the form below to submit your enquiries to AllStyle Homes.
         We will endeavour to respond to your request within 24 - 48 hours. </p>
    </div>
  <div class="flex-container">
  <div class="flex-item">
  <div id="stylized" class="myform">
  
  <h2 class="form-h2">SUBSCRIBE TO MAILING LIST</h2>
  
<form id="form1" action="<?php htmlspecialchars($_SERVER['PHP_SELF'] ) ?>" method="POST">
<label>Name<span class="small">Add your name</span></label>
<input type="text" name="name" required><br>

<label>Email<span class="small">Enter a Valid Email</span></label>
<input type="email" name="email" required><br>

<button type="submit" value="Send" >Submit</button>
<div class="spacer"></div>
</form>
<br>
<?php 

if (isset($result)) {
  if ($result) {
  echo "$name, you have been added to the email list!";
} else {
  echo "Error could not add you to the mailing list";
}
}

?>
</div>
  </div>
  <div id="contact">
  <div class="flex-item">
  <h2> INFORMATION</h2>
 <pre>
<span>Owner Manager: </span> Alex Knox
<span>Customer Service:</span> Sheree Knox.<br>
<span>Premises:</span> 255 Serenity Drive 
Bundaberg Queensland 4670<br>
<span>Telephone:</span> 07-4153-9876
<span>Fax:</span> 07-4153-9877<span>
Email:<a href="mailto:alex Knox&#63;Subject&#61;AllStyle%20Homes" class="links" target="_top">Alex Knox@allstylehomes.com.au</a> <br><br>
</span>
</pre>
<div id="gmap_canvas">
        <div style="overflow:hidden;"></div>
      </div>
        </div>
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
    </div>
 </div>
</body>
</html>
 
 
 
