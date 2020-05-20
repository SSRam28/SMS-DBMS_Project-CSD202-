<?php
session_start();
require_once "pdo.php";
$id=session_id();
    if(isset($_SESSION['name']) && isset($_SESSION['admin_id']) && isset($_SESSION['adminID']))
    {  $sql = "SELECT session_id FROM admin_details WHERE admin_id=:id";
        //echo($_SESSION['email_id']);
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_SESSION['admin_id']));
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

?>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <head>
        <title>Routes_Page</title>
       </head>
<style>
.w3-bar {font-family: "Montserrat", sans-serif}
.main{
width: 100%;
background-color:#CCFFFF/*#F5F5F5/*#C0C0C0/*#696969*/;
color: #FF0000;
}
.head{
text-align: center;
color: white;
padding: 64px;
}
.forms{
height: 100px;
width: 100%;
/*color: blue;*/
}
.route{
width: 20%;
float: left;

}

.from{
width: 20%;
float: left;

}
.to{
width: 20%;
float: left;
}
.date{
width: 20%;
float: left;
}
.time{
width: 20%;
float: left;
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
background-color: #FF9900;
color: black;
}
tr:nth-child(odd) {
background-color: #FF3300/*#FFF0F5*/;
color: black;
}
.move{
position: relative;
 left: 190px;
width: 70%;
height: 300px;
}
.map{
width: 100%;
height: 650px;
background-color: #2E8B57;
}
.head1{
padding: 64px;
color: white;
height: 50px;

}
.foote{
background-color: #FFA500;
color: red;
height: 30px;
}
.add{
background-color: #FFA500;
height: 20px;
}
.relative {
  position: relative;
  left: 250px;
  height: 520px;
  width: 50%;
}
</style>
<body>
<div>
  <button class="w3-bar-item w3-button w3-padding-large w3-white" onclick="document.location.href = 'home.php'">Home</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.php'">Login</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"onclick="document.location.href = 'bookings.php'">View Bookings</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"onclick="document.location.href = 'view_routes.php'">View Routes</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'view_trips.php'">View Trips</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'add_trips.php'">Add Trips</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'add_routes.php'">Add Routes</button>
     <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'add_admin.php'">Add Admin</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'view_feedback.php'">View Feedback</button>
    <a href="#C1" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Help</a>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
</div>
</div>
<div class="main">
   <div class="head">
      <h1 style="color: red">ROUTES</h1>
   </div>

<?php
$stmt = $pdo->query("SELECT route_id,`Time`,`From`,runs_on FROM route");
$rows_top = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ( $rows_top as $row_top )
{ 
  /*$stmt = $pdo->query("SELECT route_id,`From`,`To`,Start_time,`Date` FROM trip_details WHERE route_id=".$row_top['route_id']);
  $rows_query = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
 echo('
<div class="forms">
<br>
<form id="form" method="POST"> 
<div class="route">
<label for="rn">Route : </label>
<input type="text"  id="from" size="25" value="');echo($row_top['route_id']);echo('" readonly="true" >
</div>
<div class="time">
 <label for="time">Time : </label>
<input type="text"  id="availability" size="25" value="');echo($row_top['Time']);echo('" readonly="true" >
</div>
<div class="from">
<label for="From"> From : </label>
<input type="text"  id="from" size="25" value="');echo($row_top['From']);echo('" readonly="true" >
</div>
<div class="day">
<label for="day">Usually runs on  : </label>
<input type="text"  id="availability" size="25" value="');echo($row_top['runs_on']);echo('" readonly="true" >
</div>
</form>
</div> 


<div class="move">');

echo('<table>
<tr>
    <th>STOP NAME</th>
    <th>TIME</th>
  </tr>
');
$stmt =$pdo->query("SELECT stop_name,`Time` FROM schedule WHERE route_id=".$row_top['route_id']);
$rows_in = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ( $rows_in as $row_in)
{
  echo('<tr>
<td>');
echo(htmlentities($row_in['stop_name']));echo('</td>
<td>');echo(htmlentities($row_in['Time']));echo('</td>
</tr>');

}
echo('</table>
</div>');
}

?>
 <div class="map">
    <div class="head1">
      <h1><u>MAP</u></h1>
   </div>
<div class="relative">
<iframe src="https://www.google.com.qa/maps/d/embed?mid=1GYxUwN47f-WikzSoSsdOXMTJeQ68udAE" width="950" height="500"></iframe>
</div>
</div>
<div class="add">
</div>
<!-- Footer -->
<footer class="foote">
<marquee behavior="scroll" direction="left">*The Above Info maybe Change Depend on Situation.Please Follow Accordingly.</marquee>
</footer>
</body>
</html>