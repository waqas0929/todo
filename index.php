<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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

        h1 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin-left: 32.5%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888;
            width: 30%;
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

        a.add-button,
        a.edit-button,
        a.delete-button {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        a.add-button:hover,
        a.edit-button:hover,
        a.delete-button:hover {
            background-color: #555;
        }

        a.edit-button {
            background-color: yellow;
        }

        a.delete-button {
            background-color: #e74c3c;
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

        // Handle the addition of a new task
        if (isset($_POST['add_todo'])) {
            $newTask = $_POST['task'];

            // Use prepared statements to insert the new task into the database
            $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (?)");
            $stmt->bind_param("s", $newTask);
            if ($stmt->execute()) {
                echo "New task added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }

        $result = $conn->query("SELECT * FROM todos");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $task = $row['task'];

                echo "<li>";
                echo "<div class='task'>$task</div>";
                echo "<div class='buttons'>";
                echo "<a class='edit-button' href='edit.php?id=$id'>Edit</a>";
                echo "<a class='delete-button' href='todos.php?delete_todo=$id'>Delete</a>";
                echo "</div>";
                echo "</li>";
            }
        } else {
            echo "<li>No tasks to display.</li>";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
