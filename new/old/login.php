
<?php
    require_once "pdo.php";
    session_start();
    if ( isset($_POST["email_id"]) && isset($_POST["pw"]) ) {
         unset($_SESSION["email_id"]); // Logout current user
         $salt = '_SSRam_116';
         $check = hash('md5', $salt.$_POST['pw']);
        $email_id=$_POST["email_id"];
        $sql = "SELECT name,password FROM stu_details WHERE email_id=:id";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $email_id));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // echo("<pre>\n".$_POST['pw']."\n</pre>\n");
       // echo("<pre>\n".var_dump($row)."\n</pre>\n");
        if($row==false)
        { $_SESSION["error"]="No such email_id found. Please Sign Up";
          header( 'Location: login.php' ) ;
          return;
         
        }
        elseif ( $row[0]['password'] ==/*"Tea@123"*/hash('md5', $salt.$_POST['pw'])) {
           $_SESSION['email_id']=$email_id;
           $_SESSION['name']=$row[0]['name'];
           $_SESSION["success"] = "Logged in.";
            header( 'Location: hello.php' ) ;
            return;
           
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login.php' ) ;
           return;
          
        }
    }

    //enter here
    /*<input type="text" placeholder="Name" name="guest_name" />
<input type="email" placeholder="Email-id" name="guest_email_id" />
<input type="password" placeholder="Password" name="guest_pw"/>
<input type="tel" placeholder="Mobile-no" name="guest_ph_no"/>
<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</form>*/
    if ( isset($_POST["guest_email_id"]) && isset($_POST["guest_pw"]) && isset($_POST["guest_name"]) && isset($_POST["guest_ph_no"])) {
         unset($_SESSION["email_id"]); // Logout current user
         $salt = '_SSRam_116';
        
        $Gemail_id=htmlentities($_POST["guest_email_id"]);
        $Gph_no=htmlentities($_POST["guest_ph_no"]);
        $stmt = $pdo->prepare('SELECT email_id FROM stu_details WHERE email_id = :email_id');
        $stmt->execute(array( ':email_id' => $Gemail_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT ph_no FROM stu_details WHERE ph_no = :ph_no');
        $stmt->execute(array( ':ph_no' => $Gph_no));
        $row1 = $stmt->fetch(PDO::FETCH_ASSOC); 

        if($row===false && $row1===false)
        { 
        
        $Gname=htmlentities($_POST["guest_name"]);
        $Gpassword= htmlentities(hash('md5',$salt.$_POST["guest_pw"]));
        if (strlen($Gph_no) <10 || strlen($Gph_no) > 10  )
        {   
            $_SESSION['error2']="Mobile number Format is incorrect...please try again.";
             header( 'Location: login.php' ) ;
              return;
        }
        $sql = "INSERT INTO stu_details(name,email_id,password,ph_no) VALUES(:name,:email_id,:password,:ph_no) ";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':email_id' => $Gemail_id,':ph_no' => $Gph_no,':password' => $Gpassword,':name' => $Gname));
        //$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // echo("<pre>\n".$_POST['pw']."\n</pre>\n");
       // echo("<pre>\n".var_dump($row)."\n</pre>\n");
        $_SESSION['success_msg2']="Successfully Signed-Up...Please Log In now.";
         header( 'Location: login.php' ) ;
         return;
       
       }
       else
       {
       $_SESSION['error2']="Account already exists. Please Login In directly.";
             header( 'Location: login.php' ) ;
              return;	
       }
} 
?>
<!DOCTYPE html>
<title>login_page</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
.w3-bar {font-family: "Montserrat", sans-serif}
* {
  margin: 0px auto;
  padding: 0px;
  text-align: center;
  font-family: 'Open Sans', sans-serif;
}

.cotn_principal {
  position: absolute;
  width: 100%;
  height: 100%;

 background-color: #C8C8C8;
}


.cont_centrar {
  position: relative;
  float: left;
   width: 100%;
}

.cont_login {
  position: relative;
  width: 740px;
   left: 50%;
  margin-left: -320px;
 top: 80px;
  
}

.cont_back_info {  
position: relative;
  float: left;
  width: 640px;
  height: 280px;
 background-color: #fff;
  margin-top: 100px;
box-shadow: 1px 10px 30px -10px rgba(0,0,0,0.5);
}

.cont_forms {
  position: absolute;
  overflow: hidden;
  top:100px;
  left: 0px;
  width: 320px;
  height: 280px;
  background-color: #eee;
-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}

.cont_forms_active_login {
box-shadow: 1px 10px 30px -10px rgba(0,0,0,0.5);
  height: 420px;  
top:20px;
left: 0px;
  -webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;

}

.cont_forms_active_sign_up {
box-shadow: 1px 10px 30px -10px rgba(255, 51, 51);
  height: 460px;  
top:20px;
left:320px;
-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}

.cont_img_back_grey {
  position: absolute;
  width: 1060px;
   top:-80px;
  left: -225px;
}

.cont_img_back_grey > img {
  width: 100%;
 -webkit-filter: grayscale(100%);     
filter: grayscale(100%);
opacity: 0.5;
animation-name: animar_fondo;
  animation-duration: 20s;
animation-timing-function: linear;
animation-iteration-count: infinite;
animation-direction: alternate;

}

.cont_img_back_ {
  position: absolute;
  width: 950px;
   top: -80px;
   left: -116px;
}

.cont_img_back_ > img {
  width: 100%;
opacity: 0.3;
animation-name: animar_fondo;
animation-duration: 20s;
animation-timing-function: linear;
animation-iteration-count: infinite;
animation-direction: alternate;
}

.cont_forms_active_login > .cont_img_back_ {
top:0px;  
  -webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}

.cont_forms_active_sign_up > .cont_img_back_ {
top:0px;  
left: -435px;
  -webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}
 

.cont_info_log_sign_up {
position: absolute;
  width: 640px;
  height: 280px;
  top: 100px;
z-index: 1;
} 

.col_md_login {
  position: relative;
  float: left;
  width: 50%;
}

.col_md_login > h2 {
  font-weight: 400;
margin-top: 70px;
    color: #757575;
}

.col_md_login > p {
 font-weight: 400;
margin-top: 15px;
width: 80%;
    color: #37474F;
}

.btn_login { 
background-color: #26C6DA;
  border: none;
  padding: 10px;
width: 200px;
border-radius:3px;
box-shadow: 1px 5px 20px -5px rgba(0,0,0,0.4);
  color: #fff;
margin-top: 10px;
cursor: pointer;
}

.col_md_sign_up {
  position: relative;
  float: left;
  width: 50%;  
}

.cont_ba_opcitiy > h2 {
  font-weight: 400;
  color: #fff;
}

.cont_ba_opcitiy > p {
 font-weight: 400;
margin-top: 15px;
 color: #fff;
}
/* ----------------------------------
background text    
------------------------------------
 */
.cont_ba_opcitiy {
  position: relative;
  background-color: rgba(120, 144, 156, 0.55);
  width: 80%;
  border-radius:3px ;
margin-top: 60px;
padding: 15px 0px;
}

.btn_sign_up { 
background-color: #ef5350;
  border: none;
  padding: 10px;
width: 200px;
border-radius:3px;
box-shadow: 1px 5px 20px -5px rgba(0,0,0,0.4);
  color: #fff;
margin-top: 10px;
cursor: pointer;
}
.cont_forms_active_sign_up {
z-index: 2;  
}


@-webkit-keyframes animar_fondo {
  from { -webkit-transform: scale(1) translate(0px);
-moz-transform: scale(1) translate(0px);
-ms-transform: scale(1) translate(0px);
-o-transform: scale(1) translate(0px);
transform: scale(1) translate(0px); }
  to { -webkit-transform: scale(1.5) translate(50px);
-moz-transform: scale(1.5) translate(50px);
-ms-transform: scale(1.5) translate(50px);
-o-transform: scale(1.5) translate(50px);
transform: scale(1.5) translate(50px); }
}
@-o-keyframes identifier {
  from { -webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1);
transform: scale(1); }
  to { -webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5);
transform: scale(1.5); }

}
@-moz-keyframes identifier {
  from { -webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1);
transform: scale(1); }
  to { -webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5);
transform: scale(1.5); }

}
@keyframes identifier {
  from { -webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1);
transform: scale(1); }
  to { -webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5);
transform: scale(1.5); }
}
.cont_form_login {
  position: absolute;
  opacity: 0;
display: none;
  width: 320px;
  -webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}

.cont_forms_active_login {
z-index: 2;  
}
.cont_forms_active_login  >.cont_form_login {
}

.cont_form_sign_up {
  position: absolute;
  width: 320px;
float: left;
  opacity: 0;
display: none;
  -webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
-ms-transition: all 0.5s;
-o-transition: all 0.5s;
transition: all 0.5s;
}

  
.cont_form_sign_up > input {
 text-align: left;
  padding: 15px 5px;
margin-left: 10px;
margin-top: 20px;
  width: 260px;
border: none;
    color: #000000;
font-size: 15px;
}

.cont_form_sign_up > h2 {
margin-top: 50px; 
font-weight: 400;
  color: #757575;
}


.cont_form_login > input {
  padding: 15px 5px;
margin-left: 10px;
margin-top: 20px;
  width: 260px;
border: none;
text-align: left;
  color: #000000;
font-size: 15px;
}

.cont_form_login > h2 {
margin-top: 110px; 
font-weight: 400;
  color: #757575;
}
.cont_form_login > a,.cont_form_sign_up > a  {
  color: #757575;
    position: relative;
    float: left;
    margin: 10px;
margin-left: 30px;
}

</style>
<body>

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a href="file:///C:/Users/Mahendra/Downloads/home.html#" target="_self" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'login.html'">Login</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Routes</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="document.location.href = 'feedback.html'">Feedback</button>
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="myFunction()">Help</button>
    </div>
</div>

<div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
      <h2>STUDENT</h2>  
  <p>students of snu!!</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>GUEST</h2>
  <p>guests of snu!!</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://pbs.twimg.com/media/CMmf9L1VEAAYxSj.jpg" alt=""/>
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://pbs.twimg.com/media/CMmf9L1VEAAYxSj.jpg" alt="" />
       </div>
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons" style="font-size:35px">&#xe5c5;</i></a>
   <h2>LOGIN</h2>
   <?php
    if ( isset($_SESSION["error"]) ) {
        echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
        unset($_SESSION["error"]);
    }
?>
   <form method="post">
 <input type="text" placeholder="Email_id" name="email_id" value="" required/>
<input type="password" placeholder="Password" name="pw" value="" required/>
<button class="btn_login" value="SUBMIT" onclick="cambiar_login()">LOGIN</button>
</form>
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xe5c4;</i></a>
     <h2>SIGN UP</h2>
     <?php if ( isset($_SESSION["error2"]) ) {
        echo('<p style="color:red">'.$_SESSION["error2"]."</p>\n");
        unset($_SESSION["error2"]);
    } 
    elseif ( isset($_SESSION["success_msg2"]) ) {
        echo('<p style="color:green">'.$_SESSION["success_msg2"]."</p>\n");
        unset($_SESSION["success_msg2"]);
    }
    ?>
     <form method="post">
<input type="text" placeholder="Name" name="guest_name" required/>
<input type="email" placeholder="Email-id" name="guest_email_id" required/>
<input type="password" placeholder="Password" name="guest_pw" required/>
<input type="tel" placeholder="Mobile-no" name="guest_ph_no" pattern="[0-9]{10}" required/>
<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</form>
 </div>
</div>
    </div>
 </div>
</div>
<script>
function cambiar_login() {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
document.querySelector('.cont_form_login').style.display = "block";
document.querySelector('.cont_form_sign_up').style.opacity = "0";               

setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
  
setTimeout(function(){    
document.querySelector('.cont_form_sign_up').style.display = "none";
},200);  
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";
  
setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);  

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);  


}    
function ocultar_login_sign_up() {
document.querySelector('.cont_forms').className = "cont_forms";  
document.querySelector('.cont_form_sign_up').style.opacity = "0";               
document.querySelector('.cont_form_login').style.opacity = "0"; 

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);  

  }

  function myFunction() {
  alert("Please Go To Home Page To See Our Details!!");
}
</script>
</body>
</html>