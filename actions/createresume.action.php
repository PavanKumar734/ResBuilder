<?php
// session_start();
require '../Asset/class/database.class.php';
require '../Asset/class/function.class.php';
if($_POST)
{
$post=$_POST;

// echo "<pre>";
// print_r($post);




if($post['full_name'] && $post['email_id'] && $post['objective'] && $post['mobile_no'] && $post['dob'] && $post['religion'] && $post['nationality'] && $post['marital_status'] && $post['hobbies'] && $post['languages'] && $post['address'])
{

    $columns='';
    $values='';
   foreach($post as $index=>$value){
     $value=$db->real_escape_string($value);
    $columns.=$index.',';
    $values.="'$value',";
   }
   
   $authid=$fn->Auth()['id'];

$columns.='slug,updated_at,user_id';
$values.="'".$fn->randomstring()."',".time().",".$authid;


try{
    $query="INSERT INTO resumes";
    $query.="($columns) ";
    $query.="VALUES($values)";


    $db->query($query);

    $fn->setAlert('Resume Added!');
    $fn->redirect('../myresumes.php');
    
}
catch(Exception $error){
    $fn->setError($error->getMessage());
    $fn->redirect('../register.php');
}

   
}
else{
    $fn->setError('Please fill the form');
    $fn->redirect('../createresume.php');
}
}
else{
    $fn->redirect('../createresume.php');
}
?>