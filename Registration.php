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

			if(@$_POST['submit']){
				$name=$_POST["name"];
				$address=$_POST["address"];
				$zip_code=$_POST["zip_code"];
				$occupation=$_POST["occupation"];
				$mobile=$_POST["mobile"];
				$email=$_POST["email"];
				$gender=$_POST["gender"];
				$password=$_POST["password"];
				
				if($name==null ||$address==null||$zip_code==null||$occupation==null||$mobile==null||$email==null||$gender==null||$password==null){
					echo "<center> Here Are Some of The Fields Are Blank. Please submit Data.</center>";
				}else{
					
							$query="insert into registration(name,address,zip_code,occupation,mobile,email,gender,utype,password) values('name','$address','$zip_code','$occupation','$mobile','$email','$gender','user','$password')";
							$result= mysqli_query($connect,$query);
							if(!$result){
								echo "<center>Error: </center>".mysqli_error($connect);
							}
							else{
								echo "<center> Registration Data Inserted.</center>";
							}

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
			<!---start-contact---->
			<div class="contact">				
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>348 East Nakhalpara,</p>
						   		<p>Tejgao,Dhaka-1215,</p>
						   		<p>Bangladesh</p>
				   		<p>Phone:(+880)01515663965</p>
				 	 	<p>Email: <span><a href="google.com">1000223@daffodil.ac</a></span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Registration Form</h3>
					    <form method="post" action="?">
					    	<div>
						    	<span><label>Name <font color="red">*</font></label></span>
						    	<span><input name="name" type="text" class="name" pattern="[A-Za-z' -.]+" required /></span>
						    </div>
							
							<div>
						     	<span><label>Address <font color="red">*</font></label></span>
						    	<span><input name="address" type="text" class="address" required></span>
						    </div>
							  <div>
						    	<span><label>Zip Code <font color="red">*</font></label></span>
						    	<span><input name="zip_code" type="text" class="zip" required></span>
						    </div>
							<div>
						     	<span><label>Occupation <font color="red">*</font></label></span>
						    	<span><input name="occupation" type="text" class="occupation"></span>
						    </div>
							<div>
						     	<span><label>Mobile <font color="red">*</font></label></span>
						    	<span><input name="mobile" type="text" class="phone" pattern="[0-9]{11}" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="email" type="email" class="email"></span>
						    </div>
					<div class="combo"> 
						<span><label>Gender <font color="red">*</font><label></span>
							<span><select id="gender" name="gender" required/>
								<option value="Male"> Male </option>
								<option value="Female"> Female </option>
							</select>
						</span>
					</div>
						    

						

							 <div>
						    	<span><label>Password <font color="red">*</font></label></span>
						    	<span><input name="password" type="password" class="password" required></span>
						    </div>
							 <div>
						    	<span><label>Confirm Password</label></span>
						    	<span><input name="cPassword" type="password" class="CPassword" required></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" class="Submit" value="Submit"></span>
						  </div>
					    </form>

				    </div>
  				</div>		
  				<div class="clear"> </div>		
			  </div>
			  </div>
			<!---End-contact---->
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
	<p class="link"><span>© All rights reserved | Design by&nbsp; Al-Kawsar Mojumdar</span></p>
</div>
</div>
</div>
</body>
</html>