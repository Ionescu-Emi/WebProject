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
 else if(isset($_POST["download_all_users"])){
    require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

    $sql="SELECT usersId,usersName,usersEmail FROM users;";
    if(!$result=mysqli_query($conn,$sql)){
        exit(mysqli_error($conn));
    }
    $users=array();
    if(mysqli_num_rows($result)>0){
    
        while($row=mysqli_fetch_assoc($result)){
            $users[]=$row;
        }
    }
    header('Content-Type:text/csv;charset=utf-8');
    header('Content-Disposition:attachment; filename=Users.csv','w');
    $output=fopen('php://output','w');
    fputcsv($output,array('Id','Name','Email'));
    
    if(count($users)>0){
        foreach($users as $row){
            fputcsv($output,$row);
        }
    }
    
    

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
 else if(isset($_POST["download_all_visits"])){
    require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

    $sql="SELECT * FROM visits;";
    if(!$result=mysqli_query($conn,$sql)){
        exit(mysqli_error($conn));
    }
    $visits=array();
    if(mysqli_num_rows($result)>0){
    
        while($row=mysqli_fetch_assoc($result)){
            $visits[]=$row;
        }
    }
    header('Content-Type:text/csv;charset=utf-8');
    header('Content-Disposition:attachment; filename=Visits.csv','w');
    $output=fopen('php://output','w');
    fputcsv($output,array('name_visitor','detained_name','relationship','nature','duration','meeting_date','possible_objects','witness_list','visitId'));
    
    if(count($visits)>0){
        foreach($visits as $row){
            fputcsv($output,$row);
        }
    }
    
    

 }else if(isset($_POST["detained_data_submit"])){
    require_once 'dbh.sub.php';
    require_once 'functions.sub.php';
 $detained_name=$_POST["detained_name"];
 if(empty($detained_name)){
    header("location:../admin_page.php?error6=emptyinput");
    exit();

}
if(detainedExists($conn,$detained_name) ==false){
    header("location:../admin_page.php?error6=detainedNotExist");
    exit();

}
     $sql="SELECT * FROM visits WHERE detained_name='".$detained_name."';";
     if(!$result=mysqli_query($conn,$sql)){
         exit(mysqli_error($conn));
     }
     $detained=array();
     if(mysqli_num_rows($result)>0){
     
         while($row=mysqli_fetch_assoc($result)){
             $detained[]=$row;
         }
     }
     header('Content-Type:text/csv;charset=utf-8');
     header('Content-Disposition:attachment; filename=Detained_visits.csv','w');
     $output=fopen('php://output','w');
     fputcsv($output,array('name_visitor','detained_name','relationship','nature','duration','meeting_date','possible_objects','witness_list','visitId'));
     
     if(count($detained)>0){
         foreach($detained as $row){
             fputcsv($output,$row);
         }
     }
     
    

 }else if(isset($_POST["download_all_detained"])){
    require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

    $sql="SELECT * FROM detained;";
    if(!$result=mysqli_query($conn,$sql)){
        exit(mysqli_error($conn));
    }
    $detained=array();
    if(mysqli_num_rows($result)>0){
    
        while($row=mysqli_fetch_assoc($result)){
            $detained[]=$row;
        }
    }
    header('Content-Type:text/csv;charset=utf-8');
    header('Content-Disposition:attachment; filename=Detained.csv','w');
    $output=fopen('php://output','w');
    fputcsv($output,array('detained_name','CNP','imprison-date','release-date','crime','incidents','condemnation','detainedId'));
    
    if(count($detained)>0){
        foreach($detained as $row){
            fputcsv($output,$row);
        }
    }
    
    

 }
 
 else{
     header("location:../admin_page.php");
     exit();
 }

?>