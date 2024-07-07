<?php
include 'takephp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find A Doctor</title>
    <style>
        body{
            background: linear-gradient(to right,#16c2d5,#89dee2);
        }
         #inner{
            background: linear-gradient(to right,#16c2d5,#89dee2);
            display: inline-block;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-top: 10px;
        } 
        div{
                padding-left:550px;
                padding-top: 75px;
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
                height: 30px;
                width: 80px;
                background: linear-gradient(to right,#16c2d5,#89dee2);
            }
    </style>
</head>
<body>
    <div id="outer">
        <div id="innerdiv">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"><div id="inner"> 
        <h1>Take An Health Insurance</h1></div><br><br>
        First name:
        <input type="text" name="fname" required><br><br>
        Last name:
        <input type="text" name="lname"required><br><br>
        Date of birth
        <input type="date" name="dob"required><br><br>
        Gender
        <input type="text" name="gender" required><br><br>
        City
        <input type="text" name="city" required><br><br>
        Phone-number
        <input type="tel" name="phone" required><br><br>
        Type of Plan
        <select name="type" required><br><br>
            <option>Individual</option>
            <option>Family</option>
        </select><br><br>
        <input type="submit" value="TAKE" name="register" id="button">
        </form>
        </div></div>
    </body>
</html>

<?php
if(isset($_POST['register']))
{
    $firstname      = $_POST['fname'];
    $lastname       = $_POST['lname'];
    $date_of_birth  = $_POST['dob'];
    $gender         = $_POST['gender'];
    $city          = $_POST['city'];
    $ph_number     = $_POST['phone'];
    $plan_type     = $_POST['type'];

    $firstname      = mysqli_real_escape_string($conn, $firstname);
    $lastname       = mysqli_real_escape_string($conn, $lastname);
    $date_of_birth  = mysqli_real_escape_string($conn, $date_of_birth);
    $gender         = mysqli_real_escape_string($conn, $gender);
    $city          = mysqli_real_escape_string($conn, $city);
    $ph_number     = mysqli_real_escape_string($conn, $ph_number);
    $plan_type     = mysqli_real_escape_string($conn, $plan_type);

    $query="INSERT INTO health (fname, lname, dob, gender, city, phone, type_plan) VALUES ('$firstname','$lastname','$date_of_birth','$gender','$city','$ph_number','$plan_type')";
    $data=mysqli_query($conn,$query);
    if($data)
    {
    
        header("location:insurance.php");
        exit; 
    }
    else
    {
         echo '<script>alert("Oops!! Something wrong.")</script>';
    }
}
?>