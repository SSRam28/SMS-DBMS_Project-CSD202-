<?php require_once "pdo.php";
    session_start();

    if(isset($_POST['experience']))
    {  
        $sql1 = "SELECT CURRENT_TIMESTAMP();";
        $stmt1 = $pdo->prepare($sql1);
           $stmt1->execute();
           $time = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $sql = "INSERT INTO feedback (`timestamp`,Name,email,ph_no,comments,experience) VALUES(:ts,:name,:email_id,:ph_no,:com,:xp) ";
           //echo("<pre>\n".$sql."\n</pre>\n");
           $stmt = $pdo->prepare($sql);
           $stmt->execute(array(':ts' => $time[0]['CURRENT_TIMESTAMP()'] ,':name'=>$_POST['name'],':email_id'=>$_POST['email_id'],':com'=>$_POST['comments'],':xp'=>$_POST['experience'],':ph_no'=>$_POST['ph_no']));
      //$_SESSION['success_msg']="Feedback submitted Succesfully. Thank You for Sharing your experience with Us.";
      header( 'Location: feedback_thanks.html' ) ;
      return;

    }

?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <head>
        <title>Feedback</title>
       </head>
<style>
.w3-bar {font-family: "Montserrat", sans-serif}
body {
	background-color: grey;
}
html,
body {
	height: 100%;
}
.imagebg {
	background-image: url("https://static.careers360.mobi/media/presets/720X480/colleges/social-media/media-gallery/288/2018/9/25/Academic%20Block%20of%20Shiv%20Nadar%20University_Campus-View.jpg");
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	background-attachment: fixed;
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
               filter: blur(3px);
             opacity: 0px;
        -webkit-filter: grayscale(100%);     
filter: grayscale(50%);
opacity: 0.6;
     
}
.form-container
{
   background-color: #fff;
    box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 20px 30px 5px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.3);
    border-radius: 8px;	
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    top: 50px;
}
</style>
    <body >

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
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your valuable feedback below: </p>
                    <form role="form" method="POST" id="reused_form">

                    <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="Name"> Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_SESSION['email_id']))echo($_SESSION['name']);?>" required>
                            </div>
                            
                        </div>
                         <div class="row1">
                            <div class="col-sm-62 form-group">
                                <label for="Email"> Email:</label>
                                <input type="email" class="form-control" id="Email" name="email_id" value="<?php if(isset($_SESSION['email_id']))echo($_SESSION['email_id']);?>" required>
                            </div>
                            <div class="col-sm-62 form-group">
                                <label for="Mobile-no"> Mobile-no:</label>
                                <input type="tel" class="form-control" id="mob" name="ph_no" value="<?php if(isset($_SESSION['email_id']))echo($_SESSION['ph_no']);?>" maxlength="10" pattern="[0-9]{10}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" required="true">
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" required="true">
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" checked value="good" required="true">
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-warning btn-block">Post </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
  function myFunction() {
  alert("Please Go To Home Page To See Our Details!!");
}
</script>
    </body>
</html>