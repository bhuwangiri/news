<?php include('../../database.php'); ?>

<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

<?php
$newsSelectQuery = "SELECT * FROM news";
$result = mysqli_query($connection, $newsSelectQuery);
?>

<a href="create.php" class="btn btn-primary">Create New News</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publish Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['image'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['category_id'] ?></td>
            <td><?php echo $row['author_id'] ?></td>
            <td><?php echo $row['publish_date'] ?></td>
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