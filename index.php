<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; 
 $servername = "mysqltestsc.mysql.database.azure.com";
	$username = "azureadmin";
	$password = "Rockwell123!@#";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
?>
 </body>
</html>