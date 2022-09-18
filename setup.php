<?php 
	$con = mysqli_connect("localhost","root","");
	$query = "drop database if exists m3_fitness";
	if(mysqli_query($con,$query)){
			echo "<p>Database Dropped Successfully.</p>";
	}

	$query = "create database m3_fitness";
	mysqli_query($con, $query);
	$con=mysqli_connect("localhost","root","","m3_fitness");
		
		echo "<p>Database Created Successfully.</p>";


	$table1 = "CREATE TABLE registration(
				name varchar(30) not null, 
				address varchar(300) not null,
				zip_code varchar(50) not null,
				occupation varchar(50) not null,
				mobile varchar(15) not null,
				email varchar(30) not null, 
				gender varchar(30) not null,
				
				password varchar(30) not null,
				timestamp int(11)not null,
				attempt int(11)not null,
				utype varchar(30) not null,
				primary key (mobile))";

	if(mysqli_query($con,$table1))
		echo "Registration Table Is Created.<br/><br/>";
	else echo mysqli_error($con);
	
	/*$table2 = "CREATE TABLE staff(	
				s_id int(11) not null auto_increment,	
				staff_name varchar(40) not null, 
				staff_address varchar(300) not null, 
				staff_email varchar(50) not null,
				staff_mobile varchar(20) not null, 
				staff_gender varchar(15) not null,
				staff_image varchar(500) not null,
				primary key (s_id))";

	if(mysqli_query($con,$table2))
		echo "Staff Table Is Created.<br/>";
	else echo mysqli_error($con);*/
	
							
				$table3 = "CREATE TABLE medicine(	
				m_no int(11) not null auto_increment,	
				m_name varchar(40) not null, 
				m_price double not null, 
				m_quantity int(11) not null,
				m_image varchar(500) not null,
				m_detail varchar(500)not null,
				primary key (m_no))";

	if(mysqli_query($con,$table3))
		echo "Medicine Table Is Created.<br/><br/>";
	else echo mysqli_error($con);
	
	
	$table4 = "CREATE TABLE orders(	
	order_no int(11) not null auto_increment,
				m_no int(11) ,	
				m_name varchar(40) not null, 
				m_price double not null, 
				m_quantity int(11) not null, 
				total_price double,
				mobile varchar(15) not null,
				primary key (order_no))";

	if(mysqli_query($con,$table4))
		echo "Order Table Is Created.<br/><br/>";
	else echo mysqli_error($con);
							
		$table5 = "CREATE TABLE trainerschedule(	
				ts_id int(11) not null auto_increment,	
				trainer_name varchar(40) not null, 
				trainer_address varchar(200) not null, 
				trainer_email varchar(50) not null,
				trainer_mobile varchar(20) not null unique,
				start_time time NOT NULL,
      			end_time time NOT NULL,
				trainer_gender varchar(15) not null,
				trainer_image varchar(500) not null,
				max_trainee int(11) not null,
			
				primary key (ts_id))";

	if(mysqli_query($con,$table5))
		echo "Trainerschedule Table Is Created.<br/><br/>";
	else echo mysqli_error($con);	

	$table6 = "CREATE TABLE traineeschedule(	
				id int(11) not null auto_increment,	
				ts_id int (11) null,
				mobile varchar(15) not null unique,
				
				primary key (id))";

	if(mysqli_query($con,$table6))

		echo "Traineeschedule Table Is Created.<br/><br/>";
	else echo mysqli_error($con);					
							
	$query = "insert into registration values('Kawsar','Nakhalpara','d123','student','01515663965','kawsar@gmail.com','male',1234,0,0,'admin')";
	$result = mysqli_query($con, $query);
		if(!$result) echo mysqli_error($con);
			else echo "<p>Data Successfully Inserted into Registration table.</p><br/>";

	echo "<p><a href='login.html'>Index Page</a></p>";
 ?>