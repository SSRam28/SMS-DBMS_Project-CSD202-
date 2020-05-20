<?php 
session_start();
require_once "pdo.php";
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <head>
        <title>Routes_Page</title>
       </head>
        
<!--<style>
.w3-bar {font-family: "Montserrat", sans-serif}
.forms{
 position: relative;
 top: -50px;
 left: 0px;
opacity: 0.8;
width: 50%;
height: 170px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
 height: 100px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #FFF0F5;
color: black;
}
.move{
top: 50px;
left: 100px;
width: 100%;
}
.route{
width: 60%;
float: left;

}
.time{
width: 40%;
float: left;
}
.from{
width: 60%;
float: left;

}
.to{
width: 40%;
float: left;
}
.date{
width: 20%;
left: 30px;
}
.foote{
background-color: #FFA500;
color: red;
}
</style>-->
<body class="w3-content" style="max-width:1350px">
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
     <button class="w3-bar-item w3-button w3-padding-large w3-white" onclick="document.location.href = 'home.php'">Home</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.php'">Login</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"onclick="document.location.href = 'Routes.php'">Routes</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'feedback.php'">Feedback</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="myFunction()">Help</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
    </div>
</div>

<div class="w3-row" id="contact">
  <div class="w3-half w3-dark-grey w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>ROUTES</h1>
    </div>
   
<div  id="table" class="move">
<?php
$stmt = $pdo->query("SELECT route_id,`Time` FROM route");
$rows_top = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo"<div class=\"move\">
<table border=\"1\">";
foreach ( $rows_top as $row_top )
{ $stmt = $pdo->query("SELECT route_id,`From`,`To`,Start_time,`Date` FROM trip_details WHERE route_id=".$row_top['route_id']);
  $rows_query = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
 
    echo('<div class="forms">
<br>
<form id="form" method="POST"> 
<div class="route">
<label for="rn">Route : </label>
<input type="text"  id="from" size="25" value="');echo($rows_query[0]['route_id']);echo('" readonly="true" >
</div>
<div class="time">
 <label for="time">Time : </label>
<input type="text"  id="availability" size="25" value="');echo($rows_query[0]['Start_time']);echo('" readonly="true" >
</div>
<div class="from">
<label for="From"> From : </label>
<input type="text"  id="from" size="25" value="');echo($rows_query[0]['From']);echo('" readonly="true" >
</div>
<div class="to">
<label for="To">To : </label>
<input type="text"  id="availability" size="25" value="');echo($rows_query[0]['To']);echo('" readonly="true" ><br><br>
</div>
<div class="day">
<label for="day">Day  : </label>
<input type="text"  id="availability" size="25" value="');echo($rows_query[0]['Date']);echo('" readonly="true" >
</div>

<br>

</form>
</div> 
<div class="move">');
    echo"<table border=\"1\">";
    //echo "<tr><td>";
    //echo(htmlentities($row_top['route_id']));
$stmt =$pdo->query("SELECT stop_name,`Time` FROM schedule WHERE route_id=".$row_top['route_id']);
$rows_in = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ( $rows_in as $row_in)
{
  echo "<tr><td>";
    echo(htmlentities($row_in['stop_name']));
    echo "</td><td>";
    echo(htmlentities($row_in['Time']));
    echo "</td>";

}
echo"</table>
<div class=\"move\">";

}
echo"
<div class=\"move\">";
?>
</div>
  </div>
  <div class="w3-half w3-teal w3-container" style="height:700px">
    <div class="w3-padding-64 w3-padding-large">
      <h1>MAP</h1>
      <p class="w3-opacity">GET ON IT</p>
     <iframe src="https://www.google.com.qa/maps/d/embed?mid=1GYxUwN47f-WikzSoSsdOXMTJeQ68udAE" width="580" height="480"></iframe>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="foote">
<marquee behavior="scroll" direction="left">*The Above Info may Change Depending on Situation.Please Follow Accordingly.</marquee>
</footer>

</body>
</html>


