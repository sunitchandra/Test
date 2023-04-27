<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World 1</p>'; 
	$servername = "mysqltestsc.mysql.database.azure.com";
	$username = "azureadmin";
	$password = "Rockwell123!@#";
	$db_name = "testdb";

	//Initializes MySQLi
	$conn = mysqli_init();

	//mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

	// Establish the connection 'myadmin@mydemoserver'
	mysqli_real_connect($conn, $servername, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

	//If connection failed, show the error
	if (mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	else {
		echo "Connected Sucessfully..!!";
		
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
		printf("Table created\n");
		}
		
		//Create an Insert prepared statement and run it
		$product_name = 'BrandNewProduct';
		$product_color = 'Blue';
		$product_price = 15.5;
		if ($stmt = mysqli_prepare($conn, "INSERT INTO Products (ProductName, Color, Price) VALUES (?, ?, ?)"))
		{
			mysqli_stmt_bind_param($stmt, 'ssd', $product_name, $product_color, $product_price);
			mysqli_stmt_execute($stmt);
			printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
			mysqli_stmt_close($stmt);
		}
		
		//Run the Select query
		printf("Reading data from table: \n");
		$res = mysqli_query($conn, 'SELECT * FROM Products');
		while ($row = mysqli_fetch_assoc($res))
		 {
			var_dump($row);
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