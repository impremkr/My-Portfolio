<?php

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "contact";

$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("ERROR : Connection Failed!" . mysqli_error($conn));
}

$msg = "";  

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = data_filter($_POST["first_name"]);
    $last_name = data_filter($_POST["last_name"]);
    $email = data_filter($_POST["email"]);
    $contact = data_filter($_POST["contact"]);
    $message = data_filter($_POST["message"]);
    

    if(empty($first_name) || empty($last_name) || empty($email) || empty($contact) || empty($message)){
        $msg = "<p style='color: red; text-align: center; padding-bottom: 20px'>All fields required!</p>";
    }
    else{

        $first_name = mysqli_real_escape_string($conn, $first_name);
        $last_name = mysqli_real_escape_string($conn, $last_name);
        $email = mysqli_real_escape_string($conn, $email);
        $contact = mysqli_real_escape_string($conn, $contact);
        $message = mysqli_real_escape_string($conn, $message);

        $query = "INSERT INTO message(first_name,last_name,email,contact,message)VALUES('$first_name','$last_name','$email','$contact', '$message')";

        $result = mysqli_query($conn, $query);

        if($result){
            $msg = "<p style='color: green; text-align: center; padding-bottom: 20px'>Form submitted successfully!</p>";
            // header("Location: index.php");
            // exit();
        }
        else{
            die("ERROR : Query failed" . mysqli_error($conn));
        }

    }

}

function data_filter($data){
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c7c365e54c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#icon').click(function(){
                $('ul').toggleClass('show');
                
            $('#icon').click(function(){
                $('ul').removeClass('current');
            });
               
            });
            
        });
        
    </script>

    
<script>

let list = document.querySelector(".list");
window.addEventListener('wheel', function(){
    if(window.pageYOffSet > 100){
        document.querySelector('#icon').classList.remove('show');
        document.body.style.backgroundColor = "white";
    }
    else{
        document.querySelector('#icon').classList.remove('show');
        document.body.style.backgroundColor = "yellow";
    }
});

</script>
    <link rel="icon" href="Images/logo.png"/>
    <link rel="stylesheet" href="portfolio.css">
    <link rel="stylesheet" href="resportfolio.css">
    <title> My Portfolio </title>
</head>
<body>
    
    <div class="header">
        <div class="nav">
            <div class="logo">
                <h2> Portfolio </h2>
            </div>

            <div class="list" id="list1">
                <ul>
                    <a href="index.php"> <li class="home_page"> <i class="drawer-icon fa-solid fa-house"></i> Home </li> </a>
                    <a href="about.html"> <li class="about_page"> <i class="drawer-icon fa-solid fa-user"></i> About </li> </a>
                    <a href="skill.html"> <li class="skill_page"> <i class="drawer-icon fa-solid fa-graduation-cap"></i> Skills </li> </a>
                    <a href="service.html"> <li class="service_page"> <i class="drawer-icon fa-brands fa-servicestack"></i> Services </li> </a>
                    <a href="contact.php"> <li class="contact_page"> <i class="drawer-icon fa-solid fa-phone-volume"></i> Contact </li> </a>
                </ul>
            </div>
            <label for="" id="icon">
                <i class="fas fa-bars"></i>
            </label>
        </div>
    </div>


    <!-- Home Page  -->
    <div class="home">
        <div class="h-content">
            <div class="h-content-left">
                <h3> <span class="namste"> Hii, I'm &nbsp; </span> <span class="name"> Prem Kumar </span> </h3>
                <h1 class="profession"> Web Developer </h1>

                <p class="paragraph"> I love Web design and Photography and have been working on my portfolio since 2023. I Can give your business a new Creative start right away!
                </p>

                <div class="social-media">
                    <a href="#"><i class="icon facebook fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="icon whatsapp fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="icon twitter fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="icon instagram fa-brands fa-instagram"></i></a>
                </div>

            </div>

            <div class="h-content-right">
                <img src="Images/pic2.jpg" alt="" width="100%" height="400px">
            </div>
             </div>
    </div>


    <!-- About Page  -->
    <div class="about">
        <div class="abt-content">
            <div class="abt-content-left">
                <img src="Images/pic2.jpg" alt="" width="100%" height="400px">
            </div>

            <div class="abt-content-right">
                <h1 class="abt-heading"> My <span class="me"> Biograpgy </span> </h1>
                <p class="details"> I love Graphic design and Photography and have been working on my portfolio since 2016. I Can give your business a new Creative start right away! Contact me and we will discuss your projects!
                </p>

                <div class="contact">
                    <h5 class="con-details"> 
                        <i class="fa-solid fa-phone"></i> 9799460177 <br>
                        <i class="fa-regular fa-envelope"></i> portfolio.info@gmail.com
                    </h5>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Skill Page -->

    <div class="skill">
        <div class="skill-content">
            <div class="skill-content-left">
                <img src="Images/skillimg1.jpeg" alt="" width="80%" height="400px">
            </div>

            <div class="skill-content-right">
                <h1 class="skill-heading"> My <span class="me"> Skill </span> </h1>
                <p class="skill-details"> I Specialize in Branding and Strategy, and am passionate about creating Awesome Portfolio work. And I  always ready to impress the audience with my Creativity.
                </p>

                
                <div class="skill-content-right-lower">
                    <div id="html">
                        <span class="skill-name"> HTML </span>
                        <span class="skill-percentage"> 100% </span>
                    </div>
                </div>
                <div class="skill-content-right-lower">
                    <div id="css">
                        <span class="skill-name"> CSS </span>
                        <span class="skill-percentage"> 90% </span>
                    </div>
                </div>
                <div class="skill-content-right-lower">
                    <div id="js">
                        <span class="skill-name"> JavaScript </span>
                        <span class="skill-percentage"> 60% </span>
                    </div>
                </div>
                <div class="skill-content-right-lower">
                    <div id="bs">
                        <span class="skill-name"> BootStrap </span>
                        <span class="skill-percentage"> 80% </span>
                    </div>
                </div>
                <div class="skill-content-right-lower">
                    <div id="php">
                        <span class="skill-name"> PHP </span>
                        <span class="skill-percentage"> 50% </span>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Sevices Page  -->

    <div class="service">
        <div class="ser-content">
            <div class="ser-heading">
                <h1> Our Services </h1>
            </div>

            <div class="ser-items">
                <div class="ser-details">
                    <i class="fa-solid fa-code"></i>
                    <h3> Web Development </h3>
                    <p class="ser-paragraph"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore  magna aliqua. Ut enim. </p>
                </div>
            
                <div class="ser-details">
                    <i class="fa fa-wordpress"></i>
                    <h3> WordPress Development </h3>
                    <p class="ser-paragraph"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim. </p>
                </div>
            
                <div class="ser-details">
                    <i class="fa-solid fa-chart-simple"></i>
                    <h3> SEO Development </h3>
                    <p class="ser-paragraph"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim. </p>
                </div>
            </div>
        </div>
    </div>



    <!-- Message Page -->

    <div class="message">
        <div class="mess-content">
            <div class="mess-heading">
                <h1> Leave <span class="msg"> Message </span></h1>
            </div>

            <div class="form">
            <p style="color: red; text-align:center"> <?php echo "$msg"; ?></p>
                <form action="" method="POST">
                    <div class="msg">
                        <label for="first_name"> </label>
                        <input type="text" name="first_name" placeholder="First Name..">
                    </div>
    
                    <div class="msg">
                        <label for="last_name"> </label>
                        <input type="text1" name="last_name" placeholder="Last Name...">
                    </div>
    
                    <div class="msg">
                        <label for="email"> </label>
                        <input type="mail" name="email" placeholder="E-Mail...">
                    </div>
    
                    <div class="msg">
                        <label for="contact"> </label>
                        <input type="contact" name="contact" placeholder="Contact...">
                    </div>
    
                    <div class="msg">
                        <textarea name="message" id=""  placeholder="Write Message..."></textarea>
                    </div>
    
                    <input type="submit" value="SEND">
              
                </form>
            </div>
        </div>
    </div>


    <!-- <div class="thank-u">
        <h1> Thank You For Wisiting My Web Site </h1>
    </div> -->

    <div class="footer">
        <div class="footer-1">

            <div class="copyright">
                <h5> &copy; 2023 My Portfolio. All Rights Deserved | Design By Prem Kumar </h5>
            </div>

            <div class="follow-me">
                <a href="#"><i class="social-icon fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="social-icon fa-brands fa-whatsapp"></i></a>
                <a href="#"><i class="social-icon fa-brands fa-twitter"></i></a>
                <a href="#"><i class="social-icon fa-brands fa-instagram"></i></a>
            </div>

        </div>
    </div>



</body>
</html>