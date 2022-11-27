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

<form method="post">
  Username: <input type="text" name="u_name"><br>
  Password: <input type="text" name="p_word"><br>
  <input type="submit" value="Submit">
</form>
