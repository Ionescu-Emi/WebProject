<?php

if(isset($_POST["submit"])){
   // echo 'ok';

   $name=$_POST["name"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $password_repeat=$_POST["password_repeat"];

$file=$_FILES['file'];
$fileName=$_FILES['file']['name'];
$fileTmpName=$_FILES['file']['tmp_name'];
$fileSize=$_FILES['file']['size'];
$fileError=$_FILES['file']['error'];
$fileType=$_FILES['file']['type'];

$fileExt=explode('.',$fileName);

$fileActualExt=strtolower(end($fileExt));

$allowed=array('jpg','jpeg','png');


require_once 'dbh.sub.php';
require_once 'functions.sub.php';

 if(emptyInputRegister($name,$email,$password,$password_repeat) !==false){
       header("location:../register.php?error=emptyinput");
       exit();

   }
   
  /* if(invalidName($name) !==false){
    header("location:../register.php?error=invalidName");
    exit();

}
*/
if(invalidEmail($email) !==false){
    header("location:../register.php?error=invalidEmail");
    exit();

}
if(passwordMatch($password,$password_repeat) !==false){
    header("location:../register.php?error=passwordNotMatch");
    exit();

}
if(nameExists($conn,$name) !==false){
    header("location:../register.php?error=nameTaken");
    exit();

}
if(empty($fileName))
   {
    header("location:../register.php?error=emptyphoto");
    exit();
   }
if(in_array($fileActualExt,$allowed)){

if($fileError===0){
    if(nameExists($conn,$name)==false){
$fileNameNew=$name.".".$fileActualExt;
$fileDestination='uploads/'.$fileNameNew;

move_uploaded_file($fileTmpName,$fileDestination);
}else{
    header("location:../register.php?error=nameTaken");
    exit();
}
}else{
    header("location:../register.php?error=errorUploading");
    exit();
}


}
else{
    header("location:../register.php?error=fileTypeNotAllowed");
    exit();
}
   

  

createUser($conn,$name,$email,$password);


}
else{
    header("location:../register.php");
    exit();
}