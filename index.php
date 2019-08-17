<?php  
session_start();
?>

<?php
// include ('connect.php');
// if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    
    // $email1 = $_COOKIE['email'];
    // $password1 = $_COOKIE['password'];
    // $result = "SELECT * FROM user WHERE email = '$email1' AND password = '$password1'";
    // $query = mysqli_query($db, $result);
    // if (mysqli_num_rows($query) == 1) {
    //   $_SESSION['email'] = $email;
    //   $_SESSION['username'] = $username;
    //   header('location: home.php');
//   }else{
//     header('location: index.php');
//   }
// }

?>
    

<?php
include ('connect.php');
// ... 
// LOGIN USER
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $password = sha1($password);
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $username;
      //$_SESSION['success'] = "You are now logged in";
      // if (isset($_POST['rememberme'])) {
      //       /* Set cookie to last 1 year */
      //       setcookie('email', $_POST['email'], time()+60*60*24*365, '/');
      //       setcookie('password', sha1($_POST['pass']), time()+60*60*24*365, '/');
        
      //   } else {
      //       /* Cookie expires when browser closes */
      //       setcookie('email', $_POST['email'], false, '/');
      //       setcookie('password', sha1($_POST['pass']), false, '/');
      //   }
      header('location: home.php');
    }else {
    array_push($errors, header("location:  index.php?remark_login=failed"));
    }
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
  var x = document.forms["myForm"]["email"].value;
  if (x == "") {
    alert("You should put your Email");
    return false;
  }
  var y = document.forms["myForm"]["pass"].value;
  if (y == "") {
    alert("You shoulf put password");
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
     $remarks  =  isset($_GET['remark_login'])  ?  $_GET['remark_login']  :  '';
     if  ($remarks==null  and  $remarks=="")
     {
      echo  '<div class="panel panel-default panel-heading text-center" style="background-color: #7D3E86"><b>Sign In</b></div>';
    }
    if  ($remarks=='failed')
    {
      echo  '<div class="panel panel-danger panel-heading text-center" style="background-color:#C55A43 "><b>Failed!, Wrong credentials</b></div>';
    }
    else{
    }
     ?>
    <form class="text-center border border-light p-4" action="index.php" method="post" name="myForm" onsubmit="return validateForm()">
    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="pass">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="rememberme" >
                <label class="custom-control-label" for="defaultLoginFormRemember" style="color: white">Remember me</label>
            </div>
        </div>
        <div>
            <a href="reset-password.php">Forgot password?</a>
        </div>
    </div>
    <button class="btn btn-info btn-block my-4" type="submit" name="login">Sign in</button>
    <a href="index1.php">Create an Account</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>