<?php
include('../../database.php');

$id = $_GET['id'];

$categoryDeleteQuery = "DELETE FROM category WHERE id = $id";
$result = mysqli_query($connection, $categoryDeleteQuery);

if($result){
    echo "Category deleted";
    echo "<script>window.location = 'list.php'</script>";
}else{
    print_r(mysqli_error($connection));
    echo "Unable to delete category";
}

?>