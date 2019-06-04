<?php 

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result_delete = mysqli_query($conn, $query);
    if(!$result_delete){
        die("Query Failed");
    }

    $_SESSION['message'] = "Tarea eliminada correctamente";
    $_SESSION['message_type'] = 'danger';
    header("Location:index.php");

}
?>