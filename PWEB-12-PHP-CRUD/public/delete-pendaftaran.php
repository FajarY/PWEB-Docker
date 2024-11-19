<?php
include('config.php');

$id = htmlspecialchars(trim($_GET['id']));

if(!empty($id))
{
    $sql = "DELETE FROM calon_siswa WHERE id=$id;";
    $query = mysqli_query($db, $sql);

    if($query)
    {
        header('Location: list-siswa.php?delete=succees');
    }
    else
    {
        header("Location: list-siswa.php?delete=fail");
    }        
}
else
{
    header('Location: list-siswa.php?delete=invalid');
}
?>