<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM student WHERE s_username = '$myusername' and s_password = '$mypassword'";
      $sql1 = "SELECT * FROM faculty WHERE f_username = '$myusername' and f_password = '$mypassword'";

      $result = mysqli_query($db,$sql);
      $result2 = mysqli_query($db,$sql1);      
      $count = mysqli_num_rows($result);
      $count2 = mysqli_num_rows($result2);
      
        
      if($count == 1) {
         session_start();
         $_SESSION["loggedin"] = true;
         $_SESSION["Email"] = $username;                                                  
         header("location: studentp.php");
      }else if ($count2==1) {
         session_start();
         $_SESSION["loggedin"] = true;
         $_SESSION["Email"] = $username;                                                  
         header("location: dashboard.php");
      } {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="textanim.css">
    <style type="text/css">
     .ml11 {
  font-weight: 700;
  font-size: 2.8em;
  margin-top: 35%;  
  text-align: center;
}

.ml11 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em;
}

.ml11 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 100%;
  width: 3px;
  background-color: #fff;
  transform-origin: 0 50%;
}

.ml11 .line1 { 
  top: 0; 
  left: 0;
}

.ml11 .letter {
  display: inline-block;
  line-height: 1em;
  color: #D0FF8A;
  font-family: verdana;
}

#text{
    height: 25vh;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#text path:nth-child(1){
    stroke-dasharray: 1047px;
    stroke-dashoffset: 1047px;
    animation: line-animation ease forwards 1.2s, box-shadow 0.5s ease forwards 4.6s;
}

#text path:nth-child(2){
    stroke-dasharray: 1084px;
    stroke-dashoffset: 1084px;
    animation: line-animation ease forwards 1.5s 0.7s, box-shadow 0.5s ease forwards 4.6s;
}

#text path:nth-child(3){
    stroke-dasharray: 1046px;
    stroke-dashoffset: 1046px;
    animation: line-animation ease forwards 1.5s 1.7s, box-shadow 0.5s ease forwards 4.6s;
}

#text path:nth-child(4){
    stroke-dasharray: 790px;
    stroke-dashoffset: 790px;
    animation: line-animation ease forwards 1.5s 2.7s, box-shadow 0.7s ease forwards 4.6s;
}

@keyframes line-animation{
    from {
        stroke-dasharray: 500px;
        stroke-dashoffset: 100%;
    }
    to{
        stroke-dashoffset: 0;
    }
}

@keyframes box-shadow{
    to
    {
        fill: white;
        stroke: none;
    }
}
.st0{display:none;}
.st1{display:inline;fill:#001745;}
.st2{display:inline;}
.st3{fill:none;stroke:#FFFFFF;stroke-width:5;stroke-miterlimit:10;}


      .logo{
        width: 50%;
        height: 15%;
        margin-left: 25%;
      }
    </style>
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form" action="" method="post" style="background-color: #fff">
                     <img src="images/logo.jpg" class="logo">
                  
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: xyz@charusat.edu.in">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            
                        </div>




                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                

                    
                </form>

                <div class="login100-more" style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(images/1.jpeg);">
                <!--<h1 class="ml11">
                  <span class="text-wrapper">
                      <span class="line line1"></span>
                      <span class="letters line1">Project Management System</span>
                  </span>
                </h1>-->
               <div class="loader">
  <h1>Project Management System</h1>
</div>
  

                </div>
            </div>
        </div>
    </div>
    
    <!---->

    
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script type="text/javascript">
    </script>

</body>
</html>
