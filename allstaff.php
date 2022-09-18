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
</style>>
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
			<!---start-staff---->
			<div class="contact">				
				<div class="col span_1_of_3">
				</div>				
				<div class="col span_2_of_3">
				  <center><h1>All Staff Information</h1></center>
		<br/>
		<?php
		$query="select * from staff";
		$result= mysqli_query($connect,$query);
		echo "<center><table style='border:1px solid black'>";
			echo "<tr style='border:1px solid black'>";
				echo "<th style='border:1px solid black'>Staff ID</th>";
				echo "<th style='border:1px solid black'>Staff Name</th>";
				echo "<th style='border:1px solid black'>Staff Address</th>";
				echo "<th style='border:1px solid black'>Staff E-mail</th>";
				echo "<th style='border:1px solid black'>Staff Mobile</th>";
				echo "<th style='border:1px solid black'>Staff Gender</th>";
				echo "<th style='border:1px solid black'>Staff Photo</th>";


			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$s_id=$row["s_id"];
				$staff_name=$row["staff_name"];
				$staff_address=$row["staff_address"];
				$staff_email=$row["staff_email"];
				$staff_mobile=$row["staff_mobile"];
				$staff_gender=$row["staff_gender"];
				$staff_image=$row["staff_image"];
				echo "<tr style='border:1px solid black'>";
					echo "<td>$s_id</td>";
					echo "<td style='border:1px solid black'>$staff_name</td>";
					echo "<td style='border:1px solid black'>$staff_address</td>";
					echo "<td style='border:1px solid black'>$staff_email</td>";
					echo "<td style='border:1px solid black'>$staff_mobile</td>";
					echo "<td style='border:1px solid black'>$staff_gender</td>";
					echo "<td class='staff_image'><img src='$staff_image' style='height:150px; width:500px'/></td>";
					
				echo "</tr>";
			}
		}
		echo "</table></center>"?>

	<br/><br/><br/><br/>
  				</div>		
  				<div class="clear"> </div>		
			  </div>
			  </div>
			<!---End-staff---->
		</div>
		
			
		
		
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