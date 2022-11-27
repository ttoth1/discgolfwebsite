<?PHP
if(!isset($_COOKIE['userID'])) {
  header("Location: discgolflogin.php");
}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disc Golf</title>
    <link rel="stylesheet" href="./foundation/css/foundation.css">
  </head>

  <body>
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">Disc Golf Ratings</li>
          <li><a href="./checklist.php">Checklist</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Site description</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="./discgolflogin.php" class="button">Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>Welcome to the disc golf rating site!</h1>
        </div>
      </div>

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
            <h3>This is a place for disc golfers to rate their discs! </h3>
            <p>Leave a review and rating!</p>
          </div>
        </div>
      </div>
    </div>

    <script src="./jquery/jquery-3.6.1.min.js"></script>
  </body>
</html>
