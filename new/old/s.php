<div id="form-container">
  <div id="card-front">
    <div id="shadow"></div>
    <div id="image-container">
      <span id="amount">PAYMENT-<strong>HERE</strong></span>
      <span id="card-image">
        </span>
<div class="mov">
<form id="f1" action="payments.php" method="post" enctype="multipart/form-data">
    Please Upload Your GPAY/PAYTM ScreenShot Here
    <input type="file" name="fileToUpload" id="fileToUpload" required="true">
    </form>
</div>
    </div>
        <div id="cvc-container">
      <button>BACK</button>
    </div>
  </div>
  <div id="card-back">
    <div id="card-stripe">
    </div>
  </div>
  <input type="text" id="card-token" />

<button  id="card-btn" value="" onclick="twoforms()">PAYMENT</button>

<div class="forms">
<br>
<form id="f2" method="POST" action="payments.php"> 
 <h2 style="text-align:center" class="head"><u>PAYMENT-DETAILS</u></h2>
<label for="from1">From: </label>
<input type="text"  id="from1"  value="<?php echo($_POST['From'])?>" size="25" readonly="true" >
<label for="to1">To: </label>
<input type="text"  id="to1" value="<?php echo($_POST['To'])?>" size="25" readonly="true" >
<div class="test">
<label for="date1">On: </label>
<input type="text"  id="date1" value="<?php echo($_POST['date'])?>" size="25" readonly="true" >
 <label for="time1">At: </label>
<input type="text"  id="time1" value="<?php echo($_POST['Time'])?>" size="25" readonly="true" >
</div><br>
<label for="cost1">Cost: </label>
<input type="text"  id="cost1" size="7" value="<?php echo($_POST['Cost'])?>" readonly="true">
</form>
<div class="center">
<button class="open-button" onclick="openTC()" style="width: 220px; height: 50px;"><span>Terms & Conditions</span></button>
<div class="form-popup" id="myForm">
  <form class="form-container">
  <h1><u>T & C</u> </h1>
   <p> 1)  Any changes required after booking is not permissible <br>
          2)  Please ensure to book tickets at correct and right time<br>
          3)  Its your duty to stay at location on time<br>
          4)  In case of any bus misses we are not responsibility regarding tickets<br>
  </p>
   <button type="button" class="btn cancel" onclick="closeTC()">Close</button>
  </form>
</div></div>
</div>
</div>

</div>