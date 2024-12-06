<?php
// session_start();
require '../Asset/class/database.class.php';
require '../Asset/class/function.class.php';
if($_POST)
{
$post=$_POST;

// echo "<pre>";
// print_r($post);




if($post['resume_id'] && $post['font'])
{

   
   


$font=$db->real_escape_string($post['font']);




    $query = "UPDATE resumes SET ";
    $query.="font='$font' ";
    $query.="WHERE id={$post['resume_id']}";

    $db->query($query);


}

}

