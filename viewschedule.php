<!--A Design by gym
Author: Al-Kawsar Mojumdar

-->

<?php
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0);


 $con=mysqli_connect("localhost","root","","m3_fitness");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>M3 Fitness Gym</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
    <script type='text/javascript' src="js/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.easing.1.3.js"></script> 
    <script type='text/javascript' src="js/camera.min.js"></script> 
      <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
				height: 'auto',
				loader: 'bar',
				pagination: false,
				thumbnails: true,
				hover: false,
				opacityOnGrid: false,
				imagePath: '../images/'
			});

		});
	</script>

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
<br>

<div class="clear"></div>
<div class="content">
		<div>
			<center><h1>Trainer Schedule</h1></center>
		<br/>
		<?php
		$query="select * from trainerschedule";
		$result= mysqli_query($con,$query);

		echo "<center><table style='border:1px solid black; width:90%'>";
			echo "<tr style='border:1px solid black'>";
				echo "<th style='border:1px solid black'>Scedule Id</th>";
				echo "<th style='border:1px solid black'>Trainer Photo</th>";
				echo "<th style='border:1px solid black'>Trainer Name</th>";
				echo "<th style='border:1px solid black'>Trainer E-mail</th>";
				echo "<th style='border:1px solid black'>Trainer Mobile</th>";
				echo "<th style='border:1px solid black'>Treiner Duration</th>";
				echo "<th style='border:1px solid black'>Available Sit</th>";
				if($_SESSION['login']==true && $_SESSION['utype']=='user'){
				echo "<th style='border:1px solid black'>Action</th>";
				}	
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$ts_id=$row["ts_id"];
				$staff_name=$row["trainer_name"];
				$staff_address=$row["staff_address"];
				$staff_email=$row["trainer_email"];
				$staff_mobile=$row["trainer_mobile"];
				$start_time=$row["trainer_time"];
				$end_time=$row["end_time"];
				$staff_gender=$row["trainer_gender"];
				$staff_image=$row["trainer_image"];
				$max_trainee=$row["max_trainee"];
				echo "<tr style='border:1px solid black'>";
					echo "<td style='border:1px solid black; text-align:center'>$ts_id</td>";
					echo "<td class='staff_image'><img src='$staff_image' style='height:150px; width:150px'/></td>";
					echo "<td style='border:1px solid black; text-align:center'>$staff_name</td>";
					echo "<td style='border:1px solid black; text-align:center'>$staff_email</td>";
					echo "<td style='border:1px solid black; text-align:center'>$staff_mobile</td>";
					echo "<td style='border:1px solid black; text-align:center'>$start_time  to  $end_time</td>";
					echo "<td style='border:1px solid black; text-align:center'>$max_trainee</td>";
				if($_SESSION['login']==true && $_SESSION['utype']=='user'){
					echo "<td style='border:1px solid black; text-align:center'><a href='bookschedule.php?event=book&ts_id=$ts_id'>Admit</a></td>";
				}
				echo "</tr>";
			}
		}
		echo "</table></center>"?>
		</div>	
		<br/>
</div>
<div class="footer">
<div class="wrap">
	<div class="footer_main">
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
	<p class="link"><span>©© All rights reserved | Design by&nbsp; Al-Kawsar Mojumdar></span></p>
</div>
</div>
</div>
</body>
</html>