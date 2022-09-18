
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
				$m_name=$_POST["m_name"];
				$m_price=$_POST["m_price"];
				$m_quantity=$_POST["m_quantity"];
				$m_image=$_FILES["m_image"]["name"];
				$m_detail=$_POST["m_detail"];
				if($m_name==null ||$m_price==null||$m_quantity==null||$m_image==null){
					echo "<center> Here Are Some of The Fields Are Blank. Please submit Data.</center>";
				}else{
					if($_FILES['m_image']){
						//image upload
						$folder = "image/";
						
						if ((($_FILES["m_image"]["type"] == "image/gif")
						 || ($_FILES["m_image"]["type"] == "image/jpeg")
						 || ($_FILES["m_image"]["type"] == "image/jpg")
						 || ($_FILES["m_image"]["type"] == "image/pjpeg")
						 || ($_FILES["m_image"]["type"] == "image/x-png")
						 || ($_FILES["m_image"]["type"] == "image/png"))
						 && ($_FILES["m_image"]["size"] < 50000000)){
							move_uploaded_file($_FILES["m_image"]["tmp_name"] , "$folder".$_FILES["m_image"]["name"]);
							
							$query="insert into medicine
							values('','$m_name','$m_price','$m_quantity','image/$m_image','$m_detail')";
							$result= mysqli_query($connect,$query);
							if(!$result){
								echo "<center>Error: </center>".mysqli_error($connect);
							}
							else{
								echo "<center>medicine Data Inserted.</center>";
							}

						}else{
							echo "<center>Something Wrong With Image Type or Size(5 MB).</center>";
						}
					}
				}
			}
					
				if($_GET){
					if($_GET["event"]=="delete"){
					$m_no=$_GET["m_no"];
					$query="delete from medicine where m_no=$m_no";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<center>Error: </center>".mysql_error();
				}
				else{
					echo "<center>Medicine Data Deleted. </center>";	
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
h1{
	font-weight: bold; font-size: 150%;

}
table {
	 width: 100%;
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
			<!---start-medicine---->
			<div class="contact">				
				<div class="col span_1_of_3">
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Medicine From</h3>
					    <form method="post" action="medicine.php" enctype="multipart/form-data">
					    	<div>
						    	<span><label>Medicine Name <font color="red">*</font></label></span>
						    	<span><input name="m_name" id="m_name" type="text" class="m_name" pattern="[A-Za-z' -.]+" required></span>
						    </div>
							
							<div>
						    	<span><label>Price <font color="red">*</font></label></span>
						    	<span><input name="m_price" id="m_price" type="text" class="m_price" "required></span>
						    </div>
						    <div>
						    	<span><label>Quantity <font color="red">*</font></label></span>
						    	<span><input name="m_quantity"  id="m_quantity" type="text" class="m_quantity"  required></span>
						    </div>
						    
		           <div>
					  <div>
							 <span><label> Image <font color="red">*</font></label></span>
						    </div>
					<input class="m_image" type="file" id="m_image"  name="m_image" required >
					</div>
					 <div>
						    	<span><label>Detail <font color="red">*</font></label></span>
						    	<span><input name="m_detail"  id="m_detail" type="text" class="m_detail" required></span>
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
			<!---End-medicine---->
		</div>
		
		<center><h1>Medicine Information</h1></center>
		<br/>
		<?php
		$query="select * from medicine";
		$result= mysqli_query($connect,$query);

			echo "<center><table style='border:1px solid black;>";
			echo "<tr style='border:1px solid black'>";
				echo "<th style='border:1px solid black'>Medicine No</th>";
				echo "<th style='border:1px solid black'>Medicine Name</th>";
				echo "<th style='border:1px solid black'>Medicine Price</th>";
				echo "<th style='border:1px solid black'>Medicine Quantity</th>";
				echo "<th style='border:1px solid black'>Medicine Photo</th>";
				echo "<th style='border:1px solid black'>Medicine Detail</th>";
    if($_SESSION['login']==true && $_SESSION['utype']=='admin'){ 
				
				echo "<th style='border:1px solid black'>Edit</th>";
				echo "<th style='border:1px solid black'>Delete</th>";
			}
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$m_no=$row["m_no"];
				$m_name=$row["m_name"];
				$m_price=$row["m_price"];
				$m_quantity=$row["m_quantity"];
				$m_image=$row["m_image"];
				$m_detail=$row["m_detail"];
				echo "<tr style='border:1px solid black'>";
					echo "<td style='border:1px solid black'>$m_no</td>";
					echo "<td style='border:1px solid black'>$m_name</td>";
					echo "<td style='border:1px solid black'>$m_price</td>";
					echo "<td style='border:1px solid black'>$m_quantity</td>";
					echo "<td class='m_image'><img src='$m_image' style='height:150px; width:150px'/></td>";
					
					echo "<td style='border:1px solid black'>$m_detail</td>";
					     
		echo "<td style='border:1px solid black'><a href='medicineedit.php?event=edit&m_no=$m_no&m_name=$m_name&m_price=$m_price&m_quantity=$m_quantity&m_image=$m_image&m_detail=$m_detail'>Edit</a></td>";
					echo "<td style='border:1px solid black'><a href='medicine.php?event=delete&m_no=$m_no'>Delete</a></td>";
				
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
		
		
		
		
		
		
		