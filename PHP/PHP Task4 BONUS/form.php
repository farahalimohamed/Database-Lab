<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: red;}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">  

<?php
require 'config.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, "users");

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $course = $gp = $agree = "";
$selectedCourses = array();

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
    
  $gp = test_input($_POST["gp"]);

  $course = test_input($_POST["course"]);

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["select"])) {
    $selectedCoursesErr = "At least one course must be selected";
  } else {
    $selectedCourses = $_POST["select"];
  }

  $agree = isset($_POST["agree"]) ? "0" : "1";

  if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($selectedCoursesErr)) {
    $courses = implode(", ", $selectedCourses);
    $sql = "INSERT INTO userdata (uname, email, gp, course, gender, courses, agree) VALUES ('$name', '$email', '$gp', '$course', '$gender', '$courses', '$agree')";
  
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header("Location: display_users.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$title = define('formname', 'ASST_BIS class registration');
?>

<h2 class="mb-4">Application name: <?php echo formname ?></h2>
    <p class="mb-4"><span class="error">* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="gp">Group#:</label>
            <input type="text" class="form-control" name="gp" value="<?php echo $gp; ?>">
        </div>

        <div class="form-group">
            <label for="course">Course Details:</label>
            <textarea class="form-control" name="course" rows="5" cols="40"><?php echo $course; ?></textarea>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <div>
                <input type="radio" name="gender" value="female" <?php if ($gender === "female") echo "checked"; ?>> Female
                <input type="radio" name="gender" value="male" <?php if ($gender === "male") echo "checked"; ?>> Male
                <span class="error">* <?php echo $genderErr; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="select">Select Courses:</label>
            <select class="form-control" name="select[]" multiple size="4">
                <option value="PHP" <?php if (in_array("PHP", $selectedCourses)) echo "selected"; ?>>PHP</option>
                <option value="JavaScript" <?php if (in_array("JavaScript", $selectedCourses)) echo "selected"; ?>>JavaScript</option>
                <option value="MySQL" <?php if (in_array("MySQL", $selectedCourses)) echo "selected"; ?>>MySQL</option>
                <option value="HTML" <?php if (in_array("HTML", $selectedCourses)) echo "selected"; ?>>HTML</option>
                <option value="CSS" <?php if (in_array("CSS", $selectedCourses)) echo "selected"; ?>>CSS</option>
            </select>
        </div>

        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="agree" value="0" <?php if ($agree === "0") echo "checked"; ?>>
            <label class="form-check-label" for="agree">Receive Email from us</label>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>

</body>
</html>
