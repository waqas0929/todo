<?php
include( 'connection.php' );

if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
    $sql = "SELECT * FROM todos WHERE id=$id";
    $result = $conn->query( $sql );

    if ( $result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        $task = $row[ 'task' ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Todo</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

form {
    text-align: center;
    margin: 20px 0;
}

input[ type = 'text' ] {
    width: 30%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}
</style>
</head>
<body>
<h1>Edit Todo</h1>
<form method = 'post' action = 'todos.php'>
<input type = 'hidden' name = 'edit_id' value = "<?php echo $id; ?>">
<input type = 'text' name = 'edit_task' value = "<?php echo $task; ?>" required>
<button type = 'submit' name = 'edit_todo'>Save</button>
</form>
</body>
</html>
