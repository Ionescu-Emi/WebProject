<?php

if(isset($_POST["submit_delete"])){
   //echo 'ok';
   $nameDelete=$_POST["nameDelete"];
 

   require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

   if(emptyInputDelete($nameDelete) !==false){
    header("location:../admin_page.php?error=emptyinput");
    exit();

}
if(nameExists($conn,$nameDelete)==false){
    header("location:../admin_page.php?error=userNotExist");
    exit();

}

deleteUser($conn,$nameDelete);

}
else{
    header("location:../admin_page.php");
    exit();
}

?>