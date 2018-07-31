<?php include('../../database.php'); ?>

<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

<?php
$categorySelectQuery = "SELECT * FROM category";
$result = mysqli_query($connection, $categorySelectQuery);
?>

<a href="create.php" class="btn btn-primary">Create New Category</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>