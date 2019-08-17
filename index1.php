<?php
session_start();
?>
<?php
include ('connect.php');
$sex="";
$sex = mysqli_query($db, "SELECT * FROM sex ");
$course1="";
$course1 = mysqli_query($db, "SELECT * FROM courses");

$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['join'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['fname']);
  $surname = mysqli_real_escape_string($db, $_POST['sname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pass1']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  // if (empty($username)) { array_push($errors, "Username is required"); }
  // if (empty($email)) { array_push($errors, "Email is required"); }
  // if (empty($phone)) { array_push($errors, "phone number is required"); }
  // if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE firstname='$firstname' OR email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);
  if ($user) { // if user exists
  
    if ($user['email'] === $email) {
       array_push($errors, header("location:  index1.php?remark_signup=failed"));
    }
  }
  // Finally, register user if there are no errors in the form

 if (count($errors) == 0) {
    
    $password = sha1($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO `user`(`firstname`, `surname`, `email`, `gender`, `phone`, `coursename`, `password`)
          VALUES('$firstname', '$surname', '$email', '$gender', '$phone', '$course', '$password')";
   
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    //$_SESSION['title'] = $title;
    //$_SESSION['phone'] = $phone;
    //$_SESSION['password']=$password;
    $_SESSION['success'] = "You are now logged in";
     if(mysqli_query($db, $query)){
    header('location: home.php');}
 
}else{

}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script src="js/all.js"></script>
     <style type="text/css">
        body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url(images/part1.jpg);

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
 
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
    </style>
</head>
<body>
<script type="text/javascript">
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Firstname must be filled out");
    return false;
  }
  var y = document.forms["myForm"]["sname"].value;
  if (y == "") {
    alert("Surname must be filled out");
    return false;
  }
  var z = document.forms["myForm"]["email"].value;
  if (z == "") {
    alert("Email must be filled out");
    return false;
  }
  var j = document.forms["myForm"]["phone"].value;
  if (j == "") {
    alert("Phone number field should be filled");
    return false;
  }
  var k = document.forms["myForm"]["pass"].value;
  if (k == "") {
    alert("Eka password please");
    return false;
  }
  var u = document.forms["myForm"]["pass"].value;
  if (u == "") {
    alert("Usisahau kuconfirm password");
    return false;
  }
}
</script>

  <div class="container col-lg-12">
    <div class="row">
  <p><b style="color: red; font-size: 30px; font-weight: bold;">Let's</b> <b style="color: green; font-size: 30px; font-weight: bold;">Talk</b></p>
</div>
</div>
<div class="bg-image"></div>

<div class="bg-text">

<div class="container col-md-4">
       <div class="row">
        <div class="col-lg-12">
        <div class="panel-heading" style="color: #000; box-shadow: 0 20px 30px rgba(0,0,0,0.6); overflow: hidden">

    <?php
     $remarks  =  isset($_GET['remark_signup'])  ?  $_GET['remark_signup']  :  '';
     if  ($remarks==null  and  $remarks=="")
     {
      echo  '<div class="panel panel-default panel-heading text-center" style="background-color: #7D3E86"><b>Join Us Today</b></div>';
    }
    if  ($remarks=='failed')
    {
      echo  '<div class="panel panel-danger panel-heading text-center" style="background-color:#C55A43 "><b>Failed! Email already exist</b></div>';
    }
    else{
    }
     ?>
    <form class="text-center border border-light p-4" method="post" action="index1.php" name="myForm" onsubmit="return validateForm()">

    <input type="text" name="fname" class="form-control mb-3" placeholder="Enter Firstname">
    <input type="text" name="sname" class="form-control mb-3" placeholder="Enter Surname">
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
    <Select class = "form-control mb-3" name="gender">
        <?php while ($res = mysqli_fetch_array($sex)) {
            echo "<option value=".$res['sex_id'].">" .$res['gender']."</option>";
        }?>
    </Select>
    <input type="text" name="phone" class="form-control mb-4" placeholder="Phone Number">
    <select class="form-control mb-3" name="course">
        <?php while ($res = mysqli_fetch_array($course1)) {
            echo "<option value=".$res['course_id'].">" .$res['course_name']."</option>";
        }?>
    </select>
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="pass">
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Confirm Password" name="pass1">

    <div class="d-flex justify-content-around">
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-3" type="submit" name="join">Register</button>
  
        <a href="index.php">Already have an account</a>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>