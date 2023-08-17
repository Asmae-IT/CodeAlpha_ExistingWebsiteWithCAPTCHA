<?php 
require "./Db/Db_Members.php";
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
  <body id="page3">
  <h3 class="text-center mt-5">List of members</h3>
    <div class="container page3">
      <a class="btn btn-primary" href="Add.php">Add a member</a><br><br>
      <table class="table table-bordered text-center mx-auto w-75">
          <thead>
              <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $SQL = "SELECT * FROM members";
            $query = mysqli_query($con, $SQL);
            while($rowStud = mysqli_fetch_assoc($query))
            {
             echo "
             <tr>
               <td>".$rowStud['id']."</td>
               <td>".$rowStud['first_name']."</td>
               <td>".$rowStud['last_name']."</td>
               <td>".$rowStud['gender']."</td>
               <td>".$rowStud['email']."</td>";
               echo "<td>
               <a href='Delete.php?id=".$rowStud['id']."'><button type='submit' class='btn btn-danger' name='delete'>Delete</button></a>
               </td>";
            }
              echo "</tr>"
            ?>
          </tbody>
      </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>