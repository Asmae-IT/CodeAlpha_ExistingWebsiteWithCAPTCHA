<?php
require "./Db/Db_Members.php";
session_start();

if(!isset($_SESSION["id"])){
  header("Location: Login.php");
}

if(isset($_POST["save"])){ 

  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $gender = $_POST["gender"];
  $email= $_POST["email"];

  $insertSQL = "INSERT INTO members(first_name, last_name, gender, email) VALUES ('$first_name','$last_name','$gender','$email')"; //Insert Query

  $query = mysqli_query($con, $insertSQL);

  $message = "";

  if ($query) { //If well executed display this message
      echo "<div class='alert alert-success '><strong>Added Successfully!</strong></div>
      <a href='Add.html' class='btn-back' style='font-size:40px;border:none;background-color:transparent;'>
        <i class='uil uil-arrow-circle-left'></i>
      </a>";
     }
     else {
      echo $message = "
      <div class='alert alert-danger'><strong>There is an error!</strong></div>";
     } 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/design.css">
  </head>
  <body id="page2">
    <a href="Logout.php" class="text-white text-right pr-5 pt-5"><p class="">Logout</p></a>
      <div class="container page2 p-4 w-50">
        <h3 class="text-center">Add a Member</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-5">
          <div class="form-group">
            <label>Enter Your First Name</label>
            <input type="text" class="form-control" name="first_name" id="name" required>
          </div>
          <div class="form-group">
            <label>Enter Your Last Name</label>
            <input type="text" class="form-control" name="last_name" id="name" required>
          </div>
          <div class="form-group">
            <label>Gender</label><br/>
            <input type="radio" name="gender" id="male" value="Male"> Male 
             <input type="radio" name="gender" id="female" value="Female" class="ml-5"> Female
             
          </div>
          <div class="form-group ">
            <label>Enter Your Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="form-group clearfix ">
            <div class="float-left">
              <button type="submit" class="btn btn-success" name="save" id="save">Save</button>
              <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset</button> 
            </div>
            <div class="float-right">
              <button class="border border-0 btn btn-light"><a href="Display.php" class="text-decoration-none text-dark ">Display</a></button>
            </div>
          </div>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
