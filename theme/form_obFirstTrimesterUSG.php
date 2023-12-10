
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

<style type="text/css">
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 800px;
	padding: 0px 30px;
  padding-bottom: 25px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h6{
	background: #4D4D4D;
	text-transform: uppercase;
  letter-spacing: 2px;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #ffffff;
	font-size: 10px;
	font-weight: 100;

	padding: 6px;

	margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="tel"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select
{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	outline: none;
	display: block;
	width: 100%;
	padding: 10px;
	border: none;
	border-bottom: 1px solid #ddd;
	background: transparent;
	margin-bottom: 10px;
	font: 16px Arial, Helvetica, sans-serif;
	height: 45px;
}
.form-style-8 input[type="button"],
.form-style-8 input[type="submit"]{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #007DBC;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 3px 18px;
	text-decoration: none;
	text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover,
.form-style-8 input[type="submit"]:hover {
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
}
</style>
  </head>
  <body style="padding:0px;">
    <?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gjk";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'
//use this to store random report key

if(!isset($_SESSION)) {
  session_start();
}
if(session_id() != ''){
  $user = $_SESSION["username"];
}else {
  include'sessionerror.php';
}
$n=10;
function getName($n,$con) {
 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $randomString = '';

 for ($i = 0; $i < $n; $i++) {
   $index = rand(0, strlen($characters) - 1);
   $randomString .= $characters[$index];
 }


   $sql = "select * from patient_record_header where rkey= '$randomString' ";
   $result = $con->query($sql);
   if ($result->num_rows > 0) {
     return getName($n,$con);
  }else{
    return $randomString;
  }

}

$rkey = getName($n,$conn);
$tmp = $rkey;
 ?>
 <script>
 function diff_between_dates( date1, date2 ) {
  //Get 1 day in milliseconds
  var one_day=1000*60*60*24;
  // Convert both dates to milliseconds
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();
  // Calculate the difference in milliseconds
  var difference_ms = date2_ms - date1_ms;
  // Convert back to days and return
  return Math.round(difference_ms/one_day);
}
 function genlmp() {
 var days=280;
   var x = document.getElementById("iplmp").value;
   var date = new Date(x);
   var xd = new Date(x);
   date.setDate(date.getDate() + days);
  // document.getElementById("demo").innerHTML = "You selected: " + x;
   //document.getElementById("myInput").value = date.getFullYear() + "-" + "-"+ date.getMonth() "-" + date.getDate();
     var mon = date.getMonth();
     var day = date.getDate();
     if(mon<10){
       mon = "0"+ date.getMonth();
     }
     if(day <10){
       day = "0"+ date.getDate();
     }
     var test = new Date(xd.getFullYear(), xd.getMonth(), xd.getDate());
     document.getElementById("eodlmpauto").value = date.getFullYear() + "-" + mon +"-" + day;
     var today = new Date();
     var to = new Date(today.getFullYear(), today.getMonth(), today.getDate());
     var gaday = diff_between_dates(test, to);
     document.getElementById("galmpauto").value = Math.round(gaday/7)+"weeks " + (gaday%7)+"days ";


 }
 </script>
 <table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Personal details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                 <td><input type="text" pattern="\d*" name="age" placeholder="number" required maxlength="60"/></td>
                 <td><b>ID: <?php
                   $sn=0;
                   $sql="SELECT MAX(pid)as sno FROM patient_record_header";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                       if($row = $result->fetch_assoc()) {
                           $sn=$row["sno"];
                           echo $sn+1;
                     }
                   }
                    ?><input type="hidden" name="pid" value="<?php echo $sn+1; ?>"/></b></td>
                   <td><input type="text" name="pname" placeholder=" Name" required /></td>
                   <td><b>date: </b></td><td><input type="date" name="lmp" id = "iplmp" onchange="genlmp()" required/></td>
                   
                 </tr>
                 <tr>
                 <td><input type="text" name="referred" placeholder="Prepared by" required /></td>
                 <td><input type="text" name="referred" placeholder="Reviewed by" required /></td>
                 </tr>
                 
               </table><br/><br/>
               <h6>Other details</h6>
               <table>
                 <tr>
                 <td><b>date: </b></td><td><input type="date" name="lmp" id = "iplmp" onchange="genlmp()" required/></td>
                   <td><b>start time: </b></td><td><input type="text" id="galmpauto" name="galmp" value="" required/></td>
                   <td><b>End time:</b></td>
                   <td><input type="text" name="gausg" value="" required/></td>
                   
                 </tr>
                 <tr>
                   <td><B>location: </B></td><td><input type="text" id="eodlmpauto" name="eodlmp" required/></td>
                   <td><b>Owner</b>&emsp;&emsp;&emsp;front office, vincent ochieng<input type="hidden" name="study" value="Obstetrics"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>"></td>
                   <td><input type="text" name="indication" placeholder="content Owner" required /></td>
                  
                   
                   <!-- <td><b>EOD(USG):</b></td>
                   <td><input type="date" name="eodusg" required/></td> -->
                 </tr>
                 
               </table><br/><br/>
               <h6>details</h6>
               <table>
                 <tr>
                   <td><input type="text" name="crl" pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" placeholder="title" maxlength="6"/></td>
                   <!-- <td align="right">corresponding. to.</td> -->
                   <td><input type="text" pattern="\d*" name="geswks" placeholder="file" required maxlength="100"/></td>
                   <td><input type="text" pattern="\d*" name="gesdays" placeholder="size" required maxlength="100"/></td>
                   <td><input type="text" name="lom" placeholder="hash" value=" hash" required/></td>
                 </tr>
               </table><br/><br/>
               <h6>details</h6>
               <table>
                 <td><input type="text" name="ro" placeholder="title" required/></td>
                 <td><input type="text" name="rom" placeholder="file" value=" file "required/></td>
                 <td><input type="text" name="lo" placeholder="size" required/></td>
                 <td><input type="text" name="lom" placeholder="hash" value=" hash" required/></td>
               </table>
               <br>
               <!-- <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                  <h6> more details</h6>
                </div>
                <div class="card-body">
                    <form id="input-form">
                        <div id="product_row1" class="row">
                        <div class="col-md-3">
                                <label>Title</label>
                                <input id="name1" type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>File</label>
                                <input id="name1" type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>size</label>
                                <input id="price1" type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Hash</label>
                                <input id="price1" type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <br>
                                <button onclick="delete_row('1')" type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button onclick="add_more()" class="btn btn-dark">Add More</button>
                    <!-- <button onclick="submit_form()" class="btn btn-info">Save</button> -->
                </div>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="script.js"></script>
               <br/> -->
               <input type="submit" value="submit" name="ogone"/>
             </form>
             <form method="post" action="action.php">
               <input type="hidden" name="rtype" value="ogone"/>
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:200px;" type="submit" value="New" name="newrep"/>
             </form>
             <form method="post" action="undo.php">
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="ogone"/>
             </form>
           </div>

     </td>
   </tr>
 </table>
 


  </body>
</html>
