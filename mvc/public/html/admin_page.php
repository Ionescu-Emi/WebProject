<?php
session_start();

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

       <label >delete user:</label>
            <input type="text" name="nameDelete" class="register_form_text" placeholder="name of user you want to delete" />
             
            
            <button type="submit" name="submit_delete" class="register_btn"> Delete </button>

            <?php
   
   if(isset($_GET["error"])){
       if($_GET["error"]=="emptyinput"){
           echo "<h3>Empty field!</h3>";
       }
       else if($_GET["error"]=="userNotExist")
       {
        echo "<h3>User doesnt exist!</h3>";
       } 
       else if($_GET["error"]=="statementFailed")
       {
        echo "<h3>User deleted!</h3>";
       }
       else if($_GET["error"]=="deleteAdmin")
       {
        echo "<h3>You cant delete yourself!</h3>";
       }
     
       else if($_GET["error"]=="none")
       {
        echo "<h3>User deleted</h3>";
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