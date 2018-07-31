<?php
include('../../database.php');

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category'];
    $author_id = $_POST['author'];
    $image = 'test.jpg';
    $dateTime = date('Y-m-d h:i:s');

    $newsInsertQuery = "
INSERT INTO news (title, content, author_id, category_id, image, publish_date) 
VALUES('$title', '$content', '$author_id', '$category_id', '$image', '$dateTime')
                        ";

    $result = mysqli_query($connection, $newsInsertQuery);

    if($result){
        echo "New news inserted";
        echo "<script>window.location = 'list.php'</script>";
    }else{
        print_r(mysqli_error($connection));
        echo "Unable to insert news";
    }
}

// Author
$authorSelectQuery = "SELECT * FROM author";
$authorSelectQueryResult = mysqli_query($connection, $authorSelectQuery);

// Category
$categorySelectQueryResult = mysqli_query($connection, "SELECT * FROM category");
?>

<a href="list.php">Back to News List</a>

<form method="post" action="">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required />
    </div>

    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Author</label>
        <select name="author" class="form-control">
            <option>-- Select Author --</option>

            <?php
            while ($row = mysqli_fetch_assoc($authorSelectQueryResult))
            {
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <option>-- Select Category --</option>
            <?php
            while ($row = mysqli_fetch_assoc($categorySelectQueryResult))
            {
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="save" value="Save" />
    </div>
</form>