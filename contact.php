<?php

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "contact";

$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("ERROR : Connection Failed!" . mysqli_error($con));
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
    <link rel="stylesheet" href="resportfolio.css">
    <link rel="icon" href="Images/logo.png"/>
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
    <title>Document</title>

    <style>
        /* Color Code: #274f8791 */

*{
    margin: 0;
    padding: 0;
}

body{
    background-color: white;
}

.header{
    width: 100%;
    height: auto;
    background-color: #008080;
    /* position: fixed; */
    /* z-index: 3; */
}

.nav{
    width: 90%;
    height: 90px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
}

.logo{
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

.list li{
    display: inline;
    list-style: none;
}

.list a{
    text-decoration: none;
    color: white;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
    font: bold;
    margin-right: 40px;
    cursor: pointer;
}

.list a:hover{
    color: aqua;
}

.drawer-icon{
    display: none;
}

#icon{
    color: white;
    font-size: 22px;
    float: right;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 5;
}

/* Message Page  */

.message{
    width: 100%;
    height: auto;
    background-color: black;
    margin-top: 2px;
    padding-top: 30px;
}

.mess-content{
    width: 80%;
    height: 680px;
    text-align: center;
    margin: 0 auto;
}

.mess-heading{
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

.form{
    width: 85%;
    margin: auto;
    padding-top: 40px;
}

input[type="text"]{
    width: 42%;
    height: 50px;
    float: left;
    background-color: rgb(224, 220, 220);
    border: 1px solid gray;
    border-radius: 5px;
    padding-left: 25px;
    font-family: system-ui;
    font-size: 18px;
    letter-spacing: 2px;
}

input[type="text1"]{
    width: 42%;
    height: 50px;
    float: right;
    background-color: rgb(224, 220, 220);
    border: 1px solid gray;
    border-radius: 5px;
    padding-left: 25px;
    font-family: system-ui;
    font-size: 18px;
    letter-spacing: 2px;
}

input[type="mail"]{
    width: 42%;
    height: 50px;
    float: left;
    background-color: rgb(224, 220, 220);
    border: 1px solid gray;
    border-radius: 5px;
    font-family: system-ui;
    font-size: 18px;
    letter-spacing: 2px;
    margin-top: 30px;
    padding-left: 25px;
}

input[type="contact"]{
    width: 42%;
    height: 50px;
    float: right;
    background-color: rgb(224, 220, 220);
    border: 1px solid gray;
    border-radius: 5px;
    font-family: system-ui;
    font-size: 18px;
    letter-spacing: 2px;
    margin-top: 30px;
    padding-left: 25px;
}

textarea{
    width: 90%;
    height: 250px;
    background-color: rgb(224, 220, 220);
    border: 1px solid gray;
    border-radius: 5px;
    font-family: system-ui;
    font-size: 18px;
    letter-spacing: 2px;
    margin-top: 30px;
    padding: 20px 25px;
}

input[type="submit"]{
    width: 20%;
    height: 50px;
    color: aliceblue;
    border: 1px solid #008080;
    border-radius: 5px;
    font-family: system-ui;
    font-size: 18px;
    font: bold;
    letter-spacing: 2px;
    margin-top: 30px;
    padding: 10px 12px;
    background-color: #008080;
    box-shadow: 0 0 10px #008080;
    cursor: pointer;
}

input[type="submit"]:hover{
    background-color: black;
    box-shadow: 0 0 10px #008080;
}

    /* CopyRight Box */

    .footer{
    width: 100%;
    height: auto;
    margin-top: 1px;
    background-color: black;
}

.footer-1{
    width: 80%;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.copyright{
    width: 80%;
    color: aqua;
    font-size: 20px;
    font-family: serif;
    letter-spacing: 1px;
}

.follow-me{
    width: 18%;
}

.social-icon{
    color: white;
    width: 25px;
    text-align: center;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
}

.social-icon:hover{
    color: blue;
}

@media only screen and (max-width: 1200px) and (min-width: 1025px){

/* Responsive Query */

 /* Message Page */

 .message{
        margin-top: 1px;
    }

    .mess-content{
        width: 85%;
        height: 625px;
        margin: 0 auto;
    }

    .form{
        width: 80%;
    }

    input[type="text"]{
        /* width: 42%; */
        height: 40px;
    }

    input[type="text1"]{
        /* width: 42%; */
        height: 40px;
    }

    input[type="mail"]{
        height: 40px;
    }

    input[type="contact"]{
        height: 40px;
    }

    textarea{
        width: 90%;
        height: 200px;
    }

    
     /* Copyright Page */

     .footer-1{
        width: 90%;
        margin: auto;
    }

    .copyright{
        width: 70%;
        font-size: 20px;
    }

    .follow-me{
        width: 20%;
        
    }

    .social-icon{
        width: 20px;
        font-size: 20px;
    }

}


@media only screen and (max-width: 1024px) and (min-width: 769px){

.nav{
    width: 90%;
    height: 75px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
}

.logo{
    font-size: 15px;
}

.list a{
    font-size: 17px;
    margin-right: 20px;
}

/* Message Page  */

.message{
        margin-top: 1px;
    }

    .mess-content{
        width: 85%;
        height: 620px;
        margin: 0 auto;
    }

    .form{
        width: 90%;
    }

    input[type="text"]{
        height: 40px;
    }

    input[type="text1"]{
        height: 40px;
    }

    input[type="mail"]{
        height: 40px;
    }

    input[type="contact"]{
        height: 40px;
    }

    textarea{
        width: 90%;
        height: 200px;
    }


    /* Copyright Page  */

    .footer-1{
        width: 90%;
        margin: auto;
    }

    .copyright{
        width: 80%;
        font-size: 20px;
    }

    .follow-me{
        width: 20%;
    }

    .social-icon{
        width: 20px;
        font-size: 20px;
    }

}


/* Tablet Media Query */

@media only screen and (max-width: 768px) and (min-width: 600px){

.nav{
    width: 90%;
    height: 75px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
}

.logo{
    font-size: 15px;
}

.list a{
    font-size: 17px;
    margin-right: 20px;
}
/* Message Page  */

.message{
        margin-top: 1px;
    }

    .mess-content{
        width: 90%;
        height: 625px;
        margin: 0 auto;
    }

    .form{
        width: 90%;
    }

    input[type="text"]{
        height: 40px;
    }

    input[type="text1"]{
        height: 40px;
    }

    input[type="mail"]{
        height: 40px;
    }

    input[type="contact"]{
        height: 40px;
    }

    textarea{
        width: 90%;
        height: 200px;
    }


    /* Copyright Page  */

    .footer-1{
        width: 90%;
        margin: auto;
    }

    .copyright{
        width: 70%;
        font-size: 18px;
    }

    .follow-me{
        width: 26%;
    }

    .social-icon{
        width: 20px;
        font-size: 17px;
    }

}



@media only screen and (max-width: 500px) and (min-width: 300px){

.header{
    width: 100%;
    height: auto;
}

.nav{
    width: 85%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
}

.logo{
    font-size: 11px;
}

.drawer-icon{
    display: inline-block;
    padding-right: 7px;
}

#icon{
    display: block;
}

ul{
    position: fixed;
    width: 50%;
    height: 100vh;
    background: #2f3640;
    top: 60px;
    left: -100%;
    text-align: left;
    transition: all .5s;
}

.list a{
    height: 30px;
    display: block;
    font-size: 15px;
    padding-top: 15px;
    margin-right: 0;
    padding-left: 15px;
    
}

.list a:hover{
    color: #008080;
    background-color: rgba(128, 128, 128, 0.082);
    border-bottom: 1px solid rgba(255, 255, 255, 0.279);
}

ul.show{
    left: 0;
}

 /* Message Page */

 .message{
        margin-top: 0;
    }

    .mess-content{
        width: 100%;
        height: 675px;
    }

    .form{
        width: 90%;
        margin: auto;
    }

    input[type="text"]{
        width: 90%;
        height: 40px;
        float: none;
    }

    input[type="text1"]{
        width: 90%;
        height: 40px;
        float: none;
        margin-top: 7px;
    }

    input[type="mail"]{
        width: 90%;
        height: 40px;
        float: none;
        margin-top: 7px;
    }

    input[type="contact"]{
        width: 90%;
        height: 40px;
        float: none;
        margin-top: 7px;
    }

    textarea{
        width: 80%;
        height: 175px;
        margin-top: 15px;
    }

    input[type="submit"]{
        width: 40%;
        height: 40px;
        font-size: 16px;
        align-items: center;
        margin-top: 15px;
        padding: 0;
    }


    /* CopyRight Box  */

    .footer{
        width: 100%;
        margin-top: 1px;
    }

    .footer-1{
        width: 90%;
        /* background-color: red; */
        height: 80px;
        margin: 0 auto;
        display: block;
        padding-top: 10px;
    }
    
    .copyright{
        width: 100%;
        font-size: 16px;
        text-align: center;
        
    }

    .follow-me{
        width: 100%;
        text-align: center;
        margin-top: 10px;
        letter-spacing: 25px;
    }
    
    .social-icon{
        width: 20px;
        font-size: 16px;
        padding: 3px;
    }


}

    </style>
</head>
<body>

    <div class="header">
        <div class="nav">
            <div class="logo">
                <h2> Portfolio </h2>
            </div>

            <div class="list">
                <ul>
                    <a href="index.php"> <li class="home_page"> <i class="drawer-icon fa-solid fa-house"></i> Home </li> </a>
                    <a href="about.html"> <li class="about_page"> <i class="drawer-icon fa-solid fa-user"></i> About </li> </a>
                    <a href="skill.html"> <li class="skill_page"> <i class="drawer-icon fa-solid fa-graduation-cap"></i> Skills </li> </a>
                    <a href="service.html"> <li class="service_page"> <i class="drawer-icon fa-brands fa-servicestack"></i> Services </li> </a>
                    <a href="contact.html"> <li class="contact_page"> <i class="drawer-icon fa-solid fa-phone-volume"></i> Contact </li> </a>
                </ul>
            </div>
            <label for="" id="icon">
                <i class="fas fa-bars"></i>
            </label>
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
