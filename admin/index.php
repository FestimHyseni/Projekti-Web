<?php
require '../config/Database.php';


if (isset($_SESSION['permission'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <?php include "includes/header.php"; ?>

    <div class="container mt-3">
        <h2>User Management</h2>
        <p>
            <?php
            if ($_SESSION['permission'] == 'admin') {
                echo "You are logged in as an Admin.";
                // Add additional admin-related content here if needed
            } else {
                echo "You are logged in as a User.";
                // Add additional user-related content here if needed
            }
            ?>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->prepare('SELECT id, name, email FROM users');
                $query->execute();

                while ($user = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$user['id']}</td>";
                    echo "<td>{$user['name']}</td>";
                    echo "<td>{$user['email']}</td>";
                    echo "<td><a href='index.php?page=edit_user&id={$user['user_id']}'>Edit</a> | <a href='index.php?page=delete_user&id={$user['user_id']}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include "includes/footer.php"; ?>
</body>

</html>
<?php
include 'footer.php'
?>

<?php
} else {
    header('Location: index.php');
}
?>