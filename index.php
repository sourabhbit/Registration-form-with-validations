<?php
if(isset($_POST['insert'])){
$server="localhost";
$user="root";
$pass="";
$dbname="sports";

//creating connection for mysqli

$con = new mysqli($server,$user,$pass,$dbname);

//checking connection

include('connection.php');

//every name of input is defined into some variable like $a,$b....
$a = mysqli_real_escape_string($con, $_POST['sal']);
$b = mysqli_real_escape_string($con, $_POST['fname']);
$c = mysqli_real_escape_string($con, $_POST['lname']);
$d = mysqli_real_escape_string($con, $_POST['faname']);
$e = mysqli_real_escape_string($con, $_POST['desig']);
$f = mysqli_real_escape_string($con, $_POST['gender']);
$g = mysqli_real_escape_string($con, $_POST['dob']);
$h = mysqli_real_escape_string($con, $_POST['age']);
$i = mysqli_real_escape_string($con, $_POST['address']);
$j = mysqli_real_escape_string($con, $_POST['city']);
$k = mysqli_real_escape_string($con, $_POST['district']);
$l = mysqli_real_escape_string($con, $_POST['pin']);
$m = mysqli_real_escape_string($con, $_POST['state']);
$n = mysqli_real_escape_string($con, $_POST['aadhar']);
$o = mysqli_real_escape_string($con, $_POST['phone']);
$p = mysqli_real_escape_string($con, $_POST['email']);
$q = mysqli_real_escape_string($con, $_POST['kdesig']);
$r = mysqli_real_escape_string($con, $_POST['username']);
$s = mysqli_real_escape_string($con, $_POST['pass']);
$t = mysqli_real_escape_string($con, $_POST['rpass']);
//$file is a variable defined for taking input of image
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//here values are inserted into database as per column and variable

if ($s != $t) {
echo'<script>alert("Passwords Doesn\'t match")</script>';
header('location:index.php');
}

$sql="INSERT INTO sport (Title,FName,LName,FatherN,Desig,Gender,DOB,Age,Image,Address,City,District,PIN,State,Aadhar,Phone,Email,KDesig,Username,Pass) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$file','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')";

//here if-else loop is used to if connecton.php satisfy with variable $sql then values will get inserted  into database if not then it will show message

if ($con->query($sql) === TRUE) {
	echo '<script>alert("Image & Data Inserted into Database")</script>';  
    //echo "<h3 style='color:blue;'>Database created</h3>";
}
 else {
    echo "Error creating database: " .$sql . "<br/>" . $con->error;
}
$con->close();
}
?>
<!--here the form part begin-->
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sport's Day</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<meta name="viewport" content="width=device-width">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
    $(document).ready(function(){

        $("#dob").change(function(){
           var value = $("#dob").val();
            var dob = new Date(value);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            if(isNaN(age)) {

            // will set 0 when value will be NaN
             age=0;

            }
            else{
              age=age;
            }
            $('#age').val(age);

        });

    });
    </script>
</head>
<body style="background-color:#e8f3f8;"> <!-- you can change the background color from here-->
<div id="particles-js"></div>
<form method="POST" action="index.php" enctype="multipart/form-data">
<h1 style="color:steelblue;">Register Yourself</h1>	

<h2>--Profile Details--</h2>
<table  class="table">
<tr>
	<td><select name="sal" required >
	<option value="">---TITLE---</option>
	<option value="Mr">Mr</option>
	<option value="Mrs">Mrs</option>
	<option value="Miss">Miss</option>
	<option value="Dr">Dr.</option>
</select></td>
	<td><input type="text" name="fname" required placeholder="First Name" /></td>
	<td><input type="text" name="lname" required placeholder="Last Name" /></td>
</tr>
<tr>
	<td>Father's Name:</td> 
	<td><input type="text" name="faname" required placeholder="Father's Name" /></td>
</tr>
<tr>
	<td>Designation: </td>
	<td><input type="text" name="desig" required placeholder="Designation" /></td>
</tr>
<tr>
	<td>Gender:</td>
	<td> <input type="Radio" name="gender" required value="male"/><span> Male </span> 
    <input type="Radio" name="gender" value="female"/><span> Female </span> </td>
</tr>
<tr>
	<td><label for="dob">Birthday:</label></td>
	<td><input type="text" id="dob" name="dob" placeholder="yyyy/mm/dd.."></td>
</tr>
<tr>
<td><label for="age">Age:</label></td>
<td><input type="text" id="age" name="age" placeholder="Age.."></td>
</tr>
<tr>
	<td>Upload your Photo: </td>
	<td><input type="file" name="image" id="image" /></td>
</tr>


</table>

<h2>--Contact Details--</h2>
<table>
<tr>
	<td>Address:<textarea name="address" required rows="1" cols="20" placeholder="ADDRESS"></textarea></td>
	<td>CIty:<input type="text" name="city" required placeholder="City" /></td>
	<td>District:<input type="text" name="district" required placeholder="District" /></td>
	
</tr>
<tr>
	<td>Pincode:<input type="text" name="pin" pattern=".{6}" title="Enter a Valid PIN Code" required placeholder="Pincode" /></td>
	<td>State:<select name="state" required >
		<option value="">---Select State---</option><option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Pondicherry">Pondicherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttaranchal">Uttaranchal</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="West Bengal">West Bengal</option>
	</select> </td>
	<td>Aadhar No:<input type="text" name="aadhar" pattern=".{12}" title="Enter a Valid UIDAI No." required placeholder="UIDAI No." /></td>
</tr>

<tr>
	<td>Contact Number:<input disabled="disabled" type="text" value="+91" style=""/><input type="text" name="phone" pattern="[6789][0-9]{9}" title="Enter 10 digit valid Mobile No." required placeholder="XXXXXXXXXX" /></td>
	<td>Email:<input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email"/></td>
</tr>
<tr>
<td>Are you associated with krira bharti?</td>
	<td> <input type="checkBox" name="yes" id="myCheck"  onclick="myFunction()"  class="product-list" value="yes"/><span> Yes </span>
	<input type="checkBox" name="yes" id="myCheck1" onclick="myFunctio()" class="product-list" value="no"/><span>No </span></td>
<script type="text/javascript">
     //Near checkboxes
    $('.product-list').click(function() {
        $(this).siblings('input:checkbox').prop('checked', false);
    });
  </script>
</tr>
<tr>
<td></td>
<td>
<div id="text" style="display:none" >Designation
<select name="kdesig">
	  <option value="">---POST---</option>
	  <option value="President">President</option>
	  <option value="VicePresident">VicePresident</option>
	  <option value="Secretary">Secretary</option>
	  <option value="JointSecretary">JointSecretary</option>
	  <option value="Treasurer">Treasurer</option>
	  <option value="Volunteer">Volunteer</option>
	  <option value="Others">Others</option>
</select>
</div>
</td>
</tr>
</table>
<!--Another section-->
<h1 style="color:steelblue;">--Login Details--</h1>
<table  id="table1" class="table" style="border-color:steelblue;">
<tr>
	<td>User Name:</td>
	<td><input type="text" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,8}$" title="Enter a Valid username" required placeholder="User Name" /></td>
	<td></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password should contain one lowercase,uppercase,numeric and special character"required placeholder="PASSWORD"/></td>
	<td></td>
</tr>
<tr>
	<td>Re-enter Password:</td>
	<td><input type="password" name="rpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="RE-ENTER PASSWORD"/></td>
	<td></td>
</tr>
</table>
<!--Points-->
<p ><ul>
	  <li>I certify that this information is complete and accurate.</li>
	  <li>I understand that making false and fraudulent statements within this application will lead to disciplinary actions.</li>
	  <li>If admitted, I agree to abide by the rules and regulations of the college.</li>
</ul></p>
<p style="margin-left:10%;"><input type="checkbox" name="" required value="Yes" checked/>Do You understand and agree to the terms and condition listed above.</p><br>
<!--buttons-->
<div id="button" style="margin-left:30%; display:inline-block;" >
<button type="submit" name="insert" class="btn-5" id="insert" >Submit</button><button type="reset" class="btn-5" value="Reset">Reset</button>
</div>

<!--<tr><td><button type="reset" value="Reset">Reset</button></td></tr>-->
</form>
		<script type="text/javascript" src="particles.js"></script>
		<script type="text/javascript" src="app.js"></script>
</body>
</html>
<script>
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}
</script>
<script>
function myFunctio() {
    var checkBox = document.getElementById("myCheck1");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "none";
    } else {
       text.style.display = "none";
    }
}
</script>
<!--script for image validation-->
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>