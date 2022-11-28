
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Disc Golf</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  </head>

  <body>
    
    <div class="p-5 bg-secondary text-white text-center">
      <h1>Welcome to the disc golf rating site!</h1>
      <h5>This is a place for disc golfers to rate their discs!</h5>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand active" href="./discgolf.php">Disc Golf Ratings</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span>☰</span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="./discgolf.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./checklist.php">Checklist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./site-description.php">Site description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./about-us.php">About us</a>
            </li>
          </ul>
          <form class="d-flex">
            <a href="./discgolflogin.php" class="btn btn-primary" type="button">Log out</a>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-3">
      <div class="row">
        <div class="col-sm-4">
          <h5>Leave a review and rating below!</h5>
          <form onsubmit="return(insertRating())">
            <label for="disc" class="form-label">Select disc (select one):</label>
            <select class="form-select" id="disc" name="disc">
              <option>Aviar</option>
              <option>Buzzz</option>
              <option>Destroyer</option>
              <option>Escape</option>
              <option>Explorer</option>
              <option>Firebird</option>
              <option>Judge</option>
              <option>Leopard</option>
              <option>Luna</option>
              <option>Nomad</option>
              <option>River</option>
              <option>Teebird</option>
              <option>Tern</option>
              <option>Truth</option>
              <option>Zone</option>
            </select>
            <br>
            <label for="stability" class="form-label">Select Stability:</label>
            <select class="form-select" id="stability" name="stability">
              <option>Very Understable</option>
              <option>Understable</option>
              <option>Neutral</option>
              <option>Overstable</option>
              <option>Very Overstable</option>
            </select>
            <br>
            <label for="rating" class="form-label">Select rating (5 is best):</label>
            <select class="form-select" id="rating" name="rating">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <br>
            <label for="comment">Comments:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
        <div class="col-sm-8">
          <h3>Reviews<h3>
          <br>
          <p>
            <div id=showratings></div>
          </p>
        </div>
      </div>
    </div>

    <script src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./jquery/jquery-3.6.1.min.js"></script>
    <script>
      
      function insertRating(){
        disc = $("#disc").val();
        stability = $("#stability").val();
        rating = $("#rating").val();
        comment = $("#comment").val();
          $.get("./ratingajax.php", {"cmd": "create", "disc": disc, "stability": stability, "rating": rating, "comment": comment}, function(data){
              $("#showratings").html(data);
          });
          return(false);
      }
      function showratings(){
        $.get("./ratingajax.php", {"cmd": ""}, function(data){
            $("#showratings").html(data);
        });
        return(false);
      }
      showratings();
    </script>
  </body>
</html>