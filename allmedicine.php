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

				<center><h1>Medicine Information</h1></center>
		<br/>
				 <?php
		$query="select * from medicine";
		$result= mysqli_query($connect,$query);
		echo "<center><table style='border:1px solid black width=100%;'>";
			echo "<tr>";
				echo "<th style='border:1px solid black'>Medicine No</th>";
				echo "<th style='border:1px solid black'>Medicine Name</th>";
				echo "<th style='border:1px solid black'>Medicine Price</th>";
				echo "<th style='border:1px solid black'>Medicine Quantity</th>";
				echo "<th style='border:1px solid black'>Medicine Photo</th>";

				echo "<th style='border:1px solid black'>Edit</th>";
				echo "<th style='border:1px solid black'>Delete</th>";
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
					echo "<td style='border:1px solid black'><a href='medicineedit.php?event=edit&m_no=$m_no&m_name=$m_name&m_price=$m_price&m_quantity=$m_quantity&m_image=$m_image'>Edit</a></td>";
					echo "<td style='border:1px solid black'><a href='medicine.php?event=delete&m_no=$m_no'>Delete</a></td>";
				echo "</tr>";
			}
		}
		echo "</table></center>"?>
		
		<br/><br/><br/><br/>	
		
				</div>
  				</div>		
  				<div class="clear"> </div>		
			  </div>
			  </div>
			<!---End-medicine---->
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
		
		
		
		
		
		
		