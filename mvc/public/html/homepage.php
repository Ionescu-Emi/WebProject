<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head  >
        <meta charset="utf-8">
        <title>Homepage</title>
        <link rel="stylesheet" href="./css/homepage.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
 #button_quote{
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
.quote2{
    display:block;
    position:relative;
    width:50%;
    margin:5rem auto;
    
    padding:0.5rem;
    font-size:1.5rem;
    font-style:italic;
    line-height:1.5rem;
    font-family:'Times',serif;
    color:#ddd;
}
#author{
    display:block;
    line-height:1.2;
    font-style:normal;
   font-size:0.8em;
    color:#28292c;
    
}

        </style>
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
                    <a href="schollarly.php">
                        <h5>USER GUIDE(schollarly html)</h5>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="homepage_section">
            <h1>HOMEPAGE</h1>
            
            <div class="border_line"></div>
            <div class="quote_section">
                <div class="quote">
                    <p>
                        One of the many lessons that one learns in prison is, that things are what they are and will be what they will be.
                    </p>
                    <span>
                        Oscar Wilde
                    </span>
                </div>
                <div class="quote">
                    <p>
                        Money will determine whether the accused goes to prison or walks out of the courtroom a free man.
                    </p>
                    <span>
                        Johnnie Cochran
                    </span>
                </div>
                <div class="quote">
                    <p>
                        Today is the day to break free from the prison of the person you know yourself to be and step into a self you have yet to know. Will it be comfortable? No, but do it anyway.
                    </p>
                    <span>
                        Debbie Ford
                    </span>
                </div>

                
                <div class="quote2">
                 <div id="quote">
                Don't forget: life is a race, if you don't run fast, you'll get trampled
                 </div>
            <div id="author">
                Author
            </div>
                <button class="contact_btn" id="button_quote">Random quote</button>

                <script src="script3.js"></script>

            </div>

           

            </div>
             
          
            <div class="gallery_container">
                <div class="gallery_images">
                    <a href="images/img-1.png" class="img-1">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-2.jpg" class="img-2">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-3.jpg" class="img-3">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-4.jpg" class="img-4">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-5.jpg" class="img-5">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-6.jpg" class="img-6">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-7.jpg" class="img-7">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-8.jpg" class="img-8">
                        <i class="icon-expand"></i>
                    </a>
                </div>
            </div>
        

        </div>
            <div class="social_menu">
                <div class="media_button">
                    <a href="https://www.facebook.com/thedark.archer.5/">
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