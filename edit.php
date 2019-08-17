<?php
session_start();
include_once("connect.php");
if(isset($_POST['update']))
{    
  $id = $_POST['id'];
  $topic = $_POST['topic'];
  $category=$_POST['category'];
  $opinion=$_POST['opinion'];    
    $result = mysqli_query($db, "UPDATE comment SET topic='$topic', category='$category', opinion='$opinion' WHERE op_id=$id" );
    header("location: display.php");
  }

?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM comment WHERE op_id = '".$id."'";
$result = mysqli_query($db, $sql);
while($res = mysqli_fetch_array($result))
{
  $topic1 = $res['topic'];
  $category1 = $res['category'];
  $opinion1 = $res['opinion'];
   
}
?>

<html>
<head>    
  <title>Edit Opinion</title>

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script src="js/all.js"></script>

  <style>
    #logo {
      height: 200%;
      width: 70%;
      margin-top: -7px;
      margin-right: -200px;
    }
  </style>


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
</nav><br>
<div class = "container col-md-6">
  <div class="row">
  <div class="col-md-12">
    <div class="panel panel-dark" style="background-color: #37624E; font-weight: bold; font-size: 45px; font-family: Arial, Helvetica, sans-serif;">
      <div class="panel panel-heading text-center">
        Edit Your Opinion
      </div>
    </div>
    <br>
      <div class="panel panel-body">
        <form action="edit.php" method="post"> 
         <div class = "form-group">
          <div class="row">
            <div class="col-md-12">

             <label  class="label label-light" style="color: #3B9067; font-weight: bold; font-size: 20px;">Topic</label>
             <input type="text" class="form-control" name="topic" value="<?php echo $topic1;?>"><br>

             <label  class="label label-light" style="color: #3B9067; font-weight: bold; font-size: 20px;">Category</label>
             <input type="text" class="form-control" name="category" value="<?php echo $category1;?>"><br>

             <label  class="label label-light" style="color: #3B9067; font-weight: bold; font-size: 20px;">opinion</label>
             <textarea class="form-control" name="opinion" value="<?php echo $opinion1;?>"><?php echo $opinion1;?></textarea><br>
       </div>
     </div>
     <div class="form-footer">
      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <input type="submit" class = "btn btn-info btn-lg my-3" name="update" value="update">

    </div>

  </div>
</form> 


</div>

</div>
</div>
</div>
</div>



</body>
</html>