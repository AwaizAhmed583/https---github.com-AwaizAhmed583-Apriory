<?Php
$host = "localhost";
// $port = 38150;

$user = "root";
$password = "";
$dbname = "project12";

//Herstellung der Verbindung zum MySQL Server
$con = mysqli_connect( $host, $user, $password, $dbname );

if ( $con ) {
	//echo "- ";
} else {
	die( "Keine Verbindung zum MySQL Server mÃ¶glich" . mysqli_connect_error() );
}

//Herstellung der Verbindung zur Datenbank
$db_link = mysqli_select_db( $con, $dbname );

if ( $db_link ) {
	//echo "-";
} else {
	die( "Keine Verbindung zur Datenbank war nicht mÃ¶glich" );
}

