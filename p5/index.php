<!DOCTYPE html> <!-- guess.php -->
<html>
  <head>
    <title>Guess a Number</title>
  </head>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $randNum = rand(1, 10);
    if ($randNum == $_POST["num"]) {
    echo "<h1>Correct!</h1>";
    }
    else {
      echo "<p>No, I was thinking of $randNum.</p>";
    }
  }
  ?>
  <form method="post" action="">
  <p>I'm thinking of a number between 1 and 10.</p>
  <p>Your guess? <input type="number" name="num" min="1" max="10" autofocus></p>
  <input type="submit" value="Guess">
  </form>
</html>
