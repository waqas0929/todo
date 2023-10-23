<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>

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
            margin: 0;
        }

        form {
            text-align: center;
            margin: 20px 0;
        }

        input[type="text"] {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: yellowgreen;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: green;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task {
            flex: 1;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Style for "Edit" button */
        .edit-button {
            background-color: yellow;
            color: #333;
        }

        .edit-button:hover {
            background-color: #e5d832;
        }

        /* Style for "Delete" button */
        .delete-button {
            background-color: #e74c3c;
            color: #fff;
        }

        .delete-button:hover {
            background-color: #c63c2c;
        }
    </style>
</head>
<body>
    <h1>Todo List</h1>
    <form method="post" action="todos.php">
        <input type="text" name="task" placeholder="Add a new task" required>
        <button type="submit" name="add_todo">Add</button>
    </form>

    <ul>
        <?php
        include("connection.php");
        $sql = "SELECT * FROM todos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $task = $row['task'];
               
                echo "<li>$task ";
                echo "<a href='edit.php?id=$id'>Edit</a> ";
                echo "<a href='todos.php?delete_todo=$id'>Delete</a></li>";
            }
        } else {
            echo "<li>No tasks to display.</li>";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
