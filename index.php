<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Le code de la Route revisité</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="dropdown">
    <button class="btn btn-success dropdown-toggle btn-block " type="button" id="menu1" data-toggle="dropdown">Quizz
      <span class="caret"></span></button>
      <ul id="quizz" class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
      </ul>
    </div>
  </div>
  <div id="pano"></div>

  <div id="footer">
  </div>
  <script type="text/javascript" src="js/streetview.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr3FSaJ1WzGepUTN0lUzZxZ73sXB3VJ2A&callback=initialize"></script>
</body>
</html>
