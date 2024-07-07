<?php
include 'confirmation1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find A Doctor</title>
    <style>
        body{
            background: linear-gradient(to right ,#16c2d5,#89dee2);
        }
         #inner{
            background: linear-gradient(to right ,#16c2d5,#89dee2);
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
                background: linear-gradient(to right ,#16c2d5,#89dee2);
            }
                #php p{
              color:#666;
            }
            .no-record-found{
              color:#666;
              padding-left:650px;
              padding-top:5px;
              font-size:large;
            }
            #php{
              background-color:#f7f7f7;
              padding-left:20px;
              padding-bottom:20px;
              padding-top:25px;
            }
            b{
              color:#337ab7; 
            }
    </style>
</head>
<body>
    <div id="outer">
        <div id="innerdiv">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"><div id="inner"><h1>Find A Doctor</h1></div><br><br>
        Disease:<br>
        <select name="disease">
  <option value="Other">Other</option>
  <option value="Heart Failure">Heart Failure</option>
  <option value="Coronary Artery Disease">Coronary Artery Disease</option>
  <option value="Asthma">Asthma</option>
  <option value="Pneumonia">Pneumonia</option>
  <option value="Kidney Stones">Kidney Stones</option>
  <option value="Kidney Disease">Kidney Disease</option>
  <option value="Diabetes">Diabetes</option>
  <option value="Ulcers">Ulcers</option>
  <option value="Skin Cancer">Skin Cancer</option>
  <option value="Osteoporosis">Osteoporosis</option>
  <option value="Cataracts">Cataracts</option>
  <option value="Hearing Loss">Hearing Loss</option>
</select><br><br>
Location (City):<br>
<select name="location" required>
  <option value="Agra">Agra</option>
  <option value="Aligarh">Aligarh</option>
  <option value="Allahabad">Allahabad</option>
  <option value="Amroha">Amroha</option>
  <option value="Ayodhya">Ayodhya</option>
  <option value="Bareilly">Bareilly</option>
  <option value="Bulandshahr">Bulandshahr</option>
  <option value="Faizabad">Faizabad</option>
  <option value="Ghaziabad">Ghaziabad</option>
  <option value="Gorakhpur">Gorakhpur</option>
  <option value="Jhansi">Jhansi</option>
  <option value="Kanpur">Kanpur</option>
  <option value="Lucknow">Lucknow</option>
  <option value="Mathura">Mathura</option>
  <option value="Meerut">Meerut</option>
  <option value="Moradabad">Moradabad</option>
  <option value="Muzaffarnagar">Muzaffarnagar</option>
  <option value="Noida">Noida</option>
  <option value="Prayagraj">Prayagraj</option>
  <option value="Saharanpur">Saharanpur</option>
</select><br><br>
Experience Of Doctor:<br>
<select name="experience" >
    <option value="Above 5 years">Above 5 years</option>
    <option value="Less than 5 years">Less than 5 years</option>
    <option value="Above 10 years">Above 10 years</option>
    <option value="Less than 10 years">Less than 10 years</option>
  <option value="Above 15 years">Above 15 years</option>
  <option value="Less than 15 years">Less than 15 years</option>
</select><br><br>
Time Slot:<br>
<select name="time" >
    <option value="AM">AM</option>
    <option value="PM">PM</option>
</select><br><br>
Rating/Reviews (Filter):<br><input type="number" name="rating" min="1" max="5"><br><br> 
<input type="submit" value="FIND" name="register" id="button">
</form>
        </div></div>
        <div id="php">
    <?php
if(isset($_POST['register']))
{
  $disease = $_POST['disease'];
  $city = $_POST['location'];
  $time = $_POST['time'];
  $experience = $_POST['experience'];
  $rating = $_POST['rating'];

  $select = "select * from find_doctor where location = '$city' and disease = '$disease' and time = '$time'";

  $data = mysqli_query($conn,$select);
   
  $result=mysqli_fetch_assoc($data);
  
  $name=$result['doctor_name'];
  $fees=$result['fees'];
  if($name){
    echo '<p>Hello we have found an Doctor for you <br>';
    echo 'Name: <b>'.$name.'</b><br>';
    echo 'Located in: <b>'.$city.'</b><br>';
    echo 'Has experience of: <b>'.$experience.' years</b><br>';
    echo 'Time slot: <b>'.$time.'</b><br>';
    echo 'Consultation fees: <b>'.$fees.'</b>';
  } else {
    echo '<div class="no-record-found">';
    echo '<p>Sorry, no record found.</p>';
    echo '</div>';
  }
}
?>
    </div>
    <a href="operations.html">BACK</a>
</body>
</html>