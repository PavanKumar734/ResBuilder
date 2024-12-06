<?php

require '../Asset/class/database.class.php';
require '../Asset/class/function.class.php';
if($_POST)
{
$post=$_POST;

if($post['email_id'] && $post['password'])
{
    $email_id=$db->real_escape_string($post['email_id']);
    $password=md5($db->real_escape_string($post['password'])); //md5->encrypted form
    $result=$db->query("SELECT id,full_name  FROM users where (email_id='$email_id' && password='$password')");

    $result = $result->fetch_assoc();
   if($result){      
       $fn->setAuth($result);
       $fn->setAlert('Logged in!');
       $fn->redirect('../myresumes.php');

   }
   else{
    $fn->setError('Incorrect email id or password');
    $fn->redirect('../login.php');
   }
    


   
}
else{
    $fn->setError('Please fill the form');
    $fn->redirect('../login.php');
}
}
else{
    $fn->redirect('../login.php');
}
?>