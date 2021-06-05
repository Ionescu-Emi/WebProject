<?php
session_start();
include_once 'submit/dbh.sub.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="./css/contact_style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css">
        <nav class="navPanel">
            <ul class="menu_items">
                <li class="menu_item">
                    <a id="a1" href="homepage.php">
                        <h5>HOMEPAGE</h5>
                    </a>
                </li>
                <li class="menu_item">
                    <a href="new_visit.php">
                        <h5>NEW VISIT</h5>
                    </a>
                </li>
               
                <?php
    
    $adminName="admin";
    if(isset($_SESSION["userName"]))
    {
        echo "<li class='menu_item'><a href='submit/logout.sub.php'> <h5>LOGOUT</h5> </a> </li>";
    
         if($_SESSION["userName"]==$adminName)
    {
       echo "<li class='menu_item'><a href='admin_page.php'> <h5>ADMIN PAGE</h5> </a> </li>";
      
    }
       }
       else
       {
        echo "<li class='menu_item'><a href='register.php'> <h5>REGISTER</h5> </a> </li>";
             
           echo "<li class='menu_item'><a href='login.php'> <h5>LOGIN</h5> </a> </li>";
    

    }
   
   ?>
                <li class="menu_item">
                    <a href="contact.php">
                        <h5>CONTACT US</h5>
                    </a>
                </li>

                <li class="menu_item">
                    <a href="schollarly.html">
                        <h5>USER GUIDE(schollarly html)</h5>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="contact_section">
        <form class="contact_form" action="submit/admin_page.sub.php" method="post">
        <h1 >Details about users:</h1>
            
        
<?php


 // echo "<p>ok</p>";  

$sql="SELECT * FROM users;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){

    while($row=mysqli_fetch_assoc($result)){
        echo  "<h5> ID: ".$row['usersId']." ,    Name: ".$row['usersName']." ,    Email: ".$row['usersEmail']."</h5><br>";
    }
}




?>
 <div>
       <label >delete user:</label>
            
            <input type="text" name="nameDelete" class="register_form_text" placeholder="name of user you want to delete" />
             
            
            <button type="submit" name="submit_delete" class="register_btn"> Delete </button>
</div>
            <?php
   
   if(isset($_GET["error2"])){
       if($_GET["error2"]=="emptyinput"){
           echo "<h3>Empty field!</h3>";
       }
       else if($_GET["error2"]=="userNotExist")
       {
        echo "<h3>User doesnt exist!</h3>";
       } 
       else if($_GET["error2"]=="statementFailed")
       {
        echo "<h3>User deleted!</h3>";
       }
       else if($_GET["error2"]=="deleteAdmin")
       {
        echo "<h3>You cant delete yourself!</h3>";
       }
     
       else if($_GET["error2"]=="none")
       {
        echo "<h3>User deleted</h3>";
       }
   }
   
   ?>
    <h1 >Details about visits:</h1>
   <?php


 // echo "<p>ok</p>";  
$id=0;
$sql="SELECT * FROM visits;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){

    while($row=mysqli_fetch_assoc($result)){
       $id++;
        echo  "<h5> ID: ".$row['visitId']." ,    Name: ".$row['name_visitor']." , detained name: ".$row['detained_name']." , relationship: ".$row['relationship'].
        " , nature: ".$row['nature']." , duration ".$row['duration']." , meeting date: ".$row['meeting_date']." , possible objects: ".$row['possible_objects']." , witness list: ".$row['witness_list']."</h5><br>";
    }
}




?>
  <label >delete visit:</label>
            
            <input type="text" name="DeleteVisitId" class="register_form_text" placeholder="ID of visit you want to delete" />
             
            
            <button type="submit" name="submit_delete_visit" class="register_btn"> Delete </button>
           
           
            <h1 >Details about detained:</h1>
            <?php


// echo "<p>ok</p>";  
$id=0;
$sql="SELECT * FROM detained;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){

   while($row=mysqli_fetch_assoc($result)){
      $id++;
       echo  "<h5> ID: ".$row['detainedId']." , detained name: ".$row['detained_name']." , CNP: ".$row['CNP'].
       " , imprison date: ".$row['imprison_date']." , release date: ".$row['release_date']." , crime: ".$row['crime']." , incidents: ".$row['incidents']." , condemnation: ".$row['condemnation']."</h5><br>";
   }
}




?>

        </form>

        
    </div>
        
            <div class="social_menu">
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image8.png" alt="image8">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image7.png" alt="image7">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image9.png" alt="image9">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image10.png" alt="image10">
                    </a>
                </div>
            </div>
        
    </body>
</html>