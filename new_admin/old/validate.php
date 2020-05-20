<?php
session_start();
require_once "pdo.php";
if(isset($_POST['back']))
{
   header( 'Location: bookings.php' ) ;
      return;
}
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

    if(isset($_POST['submit']) && $_POST['status'])
    {
      $status=$_POST['status'];
      $sno=$_POST['sno'];

      $sql = "UPDATE `bookings` SET `isValidated`=:val  WHERE serial_no=:sno";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':val' => $status,':sno'=>$sno));
      //$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $_SESSION['success_msg']="Status Changed succesfully!!";
      header( 'Location: home.php' ) ;
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
       </style>
       <body>
  <div class="main">
   <div class="head">
      <h1 style="color: red">View Payment</h1>
   </div>
 </div>

<div id="vali">
  <img src="../new/Payment_screenshots/<?php echo($_GET['img_ref'])?>" alt="<?php echo($_GET['img_ref'])?>" height='400px'>
  Transaction ID:<input type="text" name="txn_id" value="<?php echo($_GET['txn_id'])?>" readonly="true">
  <br>
  <form method="POST">
Approve:<input type="radio" id="status" name="status" value="A" selected="<?php if($row['isValidated']=='A') echo('true'); else echo('flase');?>"><br>
Reject: <input type="radio" id="status" name="status" value="R" selected="<?php if($row['isValidated']=='R') echo('true'); else echo('flase');?>"><br>
  <input type="text" name="sno" value="<?php echo($_GET['sno']) ?>" hidden>
  <input type="submit" name="submit" <?php if(isset($_GET['no_sub'])) echo('hidden');?> value="submit" >
  <input type="submit" name="back"  value="back" >
    
  </form>
  
</div>