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
  <a class="active" href="history.php"><strong>Transfer History</strong></a>
  <a class="active" href="transfer.php"><strong>Transfer</strong></a>
  </div>
  <h1><i class="fa fa-university" style="font-size: 26px"></i>&nbsp;BANK OF INDIA&nbsp;<i class="fa fa-university" style="font-size: 26px"></i></h1>
  <table class="users">
  <h3>Customer Details</h3>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Balance</th>
  </tr>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "database");
  if($conn-> connect_error){
    die("connection failed:". $conn-> connect_error);
  }

  $sql = "SELECT Name, Email, Balance FROM Accounts";
  $result = $conn-> query($sql);

  if($result-> num_rows > 0){

    while ( $row = $result -> fetch_assoc()) {
      echo "<tr><td>". $row["Name"] ."</td><td>".  $row["Email"] ."</td><td>" .  $row["Balance"] ."</td></tr>";
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
