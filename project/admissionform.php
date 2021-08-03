<?php
$servername="localhost";
$username="root";
$password="";
$database="school";
//create connection
$con=mysqli_connect($servername,$username,$password,$database);
//check connection
if(!$con)
{
	die(" connection failed:".mysqli_error());
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admission form</title>
	<style>
		fieldset{
			background: lightblue;
			border-style: solid;
			border-color: black;
			width: 1000px;
			margin: auto;
			font-size: 25px;

		}
		h1{
			text-align: center;
			color: blue ;
			text-decoration: underline;
		}
		#a{
			text-align: center;
		}
		body{
			background-color: lightgrey;
		}

		
	</style>
</head>
<body>   <h1> STUDENT REGISTRATION FORM </h1>
	    <form  action="admissionform.php" enctype="multipart/form-data" method="post">
		<fieldset>
			<div  style="margin-right: 60px; float: right;text-align: center;">
		    <div style="  height: 250px;width: 250px; background-image: url(image.jpg); background-repeat: no-repeat;background-size: 100% 100%;" >
		    </div>
		    <input type="file" name="file" id="file" style="height: 35px; font-size: 20px; " onclick=action>
		</div>
		first name:<input type="text" name="fname" placeholder="Ghanendra" maxlength="50"  style="font-size: 20px;" required><br>(MAX 50 CHARACTERS ALLOWED)<br><br>
		last name:<input type="text" name="lname" placeholder="yadav" maxlength="50"style="font-size: 20px;" required><br>(MAX 50 CHARACTERS ALLOWED)<br><br>
		father name:<input type="text" name="father"style="font-size: 20px;" required><br>(MAX 50 CHARACTERS ALLOWED)<br><br>
		mother name:<input type="text" name="mother" style="font-size: 20px;" required><br>(MAX 50 CHARACTERS ALLOWED)<br><br>
		MOBILE no.:<input type="text" name="mob" placeholder="4567******" maxlength="10" style="font-size: 20px;" required><br>(MAX 10 CHARACTERS ALLOWED)<br><br>
		gender:  
		male<input type="radio" name="gender" value="male">   
		female<input type="radio" name="gender" value="female"><br><br>
		D.O.B:<input type="date" name="dob" min="2001-01-02" max="2019-01-01" style="font-size: 20px;"><br><br>
		address:<textarea name="address" style="font-size: 20px;" required></textarea><br><br>
		city:<input type="text" name="city" placeholder="banglore" maxlength="50"style="font-size: 20px;"required> <br>(MAX 50 CHARACTERS ALLOWED)<br><br>
	    pincode:<input type="text" name="pin" placeholder="560068" maxlength="6" style="font-size: 20px;"required> <br>(MAX 6 CHARACTERS ALLOWED)<br><br>
	    state:<input type="text" name="state" placeholder="karnatka" maxlength="50" style="font-size: 20px;" required> <br>(MAX 50 CHARACTERS ALLOWED)<br><br>
	    country:<input type="text" name="country" placeholder="India" style="font-size: 20px;"required><br><br>
	    education:
		<input type="textarea" name="class" placeholder="class" style="font-size: 20px;" required>(name of class you want admission)<br>
		
        <div id="a">
        	<input type="submit" name="submit" value="submit" style="height: 35px; font-size: 20px; ">
		    <input type="reset" name="reset" value="reset" style="height: 35px; font-size: 20px; ">
		</div>

	    </fieldset>
	</form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$father=$_POST['father'];
	$mother=$_POST['mother'];
	$mob=$_POST['mob'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$pin=$_POST['pin'];
	$state=$_POST['state'];
	$country=$_POST['country'];
	$class=$_POST['class'];
	$files= $_FILES['file'];
	$filename = $files['name'];
	$fileerror = $files['error'];
	$filetmp = $files['tmp_name'];
                   $fileext= explode('.',$filename);
	$filecheck =strtolower(end($fileext));
	echo "<br>";
	$fileextstored = array('png','jpg','jpeg');  //only files with extension jpg, jpeg and png allowed 

	if(in_array($filecheck,$fileextstored))
       {
        $destinationfile='pictures/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);
        $sql="insert into admission values('$fname','$lname','$father','$mother','$mob','$gender','$dob','$address','$city','$pin','$state','$country','$class' , '$destinationfile')";
       }
	if(mysqli_query($con,$sql))
	{
		echo"new record inserted";
	}
	else
	{
		echo"error ";
	}
	mysqli_close($con);
}
?>