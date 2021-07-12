<?php
//database configure
include ('/connection/connection.php');
?>
<html>
<head><title>Data Listing</title></head>
<body>
	<table border="1">
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Designation</th>
		<th>Image</th>
	</tr>
	<?php
	//Fetch data from database 
	$select="SELECT * FROM `employee`";
	$result=mysqli_query($conn,$select);
 	while($row=mysqli_fetch_assoc($result)){?>
 	<td><?php echo $row['email']?></td>
 	<td><?php echo $row['designation']?></td>
 	<td><?php echo $row['email']?></td>
 <?php }
	?>
		<tr>
			<td></td>
		</tr>
	</table>
	</body>
	</html>
