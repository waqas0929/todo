<?php
$servername = 'localhost';
$username = 'root';

$password = '';

$database = 'todo';

$conn = new mysqli( $servername, $username, $password, $database );

if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
}

// To retrieve data from the 'details' table
// $sql = 'SELECT * FROM details';
// $result = $conn->query( $sql );

// if ( $result->num_rows > 0 ) {
//     while ( $row = $result->fetch_assoc() ) {
//         $id = $row[ 'id' ];
        // Retrieve other columns and data here
//     }
// } else {
//     echo "No data found in the 'details' table.";
// }

// $conn->close();
?>
