<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<!-- boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>Homepage</title>
</head>

<body>
    <div class="conatiner-fluid m-4">
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['name'] . "</td>";
                echo "<td>" . $user_data['mobile'] . "</td>";
                echo "<td>" . $user_data['email'] . "</td>";
                echo "<td><a href='edit.php?id=$user_data[id]' class='btn btn-primary'>Edit</a> | <a href='delete.php?id=$user_data[id]' class='btn btn-danger'>Delete</a></td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="btn btn-primary">Add New User</a>
    </div>
</body>

</html>