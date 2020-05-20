<?php
session_start();
require_once "pdo.php";
if(isset($_POST['back']))
{
   header( 'Location: bookings.php' ) ;
      return;
}
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
      echo("Multiple Logins From Same Admin Detected...Latest can continue. You are being LOGGED-OUT.");
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

     


if(isset($_GET['img_ref']))
{

}
 else {echo("ACCESS DENIED!! ");
      sleep(2);
      header( 'Location: home.php' ) ;
      return; 
}
?>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <head>
        <title>Validate</title>
        <script type="text/javascript" src="jquery.min.js"></script>
       </head>
       <style type="text/css">
         .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
          white-space: nowrap;

          .card {
          display: inline-block;
  }
}
.image{
background-image: url("https://images.unsplash.com/photo-1513151233558-d860c5398176?ixlib=rb-1.2.1&w=1000&q=80");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  background-attachment: fixed;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  height: 1000px;
      
}
.head{
color: red;
height: 10px;
text-align: center;
padding: 34;
}
.tr{
position: relative;
top: 50px;
left: 520px;
}
.im{
position: relative;
top: 40px;
left:460px;
}

.opt{
position:relative;
left: 530px;
top: 50px;
font-size: 15px;
}
.bot{
position:relative;
left: 590px;
top: 70px;
}
       </style>
       <body>
<div class="image">
        <div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <button class="w3-bar-item w3-button w3-padding-large w3-white" onclick="document.location.href = 'home.php'">Home</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.php'">Login</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"onclick="document.location.href = 'Routes3.php'">Routes</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'myBookings.php'">My Bookings</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'Profile.php'">My Profile</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'feedback.php'">Feedback</button>
    
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
    </div>  
  </div>
<br><br>
   <div class="head">
      <h1>View Payment</h1>
   </div>

<br><br>
<div id="vali">
<div class="im">
  <img src="../new/Payment_screenshots/<?php echo($_GET['img_ref'])?>" alt="<?php echo($_GET['img_ref'])?>" height='500px' width='400px'>
</div>
<div class="tr">
  Transaction ID:<input type="text" name="txn_id" value="<?php echo($_GET['txn_id'])?>" readonly="true">
</div>
  <br>
  <form method="POST">
<div class="opt">
Approve:<input type="radio" id="status" onclick="return false;" name="status" value="A" checked="<?php if($row['isValidated']=='A') echo('true'); else echo('flase');?>"><br>
Reject: <input type="radio" id="status" onclick="return false;" name="status" value="R" checked="<?php if($row['isValidated']=='R') echo('true'); else echo('flase');?>"><br>
</div><br>
<div class="bot">
  <input type="text" name="sno" value="<?php echo($_GET['sno']) ?>" hidden>
    </div>
  </form>
  
</div>
</div>
</body>
</html>