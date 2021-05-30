<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feedback Form</title>
    <style type="text/css" media="screen">
   
    *{
        background: #717D7E;
    padding: 40px 0;
   
   
    } 
    h1{
    text-align: center;
    color: #ddd;
    margin-bottom: 20px;
    }
    .contact_btn {
    float: center;
    width: 10vw;
    border: 0;
    margin-top: 10px;
    background: #34495e;
    color: #fff;
    padding: 12px 50px;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.5s;
}

.contact_btn:hover{
    background: #2980b9;
    box-shadow: 0 2px 10px 4px #34495e;
}
    </style>
    </head>
    
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['msg'];
//$name=$_POST['name'];

$to="skydubz9@gmail.com";
$subject="Form submission";
//$message="Name:".$name."\n"."Email:".$email."\n"."Wrote the following: "."\n".$msg;
$headers="From:".$email;
if(mail($to,$subject,$msg,$headers)){
echo "<h1>Sent successfull"." ".$name.",we will contact you soon!</h1>";

}else{
    echo "error";
}

}

?>
<button type="submit" name="submit" value="send" class="contact_btn">
    <a href="contact.php">
         BACK
    </a>
</button>
</html>