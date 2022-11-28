<?php
 
define( 'DB_NAME', 'ttoth1' );
define( 'DB_USER', 'ttoth1' );
define( 'DB_PASSWORD', 'ttoth1' );
define( 'DB_HOST', 'localhost' );

if ($_POST['u_name'] && $_POST['p_word']){
  $uname = validate($_POST['u_name']);
  $pass = validate($_POST['p_word']);
  CheckUser();
}

function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function CheckUser() {
  // Create connection
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
   
      $sql = "SELECT id, dg_user, dg_password FROM DiscGolfUsers";
      // $sql = "SELECT * FROM user WHERE username=$uname AND 'password'=$pass";
      $result = mysqli_query($conn, $sql);
   
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          if($_POST['u_name'] == $row["dg_user"] && $_POST['p_word'] == $row["dg_password"] ) {
            echo "username and password match!";
            setcookie('userID', $row["id"], time() + (86400 * 30), "/"); // 86400 = 1 day
            header("Location: discgolf.php");
            break;
          } else {
                setcookie("userID", "", time() - 3600, '/');
            }
          }
          echo "Incorrect username or password!";
      } else {
        echo "<br>0 results";
      }
  
      mysqli_close($conn);
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Disc Golf</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  </head>

  <body>

    <div class="container mt-3">
      <h2>Log in</h2>
      <form method="post">
        <div class="mb-3 mt-3">
          <label for="u_name">Username:</label>
          <input type="text" class="form-control" id="u_name" placeholder="Enter username" name="u_name">
        </div>
        <div class="mb-3">
          <label for="p_word">Password:</label>
          <input type="text" class="form-control" id="p_word" placeholder="Enter password" name="p_word">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <script src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./jquery/jquery-3.6.1.min.js"></script>

    </body>
</html>