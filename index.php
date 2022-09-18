<!--A Design by gym
Author: Al-Kawsar Mojumdar

-->

<?php
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0);

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
<div class="fluid_container">
   <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
          <div data-src="images/slider1.jpg">           </div>
            <div data-src="images/slider2.jpg">
            </div>
            <div  data-src="images/slider3.jpg">
            </div>
   </div>
</div>
<div class="clear"></div>
<div class="content">
			<div class="content-grids">
				<div class="wrap">
				 <div class="grid">
					<a href="#"><img src="images/grids-img.jpg" title="image-name"></a>
					<h3>Popular Bicep Workout</h3>
					<div class="grid_p">
					<p>This item is very important part of fort bicep muscle.If you want to develop your bicep you have to do 3 to 4 set every 24 hours later</p>
					
					</div>
				</div>
				<div class="grid">
					<a href="#"><img src="images/grids1-img.jpg" title="image-name"></a>
					<h3>Side Stretching</h3>
					<div class="grid_p">
					<p>This item help to loss belly side muscle fat.That's why you have to do 3 to 4 set. 10-12 raps in per set. it is free hand workout.No Need to carry any kind of weight.</p>
					
					</div>
				</div>
				<div class="grid last-grid">
					<a href="#"><img src="images/grids2-img.jpg" title="image-name"></a>
					<h3>Banch Press</h3>
					<div class="grid_p">
					<p>Banch press is one of the mejor part or chest workout.It's help to develop our chest muscle.3 to 4 set is good enough for this item. 12-15 raps in a set is very efficative for pump your chest muscle.</p>
					
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		 </div>
			<div class="specials">
				<div class="wrap">
					<div class="specials-heading">
						<h3>Body Development sit</h3>
					</div>
					<div class="specials-grids">
						<div class="special-grid">
							<img src="images/pic_a.jpg" title="image-name">
							<a href="#">Dumbel Row</a>
							<p>This Item helps to develop side Upper back muscle. Dumbel Row is very important  item for develop ack muscle and burn back muslce.</p>
						</div>
						<div class="special-grid">
							<img src="images/pic_b.jpg" title="image-name">
							<a href="#">volutpat luctus eros</a>
							<p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
						</div>
						<div class="special-grid spe-grid">
							<img src="images/pic_c.jpg" title="image-name">
							<a href="#">Quisque erat metus</a>
							<p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
						</div>
						<div class="clear"> </div>
					</div>
			    </div>
			</div>	
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