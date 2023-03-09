<?
ini_set( 'default_charset', 'UTF-8' );

$servername = "localhost";
$username = "root";
$database = "drjacques";
$password = "";
//  Create a new connection to the MySQL database using PDO
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlConfig = "SET NAMES 'utf8'";
$conn->query($sqlConfig);
//echo "Connected successfully";

?>