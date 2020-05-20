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

<html>
<head>
  <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<form id="form">
  <label for="date">Date: </label>
  <input type="date" id="date" name="date" required>
  <label for="From">From: </label>
  <select id="From" required>
  </select>
  <label for="To">To: </label>
  <select id="To" required>
  </select>
  <label for="Time">Time: </label>
  <select id="Time" required>
  </select>
</form>
<div id="availability"></div>
</body>
<script type="text/javascript">
$('#date').change(function(event) {
    var form = $('#date');
    var txt = form.val(); //.find('option[id="cars"]') not working
    //alert(typeof(txt));
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
     $('#From').change(function(event) {
      var form = $('#date');
      var txt1 = form.val();
      var from=$('#From');
      var txt2=from.val();
      //var to=$('#To');
      //var txt3=to.val();
      //alert(txt2);
    $.post( 'book_companion_TIME.php', { 'date': txt1 , 'from': txt2 },
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
      //var to=$('#To');
      //var txt3=to.val();
      var time=$('#Time');
      var txt4=time.val();
      //alert(txt2);
    $.post( 'book_companion_AVBL.php', { 'date': txt1 , 'from': txt2, 'time':txt4 },
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
