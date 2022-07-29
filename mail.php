<?php

if(isset($_POST['email']) && $_POST['email'] != '')
{
    if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

            //get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$subject= $_POST['subject'];
$message= $_POST['message'];

$to = "businesswithlh@gmail.com";
$body = "";

$body ="Name = ".$name."\r\n";
$body ="Email = ".$email."\r\n";
$body ="Message =".$subject."\r\n";


$body = "From: noreply@yoursite.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("location:index.php");
    }
}

/*
$message_sent = true;
}

 
    }
    else{
    $invalid_class_name = "form-invalid";
    }*/



?>