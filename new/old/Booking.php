<?php
require_once "pdo.php";
    session_start();
   //copy from here till
    $id=session_id();
    if(isset($_SESSION['name']) && isset($_SESSION['email_id']))
    {  $sql = "SELECT session_id FROM stu_details WHERE email_id=:id";
        //echo($_SESSION['email_id']);
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_SESSION['email_id']));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($row[0]['session_id']==$id)
        {
            //var_dump($row);
        }
        else
        {
      echo("Multiple Logins From Same User Detected...Latest can continue. You are being LOGGED-OUT.");
      sleep(2);
      session_unset();
      header( 'Location: logout.php' ) ;
      return;
        }

    }
      else {echo("ACCESS DENIED!! LOGIN FIRST");
      sleep(2);
      header( 'Location: login.php' ) ;
      return;
    }

    // till here into any page after login.
?>
<!DOCTYPE html>
  <head>
    <title>Boking_Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  </head>
<style>
.w3-bar {font-family: "Montserrat", sans-serif}
html {
  scroll-behavior: smooth;
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
  position: absolute;
  bottom: 0;
  right: 20px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #696969;
 color: black;
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
  background-color: #FF69B4;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
  <body>

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
     <button class="w3-bar-item w3-button w3-padding-large w3-white" onclick="document.location.href = 'home.php'">Home</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.php'">Login</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'routes.html'">Routes</button>
<button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'booking.php'">Bookings</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'feedback.html'">Feedback</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
    </div>
</div>
 <!-- END nav -->
 <div class="hero-wrap js-fullheight" style="background-image: url('https://milled.com/contents/2018-11-06/LQqDNuF9Pux86pmR/_At5RYSgD33H.jpg');" data-stellar-background-ratio="0.5">
 <div class="overlay"></div>
 <div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
  <div class="col-md-7 ftco-animate">
<h2 class="subheading">Welcome to Shuttle Service</h2>
<h1 class="mb-4">Book Your Ride </h1>

</div>
</div>
 </div>
</div>
<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
<form> 
<div class="container">
<div class="row justify-content-end">
<div class="col-lg-4">
<form action="#" class="appointment-form">
<h3 class="mb-3"></h3>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="Full Name">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
 <div class="icon"><span class="fa fa-chevron-down"></span></div>
  <input type="date" id="date" class="form-control appointment_date-check-in" placeholder="Date">
  <select name="" id="To" class="form-control">
<option value="">To</option>
  </select>
 </div>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
 <div class="icon"><span class="fa fa-chevron-down"></span></div>
 <select name="" id="From" class="form-control">
  <option value="">From</option>
   </select>
 </div>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="input-wrap">
<div class="icon"><span class="ion-md-calendar"></span></div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
 <div class="icon"><span class="fa fa-chevron-down"></span></div>
 <select name="" id="Time" class="form-control">
<option value="">Time</option>
   </select>
 </div>
  </div>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
 <label for="Name"> Available:</label>
<input type="text" class="form-control" name="available" disabled="true">
 </div>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
 <label for="Name"> Cost:</label>
<input type="text" class="form-control" name="cost" disabled="true"> 
 </div>
  </div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="submit" value="Book Now" class="btn btn-primary py-3 px-4">
</div>
</div>
</div>
</form>
</div>
</div>
</div>

</form>

<footer class="footer">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-3 mb-md-0 mb-4" id="C1">
<h2 class="footer-heading" >Contact</h2>
<p>Mail us at exml@eml.com<br><br>
      Call to 987******9<br>
</p>
<a href="home.html">For more <span class="fa fa-chevron-right" style="font-size: 11px;"></span></a>
</div>
<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
<h2 class="footer-heading">Services</h2>
<ul class="list-unstyled">
<li><a href="https://snu.edu.in/" class="py-1 d-block" >Learn more</a><br><br>
<li><a href="login.html" class="py-1 d-block">Booking Services</a></li><br>
<li><a href="routes.html" class="py-1 d-block">Map Direction</a></li><br>
<li><a href="#" class="py-1 d-block">Contact</a></li><br>
</ul>
</div>
<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
<h2 class="footer-heading">Quotes of the Day</h2>
<div class="tagcloud">
<p>“Live with no excuses and travel with no regrets”<br><br>
“Travel and change of place impart new vigor to the mind.”<br><br>
 “Work, Travel, Save, Repeat”
</p>
</div>
</div>
<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
<h2 class="footer-heading">Terms & Conditions</h2>
<button class="open-button" onclick="openTC()" style="width: 220px; height: 50px;"><span>Terms & Conditions</span></button>
<div class="form-popup" id="myForm">
  <form class="form-container">
  <h1><u>T & C</u> </h1>
   <p> 1)  Any changes required after booking is not permissible<br>
          2)  Please ensure to book tickets at correct and right time<br>
          3)  Its your duty to stay at location on time<br>
          4)  In case of any bus misses we are not responsibility regarding tickets<br>
  </p>
   <button type="button" class="btn cancel" onclick="closeTC()">Close</button>
  </form></div>
<h2 class="footer-heading mt-5">Follow us</h2>
<ul class="ftco-footer-social p-0">
<li class="ftco-animate"><a href="https://twitter.com/explore" data-toggle="tooltip" data-placement="top" title="Twitter" target="_blank"><span class="fa fa-twitter"></span></a></li>
<li class="ftco-animate"><a href="https://www.facebook.com/" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank"><span class="fa fa-facebook"></span></a></li>
<li class="ftco-animate"><a href="https://www.instagram.com/" data-toggle="tooltip" data-placement="top" title="Instagram" target="_blank"><span class="fa fa-instagram"></span></a></li>
<li class="ftco-animate"><a href="https://www.snapchat.com/l/en-gb/" data-toggle="tooltip" data-placement="top" title="Instagram" target="_blank"><span class="fa fa-snapchat"></span></a></li>
</ul>
</div>
</div>
</div>
<div class="w-100 mt-5 border-top py-5">
<div class="container">
<div class="row">
<p>For More Details Visit our Home page.Please follow Terms & Conditions while booking tickets</p>
</div>
</div>
</div>
</footer>
<!-- loader-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/main.js"></script>
<script>
function openTC() {
  document.getElementById("myForm").style.display = "block";
}

function closeTC() {
  document.getElementById("myForm").style.display = "none";
}

</script>


</body>
</html>
<script type="text/javascript">
$('#date').change(function(event) {
    var form = $('#date');
    var txt = form.val(); //.find('option[id="cars"]') not working
    alert((txt));
    window.console && console.log(txt);
    $.post( 'book_companion_FROM.php', { 'date': txt },
      function( data ) {
          window.console && console.log(data);
          $('#From').empty().append(data);
          $('#To').empty();
          $('#Time').empty();
          $('#availability').empty();
         
      }
    ).error( function() { 
      $('#target').css('background-color', 'red');
      alert("Dang!");
  });
  });
    $('#From').change(function(event) {
      var form = $('#date');
      var txt1 = form.val();
      var from=$('#From');
      var txt2=from.val();
      //alert(txt2);
    $.post( 'book_companion_TO.php', { 'date': txt1 , 'from': txt2 },
      function( data ) {
          window.console && console.log(data);
          $('#To').empty().append(data);
          $('#Time').empty();
          $('#availability').empty();
         
      }
    ).error( function() { 
      $('#target').css('background-color', 'red');
      alert("Dang!");
  });
  });
     $('#To').change(function(event) {
      var form = $('#date');
      var txt1 = form.val();
      var from=$('#From');
      var txt2=from.val();
      var to=$('#To');
      var txt3=to.val();
      //alert(txt2);
    $.post( 'book_companion_TIME.php', { 'date': txt1 , 'from': txt2, 'to' : txt3 },
      function( data ) {
          window.console && console.log(data);
          $('#Time').empty().append(data);
          $('#availability').empty();
         
      }
    ).error( function() { 
      $('#target').css('background-color', 'red');
      alert("Dang!");
  });
  });
     $('#Time').change(function(event) {
      var form = $('#date');
      var txt1 = form.val();
      var from=$('#From');
      var txt2=from.val();
      var to=$('#To');
      var txt3=to.val();
      var time=$('#Time');
      var txt4=time.val();
      //alert(txt2);
    $.post( 'book_companion_AVBL.php', { 'date': txt1 , 'from': txt2, 'to' : txt3, 'time':txt4 },
      function( data ) {
          window.console && console.log(data);
          $('#availability').empty().append(data);
         
      }
    ).error( function() { 
      $('#target').css('background-color', 'red');
      alert("Dang!");
  });
  });
</script>
								