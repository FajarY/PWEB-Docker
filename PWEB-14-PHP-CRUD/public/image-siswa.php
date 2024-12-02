<?php
include("config.php");

$uri = parse_url($_SERVER['REQUEST_URI']);
if(!isset($uri['query']))
{
    http_response_code(404);
    return;
}

$queries = [];
parse_str($uri['query'], $queries);
if(!isset($queries['id']))
{
    http_response_code(404);
}

$id = $queries['id'];

$sql = "SELECT image, image_type from calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);

if($query)
{
    $data = mysqli_fetch_all($query);
    http_response_code(200);
    header("Content-Type: ".$data[0][1]);
    echo $data[0][0];
}
else
{
    http_response_code(500);
}
?>