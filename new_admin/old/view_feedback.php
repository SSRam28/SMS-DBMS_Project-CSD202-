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

    // till here into any page after login.
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


    <?php if ( isset($_SESSION['success_msg']))
        { echo($_SESSION['success_msg']);
          unset($_SESSION['success_msg']);
         }
     if( isset($_SESSION['err_msg']) )
      { echo($_SESSION['err_msg']);
             unset($_SESSION['err_msg']);
         }
    if ( isset($_GET['logout']))
    {  if($_GET['logout']=='success')
       { echo("<p>Loggedout Succesfully!!</p>");
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
<?php

$stmt = $pdo->query("SELECT * FROM feedback Order by `timestamp` desc");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($rows==false)
{echo"<p>No Feedback found.</p>";}
else{
echo"<table border=\"1\">
<tr>
    <th>S.NO</th>
    <th>Name</th>
    <th>Email ID</th>
    <th>Mobile</th>
    <th>Experience</th>
    <th>Comments</th>
    <th>Feedback received on</th>
  </tr>";
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo(htmlentities($row['serial_no']));
    echo "</td><td>";
    echo(htmlentities($row['Name']));
    echo("</td><td>");
    echo(htmlentities($row['email']));
    echo("</td><td>");
    echo(htmlentities($row['ph_no']));
    echo "</td><td>";
    echo(htmlentities($row['experience']));
    echo "</td><td>";
    echo(htmlentities($row['comments']));
    echo "</td><td>";
    echo(htmlentities($row['timestamp']));
    echo("</td></tr>\n");
}
}


echo"</table>";

?>
</body>
</html>
