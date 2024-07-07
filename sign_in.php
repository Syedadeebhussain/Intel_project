<?php
include 'confirmation.php';
?>
<html>
    <head>
        <title>HealthHive Login</title>
        <style>
            body{
                background: linear-gradient(to right ,#16c2d5,#89dee2);
                background-image: url("https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-health-medical-hospital-medicine-blue-banner-advertisement-image_177364.jpg");
                background-size: cover;
            }
            div{
                padding-left:650px;
                padding-top: 50px;
                border-radius: 5%;
                padding-bottom: 50px;
            }
            #innerdiv{
                background-color: aliceblue;
                padding-left: 50px;
                padding-right: 50px;
                display: inline-block;
            }
            #button{
                height: 40px;
                width: 175px;
                background: linear-gradient(to right ,#16c2d5,#89dee2);
            }
        </style>
    </head>
    <body>

        <h1 align="center">Welcome To HealthHive </h1>
            <div>
                <div id="innerdiv">
                    <form action="" method="POST">
                        <h1>Sign in</h1><br>
                        User-name<br>
                        <input type="text"  id="name" placeholder="enter your name " class="col" name="username" required><br><br>
                        Password<br>
                        <input type="password" id="number" maxlength="10" placeholder="******"  class="col"  name="password" required><br><br>
                        Confirm-Password<br>
                        <input type="password" id="number1" maxlength="10" placeholder="******"  class="col"  name="cpassword" required><br><br>
                        <input type="submit" value="SIGN IN"   name="register" id="button">
                        <br>
                        Have account <a href="index.php">Login in</a>
                    </form>
                </div>

            </div>
    </body>
</html>
<?php
if(isset($_POST['register']))
{
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    if($password == $cpassword){
        $query="INSERT INTO users (username, password, date) VALUES ('$username','$password', current_timestamp())";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo '<script>alert("Congratulation!! you are signed up.Login to start")</script>'; 
        }
        else
        {
             echo '<script>alert("Oops!! Something wrong.")</script>';
        }
    } else {
        echo '<script>alert("Password and Confirm Password do not match")</script>';
    }
}
?>