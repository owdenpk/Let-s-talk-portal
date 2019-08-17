<?php
session_start();
include ("connect.php");
?>
<?php
$email = $_SESSION['email'];
if(isset($_POST['search'])){
   // header("Location:add.php");
 $valueToSearch = $_POST['search1'];
 $result = mysqli_query($db, "SELECT * FROM comment WHERE email = '$email' AND topic like'%".$valueToSearch."%' OR category like '%".$valueToSearch."%' OR opinion like '%".$valueToSearch."%'");
}else {
 $result = mysqli_query($db, "SELECT * FROM comment WHERE email = '$email'");
}
?>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  <title>Opinion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script src="js/all.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D2E7F6;">
  <a href="home.php" class="navbar-brand"><b style="color: red">Let's</b><b style="color: green"> talk</b></a>
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
  <form class="form-inline" method="post" action="display.php">
    <input class="form-control mr-sm-2" type="search" name = "search1" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
  </form>
</nav>
<div class = "container"><br>
  <table class = "table table-striped table-hover table-bordered " data-toggle="table">
      <!-- <div class="align-center">
        <a class="btn btn-primary hidden-print" href="#">Assign New Client</a><hr>
      </div> -->
      <h2 class="text text-center">Your Opinion</h2>
      <tr>
        <!-- <th data-field="client" data-sortable="true">Client name</th> -->
        <th>Topic</th>
        <th>Category</th>
        <th>Opinion</th>
        <th class="hidden-print">Actions</th>
        <!-- <th>Updated On</th> -->
      </tr>


      <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
      while($res = mysqli_fetch_assoc($result)) {       
        echo "<tr>";
        echo "<td>".$res['topic']."</td>";
        echo "<td>".$res['category']."</td>";
        echo "<td>".$res['opinion']."</td>";
        echo "<td class='hidden-print'><a href=\"edit.php?id=$res[op_id]\">Edit</a> | <a href=\"delete.php?id=$res[op_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      }
      ?>
    </table>