<?php
include 'book_copy_connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
            #php{
              background-color:#f7f7f7;
              padding-left:20px;
              padding-bottom:5px;
            }
            b{
              color:#337ab7; 
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
    </style>
</head>
<body>
    <div id="outer">
        <div id="innerdiv">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
      

      <div id="inner"><h1>Book An Elder Care</h1></div><br><br>
      Preferred Gender for Elder Care<br>
  <select name="gender" required>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
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

Payment Of Elder Care:<br>
<select name="payment">
  <option value="5000-10000">5000-10000</option>
  <option value="10000-150000">10000-150000</option>
  <option value="0-5000">0-5000</option>
  <option value="15000-20000">15000-20000</option>
</select><br><br>

Government Verified: 
<input type="radio" name="answer" value="yes">
<label for="yes">Yes</label>
<input type="radio" name="answer" value="no">
<label for="no">No</label><br><br> 

 Specialisation in taking care of:<br>
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
<input type="submit" value="FIND" name="register" id="button" >
</form>
 </div></div>
    <div id="php">
    <?php
if(isset($_POST['register']))
{
  $gender = $_POST['gender'];
  $city = $_POST['location'];
  $payment = $_POST['payment'];
  $gov = $_POST['answer'];
  $specialisation = $_POST['disease'];
  $select = "select * from find_elder_care where city = '$city' and payment = '$payment' and specialisation = '$specialisation' and gender ='$gender' and verified ='$gov'";

  $data = mysqli_query($conn,$select);
   
  $result=mysqli_fetch_assoc($data);
 
  $name1=$result['name'];
  if($name1){

  echo "<p>Hello we have found an elder care person for you
        <br>    Name   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<b>".$name1."</b><br>Gender   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>".$gender."</b><br>Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>".$city."</b><br>Payment &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;: <b>Rs ".$payment."</b><br>specialised in :<b>".$specialisation."</b><br>Government verified :<b>".$gov."</b></p>";
}
else{
  echo '<div class="no-record-found">';
  echo"<p>Sorry, no record found.</p>";
  echo '</div>';
}
}

?>
    </div>
    <a href="operations.html">BACK</a>
</body>
</html>

