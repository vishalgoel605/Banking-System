<?php
$conn = mysqli_connect("localhost", "root", "", "database");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT Name, Email, Balance FROM Accounts";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM Accounts");
$resul1 = mysqli_query($conn,"SELECT *  FROM Accounts");
?>
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
  <a class="active" href="history.php"><strong>Transfer History</strong></a>
  </div>
  <h1><i class="fa fa-university" style="font-size: 26px"></i>&nbsp;BANK OF INDIA&nbsp;<i class="fa fa-university" style="font-size: 26px"></i></h1>
<div class ='form'> 
	<h2>Money Transfer </h2>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
		<select  class= fromuser type="text"  name="u1" required value="">
		<option value ="">From User</option>
		<?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['Name'] . "'>" . $tname['Name'] . "</option>";
                        }
                ?>

        </select>
		<select  class =touser  type="text" name="u2" value="">
	     <option value ="">To User</option>
		<?php
                        while($tname = mysqli_fetch_array($resul1)) {
                            echo "<option value='" . $tname['Name'] . "'>" . $tname['Name'] . "</option>";
                        }
                ?>

        </select>
		
		<input type="text" id="amount" Name="amt" placeholder="Enter amt">
		
		<input type="submit" id= submit Name="submit" value=" Transfer">
		
	</form>
</div>

	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				//update transaction changes in database
				$query1= "UPDATE Accounts  SET Balance = Balance + '$amt' WHERE Name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE Accounts SET Balance = Balance  - '$amt' WHERE Name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				
				//insert into transaction_history
				    $query1 = "INSERT INTO Overview (Sender,Receiver,Amount) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                          if($res2){
		                           	 $user1 = "SELECT * FROM Accounts WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                      }
				
            

				     if ($data1 && $data2)
				     {
					$message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Error While Commiting Transaction ";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="All Fields are Mandatory";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}

		

	?>
	
</body>
</html>
