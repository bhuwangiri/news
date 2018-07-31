<?php
include('../../database.php');

$id = $_GET['id'];

if(isset($_POST['save'])){
    $name = $_POST['name'];

    $categoryInsertQuery = "UPDATE category SET name = '$name' WHERE id = $id";
    $result = mysqli_query($connection, $categoryInsertQuery);

    if($result){
        echo "Category update";
        echo "<script>window.location = 'list.php'</script>";
    }else{
        print_r(mysqli_error($connection));
        echo "Unable to update category";
    }
}

$selectCategoryQuery = "SELECT * FROM category WHERE id = $id";
$result = mysqli_query($connection, $selectCategoryQuery);
$category = mysqli_fetch_row($result);
?>

<a href="list.php">Back to Category List</a>

<form method="post" action="">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $category[1]?>" class="form-control" required />
    </div>

    <div class="form-group">
        <input type="submit" name="save" value="Save" />
    </div>
</form>