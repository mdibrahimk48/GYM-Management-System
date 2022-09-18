<!--A Design by gym
Author: Al-Kawsar Mojumdar
-->
<?php
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0);
?>
<?php

$connect=mysqli_connect("localhost","root","","m3_fitness");
	
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

<?php
$connect=mysqli_connect("localhost","root","","m3_fitness");

			if(@$_POST['submit']){
				$trainer_name=$_POST["trainer_name"];
				$trainer_address=$_POST["trainer_address"];
				$trainer_email=$_POST["trainer_email"];
				$trainer_mobile=$_POST["trainer_mobile"];
				$start_time=$_POST["start_time"];
				$end_time=$_POST["end_time"];
				$trainer_gender=$_POST["trainer_gender"];
				$trainer_image=$_FILES["trainer_image"]["name"];
				if($trainer_name==null ||$trainer_address==null||$trainer_email==null||$trainer_mobile==null||$trainer_gender==null){
					echo "<center> Here Are Some of The Fields Are Blank. Please submit Data.</center>";
				}else{
					if($_FILES['trainer_image']){
						//image upload
						$folder = "image/";
						
						if ((($_FILES["trainer_image"]["type"] == "image/gif")
						 || ($_FILES["trainer_image"]["type"] == "image/jpeg")
						 || ($_FILES["trainer_image"]["type"] == "image/jpg")
						 || ($_FILES["trainer_image"]["type"] == "image/pjpeg")
						 || ($_FILES["trainer_image"]["type"] == "image/x-png")
						 || ($_FILES["trainer_image"]["type"] == "image/png"))
						 && ($_FILES["trainer_image"]["size"] < 50000000)){
							move_uploaded_file($_FILES["trainer_image"]["tmp_name"] , "$folder".$_FILES["trainer_image"]["name"]);
							
							$query="insert into trainerschedule values('','$trainer_name','$trainer_address','$trainer_email','$trainer_mobile','$start_time','$end_time','$trainer_gender','image/$trainer_image',50)";
							$result= mysqli_query($connect,$query);
							if(!$result){
								if(mysqli_error($connect)){
				echo "<b><center style='background-color: gray; color:black'> Error: Phone Number Already Exists! Please Add Data With Another Number </center></b>";
					}
							}
							else{
								echo "<center style='background-color: gray; color:black'>Trainer Data Inserted.</center>";
							}

						}else{
							echo "<center style='background-color: gray; color:black'>Something Wrong With Image Type or Size(5 MB).</center>";
						}
					}
				}
			}
					
				if($_GET){
					if($_GET["event"]=="delete"){
					$ts_id=$_GET["ts_id"];
					$query="delete from trainerschedule where ts_id=$ts_id";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<center style='background-color: gray; color:black'>Error: </center>".mysql_error();
				}
				else{
					echo "<center style='background-color: gray; color:black'>Trainer Data Deleted. </center>";	
				}
			}
		}
?>



<div class="content">
			<div class="wrap">
			<!---start-staff---->
			<div class="contact">				
				<div class="col span_1_of_3">
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Trainer From</h3>
					    <form method="post" action="" enctype="multipart/form-data">
					    	<div>
						    	<span><label>Name <font color="red">*</font></label></span>
						    	<span><input name="trainer_name" id="trainer_name" type="text" class="trainer_name"pattern="[A-Za-z' -.]+" required></span>
						    </div>
							
							<div>
						    	<span><label>Address <font color="red">*</font></label></span>
						    	<span><input name="trainer_address" id="trainer_address" type="text" class="trainer_address"pattern="[A-Za-z' -.]+" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="trainer_email" id="trainer_email" type="email" class="trainer_email"></span>
						    </div>
						     <div>
							 <span><label>Mobile <font color="red">*</font></label></span>
						    	<span><input name="trainer_mobile" id="trainer_mobile" type="text" class="trainer_mobile" pattern="[0-9]{11}" required></span>
						    </div>
						    
						     <div>
							 <span><label>Start Time <font color="red">*</font></label></span>
						    	<span><input name="start_time" id="start_time" type="time" class="start_time" required></span>
						    </div>
						    <div>
							 <span><label>End Time <font color="red">*</font></label></span>
						    	<span><input name="end_time" id="end_time" type="time" class="end_time" required></span>
						    </div>
								<div class="combo"> 
								<span><label>Gender <font color="red">*</font><label></span>
									<span><select id="trainer_gender" name="trainer_gender" />
										<option value="Male"> Male </option>
										<option value="Female"> Female </option>
									</select>
								</span>
							</div>
							<div>
					  <div>
							 <span><label>Trainer Image <font color="red">*</font></label></span>
						    </div>
					<input class="trainer_image" type="file" id="trainer_image" name="trainer_image" required>
					</div>
						   <div>
						   		<span><input type="submit" id="submit" name="submit" class="submit" value="Submit"></span>
						  </div>
					    </form>

				    </div>
  				</div>		
  				<div class="clear"> </div>		
			  </div>
			  </div>
			<!---End-trainerschedule---->
		</div>
		
		
		<center><h1>Trainer Information</h1></center>

		<br/>
		<?php
		$query="select * from trainerschedule";
		$result= mysqli_query($connect,$query);
		echo "<center><table style='border:1px solid black' width='100%'>";
			echo "<tr style='border:1px solid black'>";
				echo "<th style='border:1px solid black'>Scedule Id</th>";
				echo "<th style='border:1px solid black'>Trainer Name</th>";
				echo "<th style='border:1px solid black'>Trainer Address</th>";
				echo "<th style='border:1px solid black'>Trainer E-mail</th>";
				echo "<th style='border:1px solid black'>Trainer Mobile</th>";
				echo "<th style='border:1px solid black'>Start Time</th>";
				echo "<th style='border:1px solid black'>End Time</th>";
				echo "<th style='border:1px solid black'>Trainer Gender</th>";
				echo "<th style='border:1px solid black'>Trainer Photo</th>";

				echo "<th style='border:1px solid black'>Edit</th>";
				echo "<th style='border:1px solid black'>Delete</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$ts_id=$row["ts_id"];
				$trainer_name=$row["trainer_name"];
				$trainer_address=$row["trainer_address"];
				$trainer_email=$row["trainer_email"];
				$trainer_mobile=$row["trainer_mobile"];
				$start_time=$row["start_time"];
				$end_time=$row["end_time"];
				$trainer_gender=$row["trainer_gender"];
				$trainer_image=$row["trainer_image"];
				echo "<tr style='border:1px solid black'>";
					echo "<td style='border:1px solid black'>$ts_id</td>";
					echo "<td style='border:1px solid black'>$trainer_name</td>";
					echo "<td style='border:1px solid black'>$trainer_address</td>";
					echo "<td style='border:1px solid black'>$trainer_email</td>";
					echo "<td style='border:1px solid black'>$trainer_mobile</td>";
					echo "<td style='border:1px solid black'>$start_time</td>";
					echo "<td style='border:1px solid black'>$end_time</td>";
					echo "<td style='border:1px solid black'>$trainer_gender</td>";
					echo "<td class='trainer_image'><img src='$trainer_image' style='height:150px; width:150px'/></td>";
					echo "<td style='border:1px solid black'><a href='traineredit.php?event=edit&ts_id=$ts_id&trainer_name=$trainer_name&trainer_address=$trainer_address&trainer_email=$trainer_email&trainer_mobile=$trainer_mobile&start_time=$start_time&end_time=$end_time&trainer_gender=$trainer_gender&trainer_image=$trainer_image'>Edit</a></td>";
					echo "<td style='border:1px solid black'><a href='settrainerschedule.php?event=delete&ts_id=$ts_id'>Delete</a></td>";
				echo "</tr>";
			}
		}
		echo "</table></center>"?>

	<br/><br/><br/><br/>	
		
		
<div class="footer specials">
<div class="wrap">
	<div class="footer_main1">
		<div class="footer-grid">
			<h3>Welcome!</h3>
			<p>Welcome to the M3 Fitness Gym! We hope you will appreciate our services and opportunities. We offer students and our loyal members and sale Gym medicine for them. Here are some them</p>
			<form action="search.php" method="get" accept-charset="utf-8" class="nav-form">
                 <input type="text" name="s" onblur="if(this.value=='') this.value=''" onfocus="if(this.value =='' ) this.value=''" value=" ">
                 <a href="#" onclick="document.getElementById('search-form').submit()" class="sub_button1">Subscribe</a>
            </form>
            <div class="clear"></div>
		</div>
		<div class="footer-nav1">
        	<ul>
        		<li id="twtr"><a href=""><img src="images/twitter.png" alt="" title="Twitter"></a></li>
            	<li id="fb"><a href=""><img src="images/fb.png" alt="" title="facebook"></a></li>
                <li id="feed"><a href=""><img src="images/feed.png" alt="" title="Feed"></a></li>
                <li id="plus"><a href=""><img src="images/plus.png" alt="" title="Plus"></a></li>
			</ul>
        </div>
	</div>
</div>
</div>


</div>
<div class="ftr1-bg">
<div class="wrap">
<div class="footer1">
	<p class="link"><span>© All rights reserved | Design by&nbsp; Al-Kawsar Majumdar</span></p>
</div>
</div>
</div>
</body>
</html>