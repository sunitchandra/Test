<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; 
	$servername = "mysqltestsc.mysql.database.azure.com";
	$username = "azureadmin";
	$password = "Rockwell123!@#";
	$db_name = "testdb";

	//Initializes MySQLi
	$conn = mysqli_init();

	mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

	// Establish the connection 'myadmin@mydemoserver'
	mysqli_real_connect($conn, $servername, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

	//If connection failed, show the error
	if (mysqli_connect_errno())
	{
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	else {
		echo "Connected Sucessfully..!!";
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