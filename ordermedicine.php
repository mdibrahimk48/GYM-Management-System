
<?php
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0);
?>
<?php

$connect=mysqli_connect("localhost","root","","m3_fitness");
	
?>

<?php	
$connect=mysqli_connect("localhost","root","","m3_fitness");

			if(@$_GET){
				$m_no=$_GET["m_no"];
				$m_name=$_GET["m_name"];
				$m_price=$_GET["m_price"];
			
			}
			if(@$_POST['order']){
				$mobile=$_SESSION['mobile'];
				
				$m_no=$_POST["m_no"];
				$m_name=$_POST["m_name"];
				$m_price=$_POST["m_price"];
				$m_quantity=$_POST["m_quantity"];
				$total_price=$m_price*$m_quantity;
				$query="insert into orders values('','$m_no','$m_name','$m_price','$m_quantity','$total_price','$mobile')";
							$result= mysqli_query($connect,$query);
							if(!$result){
								echo "<center>Error: </center>".mysqli_error($connect);
							}
							else{
								$query="select m_quantity from medicine";
								$resul= mysqli_query($connect,$query);
								while($r=mysqli_fetch_array($resul,MYSQLI_ASSOC)){
									$QNT=$r['m_quantity']-$m_quantity;
									$query="update medicine set m_quantity='$QNT' WHERE m_no='$m_no'";
								$result= mysqli_query($connect,$query);
								}
								echo "<center>Order Success!</center>";
							}
			}
			
?>

<!DOCTYPE HTML>
<html>
<head>
<title>M3 Fitness Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<style>

table, th, td, tr{
	border: 2px solid black;
}

tr{

	text-align: center;
}
th{
font-weight: bold; background-color: gray;
}
h1{
	font-weight: bold; font-size: 150%;

}
table {
	 width: 150%;
}
</style>
</head>
<body>
<div class="h_bg">
<div class="wrap">
<div class="header">
	<div class="logo">
		<h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
	</div>
	<div class='cssmenu'>
	<ul>
	    <li><a href='index.php'><span>Home</span></a></li>
	   <li><a href='about.php'><span>About</span></a></li>

	   <li class='has-sub'><a href='#'><span>Trainer</span></a>
	      <ul>
	      <?php if($_SESSION['login']==true && $_SESSION['utype']=='admin'){ ?>

	            <li><a href='settrainerschedule.php'><span>Add Trainer</span></a></li>
	               <?php } ?>
			<li><a href='viewschedule.php'><span>All Trainer</span></a></li>
	      </ul>

	   </li>
	    <li class='has-sub'><a href='#'><span>Medicine</span></a>

	      <ul>
		         <?php if($_SESSION['login']==true && $_SESSION['utype']=='admin'){ ?>
		         <li><a href='medicine.php'><span>Add Medicine</span></a></li>
	         <li class='has-sub'><a href='allmedicine.php'><span>Edit Medicine</span></a>
	         	 
	          
	           <?php } else{?>
			     <li><a href='medicineveiw.php'><span>Medicines</span></a></li>
			     <?php } ?>

	         </li>
	      </ul>
	   </li>

	   <!--<li class='has-sub'><a href='#'><span>Services</span></a>
	      <ul>
	   
	         <li class='has-sub'><a href='viewschedule.php'><span> Trinar Schedule</span></a>
	         </li>
	          <li class='has-sub'><a href='Package.php'><span>Packages</span></a>
	          <li class='has-sub'><a href='viewmemberschedule.php'><span>Member Schedule</span></a>
	      </ul>
	   </li>-->
	  

	    
	     <?php if(!isset($_SESSION['login'])){ ?>
	     <li class='last'><a href='Registration.php'><span>Registration</span></a></li>

	         <li class='has-sub'><a href='login.html'><span>Log In</span></a>
	         </li>
	         <?php }else{ ?>
	         <li class='has-sub'><a href='logout.php'><span>Log Out</span></a>
	         </li>
	         <?php } ?>

	 <div class="clear"></div>
	 </ul>
	</div>
	<div class="clear"></div>
	</div>
	</div>
</div>

			
			<div class="content">
			<div class="wrap">
			<!---start-medicine---->
			<div class="contact">				
				<div class="col span_1_of_3">
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Order From</h3>
					    <form method="post" action="ordermedicine.php" >
					    	<div>
				
						    	<span><label>Medicine Name <font color="red">*</font></label></span>
						    	<span><input name="m_name" id="m_name" type="text" class="m_name" value="<?php echo $m_name;?>"/></span>
						    </div>
							
							<div>
						    	<span><label>Price <font color="red">*</font></label></span>
						    	<span><input name="m_price" id="m_price" type="text" class="m_price" value="<?PHP echo $m_price; ?>"/></span>
						    </div>
						    <div>
						    	<span><label>Quantity <font color="red">*</font></label></span>
						    	<span><input name="m_quantity"  id="m_quantity" type="text" class="m_quantity" required="" min="1" max="5" title="Minus values Is Not Allowed." /></span>
						    </div>
			
						   <div>
						   		<span><input type="hidden" value="<?php echo $_GET["m_no"]?>" name="m_no"/>
                                      <input type="submit" name="order" id= "order" class="submit" value="order"/></span>
						  </div>
					    </form>

				    </div>
  				</div>		
  				<div class="clear"> </div>		
			  </div>
			  </div>
			<!---End-medicine---->
		</div>
			
			<center><h1>Order Medicine</h1></center>
		<br/>
	<?php
		$query="select * from medicine";
		$result= mysqli_query($connect,$query);
		echo "<center><table style='border:1px solid black; width:90%'>";
			echo "<tr style='border:1px solid black'>";
				echo "<th style='border:1px solid black'>Medicine No</th>";
				echo "<th style='border:1px solid black'>Medicine Name</th>";
				echo "<th style='border:1px solid black'>Medicine Price</th>";
				echo "<th style='border:1px solid black'>Medicine Quantity</th>";
				echo "<th style='border:1px solid black'>Medicine Photo</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$m_no=$row["m_no"];
				$m_name=$row["m_name"];
				$m_price=$row["m_price"];
				$m_quantity=$row["m_quantity"];
				$m_image=$row["m_image"];
				echo "<tr style='border:1px solid black'>";
					echo "<td style='border:1px solid black'>$m_no</td>";
					echo "<td style='border:1px solid black'>$m_name</td>";
					echo "<td style='border:1px solid black'>$m_price</td>";
					echo "<td style='border:1px solid black'>$m_quantity</td>";
					echo "<td class='m_image'><img src='$m_image' style='height:150px; width:150px'/></td>";
				echo "</tr>";
			}
		}
		echo "</table></center>"?>
		
		<br/><br/><br/><br/>	