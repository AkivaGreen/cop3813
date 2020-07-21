<!DOCTYPE html> <!-- guess.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/application.css" type="text/css">
    <script type="text/javascript" src="assets/javascript/application.js"></script>
    <title>Guess a Number</title>
  </head>
  <?php
  $correct_guess = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $randNum = rand(1, 10);
    if ($randNum == $_POST["num"]) {
      $correct_guess = true;
      echo "<h1>Correct!</h1>";
    }
    else {
      $correct_guess = false;
      echo "<p>No, I was thinking of $randNum.</p>";
    }
  }
  ?>
  <body>
    <div class="container-fluid main-container">
      <form method="post" action="">
        <div class="form-row" id="prompt">
          <div class="form-group col">
            <p>I'm thinking of a number between 1 and 10.</p>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <p>Your guess? <input type="number" name="num" min="1" max="10" autofocus></p>
          </div>
        </div>
        <input type="submit" value="Guess" class="btn btn-primary">
      </form>
    </div>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST"){ ?>
      <p>This Works!!! <?= $correct_guess ?></p>
    <?php } ?>
  </body>
</html>
