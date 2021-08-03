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
<html>
<head>
</head>
<body>
<div align="center">
<h1>  showing details</h1>
</div>
<form name="f1" method="post" action="showform.php">
	Enter first name: <input type="text" name="fname" value="" size="20"/>
	<br>
	Enter last name: <input type="text" name="father" value="" size="20"/>
	<br>
	<input type="submit" name="submit" value="Submit Values"/>
	<br>
</form>
<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<thead>
     <th>first name</th>
     <th>last name</th>
     <th>father's name</th>
     <th>mother's name</th>
     <th>mobile number</th>
     <th>gender</th>
     <th>dob</th>
     <th>address</th>
     <th>city</th>
     <th>pincode</th>
     <th>state</th>
     <th>country</th>
     <th>class</th>
    <th>Profile Picture</th>
</thead>
<tbody>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{      	$fname= $_POST['fname'];
	$father= $_POST['father'];
	$query ="select * from admission where firstname='$fname' AND lastname='$father'";
	$querydisplay=mysqli_query($con, $query);
	while($result= mysqli_fetch_array($querydisplay))
	{
		$filename = $result['picturename'];
		$destinationfile='pictures/'.$filename;
	?>	 
	<tr><td><?php echo $result['firstname'];?></td>	
	<td><?php echo $result['lastname'];?></td>	
	<td><?php echo $result["father's name"];?></td>	
	<td><?php echo $result["mother'sname"];?></td>	
	<td><?php echo $result['mobilenumber'];?></td>	
	<td><?php echo $result['gender'];?></td>	
	<td><?php echo $result['date of birth'];?></td>	
	<td><?php echo $result['address'];?></td>	
	<td><?php echo $result['city'];?></td>	
	<td><?php echo $result['pincode'];?></td>	
	<td><?php echo $result['state'];?></td>	
	<td><?php echo $result['country'];?></td>	
	<td><?php echo $result['education'];?></td>
	<td><img src="<?php echo $destinationfile; ?>" width="200px" height="200px"/></td>	
	<?php
	}
}
?>

</tbody>
</table>
</body>
</html>
