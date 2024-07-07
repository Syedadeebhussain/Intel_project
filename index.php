<?php
include 'confirmation.php';

?>

<html>
    <head>
        <title>HealthHive Login</title>
        <style>
            body{
                background: linear-gradient(to right,#16c2d5,#89dee2);
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
                background: linear-gradient(to right,#16c2d5,#89dee2);
            }
        </style>
    </head>
    <body>
        <h1 align="center">Welcome To HealthHive </h1>
        <div>
            <div id="innerdiv">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <h1>Login</h1><br>
                    username<br>
                    <input type="text" id="text" placeholder="enter your email " class="col"  name="username" required><br><br>
                    Password<br>
                    <input type="password" id="number" maxlength="10" placeholder="******"  class="col"  name="password" required><br><br>
                    <input type="submit" value="LOG IN"  id="button" name="register">
                    <br>
                    Don't have an account?<a href="sign_in.php">Sign in</a>
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
    
    if(!empty($username) &&!empty($password))
    {
        $query = "Select * from users where username='$username'";
        $data=mysqli_query($conn,$query);
        
        if($data)
        {
            if($data && mysqli_num_rows($data)>0)
            {
                $user_data=mysqli_fetch_assoc($data);
 
                if($user_data['password']==$password)
                {
                    header("location:home.php");
                    exit;
                }
                else{
                    echo '<script>alert("invalid credentials")</script>'; 
                }
            }
        }
        else {
            echo "Error: ". mysqli_error($conn);
        }
    }
    else {
        echo "Please fill in all fields";
    }
}
?>