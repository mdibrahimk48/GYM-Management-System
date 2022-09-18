<?php
session_start(); 

?>


<?php
 
	$mobile =$_POST["mobile"];
	$password = $_POST["password"];
	$con = mysqli_connect("localhost","root","","m3_fitness");
	$query = "select * from registration where  mobile='$mobile'";
	$result = mysqli_query($con, $query);
	$num = mysqli_num_rows($result);
	if($num==0)
		echo "User doesn't exist with this mobile number, please enter a valid number in <a href='login.html'> Login</a> Page";
	else{
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
		$time = $row['timestamp'];
		if ($time<time()) {
			$dbpassword=$row['password'];
			if($password != $dbpassword){
				echo "<b> please enter right password <a href='login.html'> Login</a> Page</b>";
				$attempt = $row['attempt']+1;
				$query="update registration set attempt=$attempt where mobile='$mobile'";
				mysqli_query($con, $query);

				if ($attempt==3) {
					$time = time()+10000;
					$query = "update registration set timestamp=$time where mobile='$mobile'";	
					mysqli_query($con, $query);
				}
			}
			else{
				$query="update registration set attempt=0, timestamp=0 where mobile='$mobile'";
				$result=mysqli_query($con,$query);
				$utype = $row['utype'];

				$_SESSION['mobile'] = $mobile;
				$_SESSION['utype'] = $utype;
				$_SESSION['login'] = true;
					
						header('location: index.php');
					
			}
		}else 
	echo "Time Out";
	}?>