<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p><b>Hello Bhawna, This is vNet World From Azure WebApp Connected Via MySQL</b></p>'; 
	$servername = "testrecruitment.mysql.database.azure.com"; #"mysqltestsc.mysql.database.azure.com";
	$username = "autorock";  #"azureadmin";
	$password = "rockwell@123"; #"Rockwell123!@#";
	$db_name = "testcx13"; #"testdb";

	//Initializes MySQLi
	$conn = mysqli_init();

	// Establish the connection 'myadmin@mydemoserver'
	mysqli_real_connect($conn, $servername, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

	//If connection failed, show the error
	if (mysqli_connect_errno())
	{
		die('<br>Failed to connect to MySQL: '.mysqli_connect_error().'<br>');
	}
	else {
		echo "<br>Connected Sucessfully..!!<br>";
		
		// Run the create table query
		if (mysqli_query($conn, '
		CREATE TABLE Products (
		`Id` INT NOT NULL AUTO_INCREMENT ,
		`ProductName` VARCHAR(200) NOT NULL ,
		`Color` VARCHAR(50) NOT NULL ,
		`Price` DOUBLE NOT NULL ,
		PRIMARY KEY (`Id`)
		);
		')) {
		echo "<br>Products Table created<br>";
		}
		
		//Create an Insert prepared statement and run it
		$product_name = 'BrandNewProduct';
		$product_color = $_SERVER['HTTP_HOST'];
		$product_price = 15.5;
		if ($stmt = mysqli_prepare($conn, "INSERT INTO Products (ProductName, Color, Price) VALUES (?, ?, ?)"))
		{
			mysqli_stmt_bind_param($stmt, 'ssd', $product_name, $product_color, $product_price);
			mysqli_stmt_execute($stmt);
			echo "<br>Inserted: Affected ". mysqli_stmt_affected_rows($stmt) . " rows<br>";
			mysqli_stmt_close($stmt);
		}
		
		//Run the Select query
		echo "<br>Reading data from table: <br><pre>";
		$res = mysqli_query($conn, 'SELECT * FROM Products');
		while ($row = mysqli_fetch_assoc($res))
		 {
			print_r($row);
		 }
	}
	
	/*
	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	
	
	CREATE DATABASE testdb;

	CREATE USER 'db_user'@'%' IDENTIFIED BY 'StrongPassword!';

	GRANT ALL PRIVILEGES ON testdb . * TO 'db_user'@'%';

	FLUSH PRIVILEGES;

	USE testdb;

	SHOW GRANTS FOR 'db_user'@'%';
	*/
?>
 </body>
</html>
