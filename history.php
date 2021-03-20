<!DOCTYPE html>
<html>
<head>
	<title>BANK OF INDIA</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="topnav-right">
	<a class="active" href="index.php"><strong>Home</strong></a>
	<a class="active" href="accounts.php"><strong>Accounts</strong></a>
  <a class="active" href="transfer.php"><strong>Transfer</strong></a>
  </div>
  <h1><i class="fa fa-university" style="font-size: 26px"></i>&nbsp;BANK OF INDIA&nbsp;<i class="fa fa-university" style="font-size: 26px"></i></h1>
	<table class="users">
	<h2>Transfer History</h2>
	<tr>
		<th>SENDER</th>
		<th>RECIEVER</th>
		<th>AMOUNT</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "database");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM Overview";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["Sender"] ."</td><td>".  $row["Receiver"] ."</td><td>" .  $row["Amount"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>
</body>
</html>


