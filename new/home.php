<?php
    require_once "pdo.php";
    session_start();
    

?>
<!DOCTYPE html>
<title>SNU Shuttle Management System</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-wrench,.fa-gears,.fa-info-circle{font-size:200px}
html {
  scroll-behavior: smooth;
}
.setimage {
   background-image: url("https://ssl.bigstockimages.com/1/3/2/large1500/231324262.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.bgcolor1 {
background-color: #C0C0C0;
}
.bgcolor2 {
background-color: #C8C8C8;
}
.bgcolor3 {
background-color: #D0D0D0;
}
div.opaque {
  opacity: 0.6;
}
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
 bottom: 23px;
  right: 28px;
  width: 280px;
 float: middle;
 margin-left: 40px;
}.open-button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}.open-button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}.open-button:hover span {
  padding-right: 25px;
}.open-button:hover span:after {
  opacity: 1;
  right: 0;
}
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 25px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #FFFFFF;
}
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}
.form-container .cancel {
  background-color: red;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.gotop {
  list-style: none;
  float: right;
  padding-left: 0px;
  margin-top: 0px;
   bottom: 0;
}
</style>
<body>

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <button class="w3-bar-item w3-button w3-padding-large w3-white" onclick="document.location.href = 'home.php'">Home</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.php'">Login</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"onclick="document.location.href = 'Routes3.php'">Routes</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'myBookings.php'">My Bookings</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'Profile.php'">My Profile</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'feedback.php'">Feedback</button>
    <a href="#C1" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Help</a>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = '../new_admin/login.php'" style="float: right;">Admin Login</button>
    </div>  
 <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Login</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Routes</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Feedback</a>
    <a href="#C1" class="w3-bar-item w3-button w3-padding-large" >Help</a>
  </div>
</div>

<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">SHUTTLE SERVICE</h1>
  <p class="w3-xlarge">Shiv Nadar University</p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick="document.location.href = <?php 
    if ( isset($_SESSION['name']) && isset($_SESSION['email_id']) )
    { //Already Logged In
       echo("'book2.php'");
    }
    else
      echo("'login.php?to_book=1'");?>">Book Now</button>
    <div id="err_succ_note">
     <?php if ( isset($_SESSION['success_msg']))
        echo($_SESSION['success_msg']);
     if( isset($_SESSION['err_msg']) )
      echo($_SESSION['err_msg']);
    if ( isset($_GET['logout']))
    {  if($_GET['logout']=='success')
       { echo("<p>Loggedout Successfully!!</p>");
           unset($_GET['logout']);
         }
         else
         {
          echo("<p>No User Was Logged In.!!</p>");
           unset($_GET['logout']);
         }
    }
    
  ?>
    </div>
</header>


<!-- First Grid -->
<div class="bgcolor1">
<div class="w3-row-padding w3-padding-64  w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>About</h1>
      <h5 class="w3-padding-32">Developed by <br> 
        <ul> 
          <li>Sai Sriram Kalavagunta</li>
          <li>Lakshmi Narayana Rao Boyapati</li>
          <li>V.S. Sai Mahendra Kanikicherla</li>
          <li>Nitin Surya Moturu</li>
        </ul>
           </h5>

      <p class="w3-text-grey"></p>
    </div>
  <div class="w3-third w3-center">
      <i class="fa fa-gears w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>
  
  </div>
</div>
</div>

<!-- Second Grid -->
<div class="bgcolor2" id="C1">
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    
 <div class="w3-third w3-center">
      <i class="fa fa-wrench w3-padding-64 w3-text-red"></i>
    </div>

    <div class="w3-twothird">
      <h1>Help</h1><br><br>
       
       <div class="w3-col m6 w3-large w3-margin-bottom">
        <h5>
        <i class="fa fa-map-marker" style="width:30px"></i> Shiv Nadar University, Dadri<br><br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: 91-9963829696<br><br>	
        <i class="fa fa-envelope" style="width:30px"> </i> TransportCommittee@snu.edu.in<br></h5>
      </div>
      <p class="w3-text-grey"></p>
    </div>
  </div>
</div>
</div>

<!-- Third Grid -->
<div class="bgcolor3">
<div class="w3-row-padding w3-padding-64  w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>More Info</h1>
      <h5 class="w3-padding-32">This website is deemed to be used to book tickets for the SNU shuttle service and also to view routes and schedules for the shuttle service.</h5>

      <p class="w3-text-grey"></p>
    </div>
  <div class="w3-third w3-center">
      <i class="fa fa-info-circle w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>
   
  </div>
</div>
<div class="opaque">
   <marquee behavior="scroll" direction="left">*Notices like cancellation of shuttle service on any particular weekend will be displayed in this section.</marquee>
   </div>
</div>
 
<div class="setimage">
<div class="w3-container  w3-center  w3-light-grey w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge"><b>The Journey Of A Thousand Miles Begin With A Single Step</b></h1>
</div>

<footer class="w3-container w3-padding-64 w3-light-grey  w3-center  w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
     <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
     <a href="https://www.snapchat.com/l/en-gb/" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
    <a href="https://twitter.com/login?lang=en" target="_blank"> <i class="fa fa-twitter w3-hover-opacity"></i></a>
 </div>
 <p>Follow Us on </p>

<button class="open-button" onclick="openTC()" style="width: 220px; height: 50px;"><span>Terms & Conditions</span></button>
<div class="form-popup" id="myForm">
  <form class="form-container">
  <h1><u>T & C</u> </h1>
   <p>    1)  No changes will be entertained once a ticket has been booked. <br>
          2)  It is the users responsibility to book tickets for the correct timings.<br>
          3)  The Transport Committee shall not be held responsible for any information published on this website.<br>
          4)  In case of any bus misses, the transport committee shall not be held responsibe regarding tickets and payments.<br>
          5)  A booking shall only be confirmed by the Transport Committee, on receiving successful payment and submission of appropriate ID and Screenshots.<br>
          6) It is the responsibility of the user to board and deboard their bus at the right stops.<br>
  </p>
   <button type="button" class="btn cancel" onclick="closeTC()">Close</button>
  </form>
</div>
<script>
function openTC() {
  document.getElementById("myForm").style.display = "block";
}

function closeTC() {
  document.getElementById("myForm").style.display = "none";
}

</script>
<div class="gotop">
<a href="#top"> <i class="fa fa-angle-double-up" style="font-size:48px;color:black"></i></a>
</div>
</div>
</footer>
</body>
</html>
