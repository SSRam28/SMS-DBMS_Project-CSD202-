<?php 
//SELECT * FROM trip_details WHERE date >= CURDATE();
//SELECT * FROM `bookings` INNER JOIN trip_details ON bookings.unique_tripID=trip_details.Unique_tripID where trip_details.Date >= CURRENT_DATE() and trip_details.Start_time >= CURRENT_TIME(); 

//
require_once "pdo.php";
session_start();
//if ( !isset($_POST['datesel']) )
 //return;
//echo('present'.$_POST['date']);
$go=false;
$sql="SELECT * FROM ((`bookings`
INNER JOIN trip_details  ON bookings.unique_tripID=trip_details.Unique_tripID) 
INNER JOIN stu_details ON bookings.user_uniqueID=stu_details.unique_id)  where trip_details.Date <= CURDATE() and trip_details.Start_time < CURTIME() and email_id=:eid";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':eid'=>$_SESSION['email_id']));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows==false)
{echo"<p>No Bookings found.</p>";}
else{
	$counter=1;
	echo"<table border=\"1\" id=\"bookingsTable\">
<tr>
    <th>S.NO</th>
    <th>Date</th>
    <th>From</th>
    <th>To</th>
    <th>Payment Method</th>
    <th>Approval Status</th>
    <th>Transaction ID</th>
    <th>Payment Screenshot</th>
    <th>Booking Unique ID</th>
    <th>Ticket</th>
  </tr>";
foreach ($rows as $row) {
   $sql="SELECT `To` FROM `bookings` where serial_no=:sno";//and trip_details.Start_time > CURTIME()
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':sno'=>$row['serial_no']));
$rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<tr><td>";
    echo(htmlentities($counter));
    echo "</td><td>";
    echo(htmlentities($row['Date']));
    echo("</td><td>");
    echo(htmlentities($row['From']));
    echo "</td><td>";
    echo(htmlentities($rows2[0]['To']));
    echo "</td><td>";
    echo(htmlentities($row['payment_method']));
    echo "</td><td>";
    if($row['isValidated']=='A')
    	$status="Approved";
    else if($row['isValidated']=='R')
    	$status="Rejected";
    else if($row['isValidated']=='P')
    	$status="Request was not Validated!!";
    echo(htmlentities($status));
    echo "</td><td>";
    if($row['payment_method']=="cash")
     echo(htmlentities("NOT APPLLICABLE"));
    else 
     echo(htmlentities($row['txn_id']));
     echo "</td><td>";
     if($row['payment_method']=="cash")
     {echo('<a href="show.php?img_ref=NULL.jpg&txn_id=paid in cash &status='.$row['isValidated'].'&sno='.$row['serial_no'].'&no_sub=true">Show Payment</a>');  
     echo "</td><td>";
      }
    else 
     {echo('<a href="show.php?img_ref='.$row['img_ref'].'&txn_id='.$row['txn_id'].'&status='.$row['isValidated'].'&sno='.$row['serial_no'].'&no_sub=true">Show Payment</a>');  
     echo "</td><td>";
      }
    echo(htmlentities($row['serial_no']));
    echo "</td><td>";
    if($row['isValidated']=="A")
      {
    echo('<a href="tkts.php?name='.$row['name'].'&date='.$row['Date'].'&from='.$row['From'].'&to='.$row['To'].'&amt='."180".'&thru='.$row['payment_method'].'">Show Ticket</a>');
     }
    else
    {
      echo("Trip has already been completed. Your ticket was not approved by the admin for this trip!!");
    }
    echo("</td></tr>\n");
    $counter++;
   }
}
