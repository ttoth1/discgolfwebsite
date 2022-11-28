<?PHP
 
define( 'DB_NAME', 'ttoth1' );
define( 'DB_USER', 'ttoth1' );
define( 'DB_PASSWORD', 'ttoth1' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function InsertRating($disc, $stability, $rating, $comment) {
    global $conn;

    $insert = "INSERT INTO DiscRatings SET disc = '$disc', stability = '$stability', rating = '$rating', comment = '$comment' ";
    $result = $conn->query($insert);
}

function ShowRatings() {
    global $conn;

    $sql = "SELECT id, disc, stability, rating, comment FROM DiscRatings";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // $currentDisc = $row["disc"];
            // echo "id: " . $row["id"]. " - Disc: " . $row["disc"]. " - Rating: " . $row["rating"]. " - Comment: " . $row["comment"]. " <br>";
            // echo " Disc: is $currentDisc";
            echo $row["disc"], " - Stability: ", $row["stability"], " - Rating: ", $row["rating"], " - Comment: ", $row["comment"], "<br><br>";
        }
    } else {
        echo "0 results";
    }
}

$cmd = $_GET['cmd'];

if($cmd == 'create') {
    InsertRating($_GET['disc'],$_GET['stability'],$_GET['rating'],$_GET['comment']);
}

ShowRatings();

mysqli_close($conn);

?>