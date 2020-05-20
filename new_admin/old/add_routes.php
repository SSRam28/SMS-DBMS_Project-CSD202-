<?php
    require_once "pdo.php";
    session_start();
     //copy from here till
    $id=session_id();
    if(isset($_SESSION['name']) && isset($_SESSION['admin_id']) && isset($_SESSION['adminID']))
    {  $sql = "SELECT session_id FROM admin_details WHERE admin_id=:id";
        //echo($_SESSION['email_id']);
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_SESSION['admin_id']));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($row[0]['session_id']==$id)
        {
    if(isset($_POST['From'])  &&  isset($_POST['Time']) )
    {  $GO=1;
        $stmt = $pdo->prepare('SELECT * FROM route WHERE `From` = :frm');
        $stmt->execute(array( ':frm' => $_POST['From'] ));
        $row1 = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($row1===false)
        {
          
        }
        
        $sql = "INSERT INTO route(`From`,`Time`) VALUES(:frm,:sel_time) ";
        //echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':frm'=>$_POST['From'],':sel_time'=>$_POST['Time']));

        $rid = $pdo->lastInsertId();

        $stmt = $pdo->prepare('INSERT INTO `schedule` (`Time`,stop_name,route_id) VALUES ( :tym, :sn, :rid)');
       
       $rank=0;

    for($i=1; $i<100; $i++) {
    if ( ! isset($_POST['name_stop'.$i]) ) continue;
    if ( ! isset($_POST['time_stop'.$i]) ) continue;
    
    $name = $_POST['name_stop'.$i];
    $time = $_POST['time_stop'.$i];
   
     if(!is_numeric($time))
        {
            $_SESSION['err_msg'] = "Time must be numeric";
            header( 'Location: home.php' ) ;
            return;
        }
        if (strlen($time) < 1 || strlen($name)<1)
        {
            $_SESSION['err_msg'] = "All fields are required";
            header( 'Location: home.php' ) ;
            return;
        }
$stmt->execute(array(
   ':tym'=>$time, ':sn'=>$name, ':rid'=>$rid)
);

$rank++;
}





          $_SESSION['success_msg']=$profile_id."Route Inserted and Scheduled Successfully. ";
          header( 'Location: home.php' ) ;
          return;

        

       
    }
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



    if(isset($_POST['cancel']))
    {
      header( 'Location: home.php' ) ;
      return;
    }
/* <form>

From: <input type="text"  name="From" ><br><br>
Time: <input type="text"  name="To" ><br><br>
<input type="submit" value="Add trip">
<input type="submit" name="cancel" value="Cancel">
</form>*/
   


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
        <script type="text/javascript" src="jquery.min.js"></script>
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
<div class="w3-top">
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
    
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'logout.php'">Logout</button>
</div>
  </div>
  <div class="main">
   <div class="head">
      <h1 style="color: red">ADD Routes</h1>
   </div>
 </div><br><br>
<?php if ( isset($_SESSION['success_msg']))
        { echo($_SESSION['success_msg']);
          unset($_SESSION['success_msg']);
         }
     if( isset($_SESSION['err_msg']) )
      { echo($_SESSION['err_msg']);
             unset($_SESSION['err_msg']);
         }
    
    
  ?>
<div class="forms">
<br>
<form id="form" method="POST"> 
<div >
<br>
  <form>

From: <input type="text"  name="From" ><br><br>
Time: <input type="text"  name="Time" ><br><br>
Stops: <input type="submit" id="addstop" value="+">
<div id="stop_fields">
</div>
<input type="submit" value="Add trip">
<input type="submit" name="cancel" value="Cancel">
</form>
<script>
count = 0;

// http://stackoverflow.com/questions/17650776/add-remove-html-inside-div-using-javascript
$(document).ready(function(){
    window.console && console.log('Document ready called');
    $('#addstop').click(function(event){
        // http://api.jquery.com/event.preventdefault/
        event.preventDefault();
        //if ( countPos >= 9 ) {
          //  alert("Maximum of nine position entries exceeded");
            //return;
        //}
        count++;
        window.console && console.log("Adding stop "+count);
        $('#stop_fields').append(
            '<div id="stop'+count+'"> \
            <p>Stop Name: <input type="text" name="name_stop'+count+'" value="" /> \
            <input type="button" value="-" \
                onclick="$(\'#stop'+count+'\').remove();return false;"></p> \
            <p>Time: <input type="text" name="time_stop'+count+'" value="" /> \
            </div>');
    });
});
</script>