<?php

/*if(isset($_POST["submit_details"])){

    
 

    require_once 'dbh.sub.php';
    $html='';
    $sql="SELECT * FROM users;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){
    while($row=mysqli_fetch_assoc($result)){
        $html .= $row['usersId']."  ".$row['usersName']." ".$row['usersEmail']."<br>";
    }
}
return $html;

 
 

}
else 
*/
if(isset($_POST["submit_delete"])){
   //echo 'ok';
   $nameDelete=$_POST["nameDelete"];
 

   require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

   if(emptyInputDelete($nameDelete) !==false){
    header("location:../admin_page.php?error2=emptyinput");
    exit();

}
if(nameExists($conn,$nameDelete)==false){
    header("location:../admin_page.php?error2=userNotExist");
    exit();

}

deleteUser($conn,$nameDelete);

}
 else if(isset($_POST["submit_delete_visit"])){
    //echo 'ok';
    $DeleteVisitId=$_POST["DeleteVisitId"];
  
 
    require_once 'dbh.sub.php';
    require_once 'functions.sub.php';
 
    if(empty($DeleteVisitId)){
     header("location:../admin_page.php?error5=emptyinput");
     exit();
 
 }
 if(visitExists($conn,$DeleteVisitId)==false){
     header("location:../admin_page.php?error5=visitNotExist");
     exit();
 
 }
 
 deleteVisit($conn,$DeleteVisitId);
 
 }
 else{
     header("location:../admin_page.php");
     exit();
 }

?>