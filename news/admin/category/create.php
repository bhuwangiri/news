<?php
include('../../database.php');

if(isset($_POST['save'])){
    $name = $_POST['name'];

    $categoryInsertQuery = "INSERT INTO category (name) VALUES('$name')";
    $result = mysqli_query($connection, $categoryInsertQuery);

    if($result){
        echo "New category inserted";
        echo "<script>window.location = 'list.php'</script>";
    }else{
        print_r(mysqli_error($connection));
        echo "Unable to insert category";
    }
}
?>

<a href="list.php">Back to Category List</a>

<form method="post" action="">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required />
    </div>

    <div class="form-group">
        <input type="submit" name="save" value="Save" />
    </div>
</form>