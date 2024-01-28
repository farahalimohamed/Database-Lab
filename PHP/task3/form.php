<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$select = array();
$nameErr = $emailErr = $genderErr =  $agreeErr = "";
$name = $email = $gender = $course = $gp = $select = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["gp"])) {
    $gp = "";
  } else {
    $gp = test_input($_POST["gp"]);
  }

  if (empty($_POST["course"])) {
    $course = "";
  } else {
    $course = test_input($_POST["course"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["agree"])) {
    $agreeErr = "You must agree to terms";
  } else {
    $agree = test_input($_POST["agree"]);
  }
  if (isset($_POST["select"])) {
    $select = $_POST["select"];
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$title= define('formname', 'ASST_BIS class registration');
?>

<h2>Appplication name: <?php echo formname?></h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Group#: <input type="text" name="gp">
  <br><br>
  Course Details: <textarea name="course" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Select Courses: 
  <select name="select[]" multiple size="4">
      <option value="PHP">PHP</option>
      <option value="Java Script">Java Script</option>
      <option value="MySQL">MySQL</option>
      <option value="HTML">HTML</option>
      <option value="CSS">CSS</option>
  </select>
  <br><br>
  <input type="checkbox" name="agree"> Agree
  <span class="error">* <?php echo $agreeErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your given are as:</h2>";
echo 'Name:'.'<br>'. $name;
echo "<br>";
echo 'Email:'.'<br>'. $email;
echo "<br>";
echo 'Group#:'.'<br>'. $gp;
echo "<br>";
echo 'Course Details:'.'<br>'. $course;
echo "<br>";
echo 'Gender:'.'<br>'. $gender;
echo "<br>";
echo 'Selected Courses:' . '<br>';
foreach ($select as $course) {
    echo $course . '<br>';
}
?>

</body>
</html>