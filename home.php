<?php
ob_start();
session_start();
require_once("connect.php");
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
//select logged in users detail
$hh =  $_SESSION['email'];
$res = $db->query("SELECT * FROM user WHERE email='$hh'" );
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);


if(isset($_POST['send'])){
$user = $_POST['email'];
$topic = $_POST['tname'];
$category = $_POST['category'];
$comment = $_POST['comment'];

$query = "INSERT INTO comment (email,topic,category,opinion) VALUES ('$user', '$topic', '$category', '$comment')";
mysqli_query($db,$query);
echo "<script type=\"text/javascript\">window.alert('Your opinions have been saved.');
window.location.href = '/web_assignment/display.php';</script>"; 
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
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
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D2E7F6;">
  <a class="navbar-brand" href="#"><b style="color: red">Let's</b> <b style="color: green">Talk</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="display.php">Your Opinions<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
  <a class="btn btn-warning btn-md" href="logout.php" role="button">logout</a>
</nav>
<br>
     <h2>Hello, <?php echo $userRow['firstname']; ?></h2>
    
    
<div class="container col-md-4">

    <div class="row">
        <div class="col-lg-10">
<div class="panel-heading" style="color: red;">
<h1>Opinion BOX</h1>
</div>
<!-------Wrap------------>


<form class="text-center border border-light p-4" action="home.php" method="POST" id="commentform">

<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
<div id="comment-name" class="form-row">
<input class="form-control mb-4" type = "text" placeholder = "Topic Name" name = "tname"  id = "name" >
</div>
<div id="comment-name" class="form-row">
<input class="form-control mb-4" type = "text" placeholder = "category of the Topic" name = "category"  id = "name" >
</div>
<div id="comment-message" class="form-row">
<textarea class="form-control mb-4" name = "comment" placeholder = "Your Opinion in less than 240 characters" id = "comment" ></textarea>
</div>
<input class="btn btn-info btn-block my-3" type="submit" name="send" id="commentSubmit" value="Submit"></a>
</form>

</div>
</div>
</div>

</body>
</html>