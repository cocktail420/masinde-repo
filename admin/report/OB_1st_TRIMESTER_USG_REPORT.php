
  <head>
    <title></title>
  </head>
  <style>
  .example_a {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .example_b {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .example_c {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .print{
    background: #1680d3;
  }
  .cancel{
    background: #ed3330;
  }
  .save{
    background: #4aa64a;
  }
  .example_a:hover {
  background: #434343;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  .example_b:hover {
  background: #059b86;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  .example_c:hover {
  background: #22d790;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  p{letter-spacing:2px;}

  </style>
<div id="printableArea">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gjk";
// Create connection

//require 'dbcon.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'

$name = "";
$desig="";
  if(!isset($_SESSION)) {
    session_start();
  }
   $user = $_SESSION["username"];
   $sql = "select * from user_account where username= '$user' ";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       if($row = $result->fetch_assoc()) {
           $name=$row['fullname'];
           $desig = $row['degree'];
       }
   }
   $sql = "select * from patient_record_header where attendedby= '$user' AND report_type='ogone' AND status='notPrinted'";
   $pid="";
   $age="";
   $gender="";
   $referred="";
   $patient_name="";
   $indication="";
   $rkey="";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $pid=$row['pid'];
            $age=$row['age'];
            $gender=$row['gender'];
            $referred=$row['referredby'];
            $patient_name=$row['name'];
            $indication=$row['indication'];
            $rkey=$row['rkey'];
        }
    }
    require 'header_file.php';
    //report table 'obfirst'
    //obfirst parameters
    $lmp = "";
    $lmpga = "";
    $lmpeod = "";
    $usgga = "";
    $usgeod ="";
    //uterus
    $crl = "";
    $wk = "";
    $days = "";
    //ovaries
    $ro = "";
    $rom = "";
    $lo = "";
    $lom = "";
    $sql2 = "select * from obfirst where rkey= '$rkey'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        if($row2 = $result2->fetch_assoc()) {
          //obfirst parameters
          $lmp = $row2['lmp'];
          $lmpga = $row2['ga_lmp'];
          $lmpeod = $row2['eod_lmp'];
          $usgga = $row2['ga_usg'];
          $usgeod =$row2['eod_usg'];
          //uterus
          $crl = $row2['crl'];
          $wk = $row2['ges_week'];
          $days = $row2['ges_day'];
          //ovaries
          $ro = $row2['ro'];
          $rom = $row2['rom'];
          $lo = $row2['lo'];
          $lom = $row2['lom'];
        }
    }
 ?>
<center>

<p style="color:#0a7b70;">1. On <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>the Billiards Team, Office, received from mr. <?php echo $patient_name; ?> company to assist in to the <?php echo $indication; ?> <?php echo $patient_name; ?> <?php echo $pid; ?> front office as it was relevant</p>
<p text-align="left" style="padding-left:5%;">3.	At 08:16 AM (UTC+1), on <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>, Mr/Ms Front office, Vincent Ochiengs, commenced the acquisition/extraction of Mr/Ms <?php echo $patient_name; ?>s App,  using APP 8.0.0.29.   <br/></p>
<p align="left" style="padding-left:5%;">	4.	At 08:18 AM (UTC+1), on <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>, the  extraction was completed successfully.  <br/></p>
<p align="left" style="padding-left:5%;">5.	At 08:18 AM (UTC+1), on <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>, the remote acquisition of Mr/Ms <?php echo $patient_name; ?>  App communications was completed successfully.  <br/></p>
  <p align="left" style="padding-left:5%;">6.	On <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>, the contents of <?php echo $patient_name; ?> were reviewed and shared with <?php echo $referred; ?> <br/></p>
  <p align="left" style="padding-left:5%;">7.	On <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?>, the contents of were shared with Mr/Ms <?php echo $referred; ?> . The SMS Messages were allocated as ID A01E01 and the Contacts were allocated as ID A01E02.<br/></p>

<!-- <table width="100%" >
  <tr>s
    <td><font style="color:#0a7b70;"><b>LMP</b>:</font>   <?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?></td>
    <td><font style="color:#0a7b70;"><b>GA</b>(LMP)</font>:  <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $lmpga; ?></font></td>
    <td><font style="color:#0a7b70;"><b>EDD</b>(LMP)</font>:  <font style="padding:0px 10px; border-bottom:1px solid;"><?php if($lmpeod!=''){echo date('d/m/Y',strtotime($lmpeod));} ?></font></td>
  </tr>
  <tr>
    <td></td>
    <td><font style="color:#0a7b70;"><b>GA</b>(USG)</font>:   <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $usgga; ?></font></td>
    <td><font style="color:#0a7b70;"><b>EDD</b>(USG):</font>  <font style="padding:0px 10px; border-bottom:1px solid;"><?php if($usgeod !=''){echo date('d/m/Y',strtotime($usgeod));} ?></font></td>
  </tr>
</table><br/> -->
  <!-- <u style="color:#0a7b70;"><b style="font-size:20px; color:#0a7b70;">Urinary bladder</b></u><br/>
<font style="padding-left:5%;">Is normal contour. No intraluminal echoes.</font><br/><br/>

<u style="color:#0a7b70; height:2px;"><b style="font-size:20px; color:#0a7b70;">Uterus</b></u><br/><br/>
<font style="padding-left:5%;">Gravid uterus showing a single gestational sac containing a yolk sac and an</font><br/>
embryo of CRL <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $crl; ?></font> cm corresponding to <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $wk; ?></font> wks
<font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $days; ?></font> days gestational age Embryo<br/>
show regular cardiac pulsation of 144 /min.<br/><br/>
<u style="color:#0a7b70;"><b style="font-size:20px; color:#0a7b70;">Ovaries</b></u><br/><br/>
Right Ovary&emsp; <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $ro; ?></font>&emsp;measures&emsp; <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $rom; ?></font> cm<br/>
Left Ovary&emsp; <font style="padding:0px 12px; border-bottom:1px solid;"><?php echo $lo; ?></font> &emsp;measures&emsp;<font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $lom; ?></font> cm<br/>
Both Ovaries are normal in size & echo texture<br/>
no free fluid.
</p> -->
<!-- s -->

<table width="100%">
<tr>
  <td width="50%"></td>
  <td><center><?php echo $name.".,".$desig ?></center></td>
</tr>
  <tr>

    <td align="center" colspan="2">
      <p style="width: 90%;  bottom: 10px;letter-spacing:0px;  border-top: 1px solid #037e89;" align="center">
        <i style="color:#0a7b70;">
          Signature
        </i>
      </p>
    </td>
  </tr>
</table>
</center>


</div>
<form name="pc" method="post" action="savereport.php">
<input type="hidden" name="rtype" value="ogone"/>
<?php

require 'footer.php';
mysqli_close($conn);?>
