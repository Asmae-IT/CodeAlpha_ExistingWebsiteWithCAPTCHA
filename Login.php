<?php 
require "./Db/Db_Admin.php";

session_start();

if(isset($_SESSION["admin_id"])){
  header("Location: Add.php");
}

if(isset($_POST["login"])){ // If i click on the button 'Enregistrer' the data will be sent to the server 

    $username = $_POST["username"];
    $password = $_POST["password"];
    $captcha = $_POST["captcha"];
    $captcha_confirm = $_POST["captcha_confirm"];

    $message = "";

    if($captcha != $captcha_confirm){
      echo $message = "
      <div class='alert alert-danger'><strong>Incorrect Captcha!</strong></div>
      ";
    }
    else {
      
      $SQL = "SELECT * FROM login_admin WHERE username = '$username' AND password = '$password'";
      $query = mysqli_query($con, $SQL); 

      $num = mysqli_num_rows($query);

      if($num > 0)
      {
        $row = mysqli_fetch_assoc($query);
        $_SESSION["id"] = $row["admin_id"];
        echo "<script>
        window.location.href= 'Add.php'
        </script>";
      }
       else {
        echo "<div class='alert alert-danger'><strong>Wrong Username or Password!</strong></div>
        ";
       } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./assets/design.css" />
  </head>
  <body>
    <div class="container page1">
      <div class="row">
        <div class="col-md-6 left-side">
          <img src="./assets/login.jpg" class="img-fluid" alt="login image" width="500;" />
        </div>
        <div class="col-md-6 right-side">
          <hr class="w-25">
          <h6>Login as Admin</h6>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group mt-5">
            <label>Username</label>
            <input
              type="text"
              name="username"
              id="username"
              class="form-control" required
            />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input
              type="password"
              name="password"
              id="password"
              class="form-control" required
            />
          </div>
          <div class="form-group">
          <label>Captcha</label>
          <div class="d-flex">
          <input type="text" id="captcha" name="captcha" value="<?php echo substr(uniqid(), 5);?>" class="form-control" readonly/>
           <button type="button" class="btn btn-light border border-0 ml-5 p-2" onclick="window.location.reload();">
            <i class="uil uil-sync"></i>
           </button>
          </div><br>
          <input type="text" name="captcha_confirm" class="form-control"/>
          </div>
          <div class="form-group">
            <button
              type="submit"
              name="login"
              id="login"
              class="form-control btn btn-primary"
            >
              Login
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
