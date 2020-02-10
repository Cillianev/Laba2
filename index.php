<?php
session_start();

$message = "";

if(isset($_POST['name']) && $_POST['name'] !=""):
  $_SESSION['name'] = $_POST['name'];
  
  $words = array(
    "robust",
    "polar", 
    "measly", 
    "movie",
    "thirsty"
  );

  $random_word = array_rand($words, 1);
  $letter_count = strlen($words[$random_word]);
  $letter_dashes = "";
  for($i=0; $i < $letter_count; $i++){
    $letter_dashes .= "_ ";
  }

  $total_life = "_ _ _ _ _ _";

  $_SESSION['wordToGuess'] = $words[$random_word];
  $_SESSION['wordToGuessArray'] = array();
  $_SESSION['wordToGuessLetterCount'] = $letter_count;
  for($i=0; $i< $letter_count; $i++){
    $_SESSION['wordToGuessArray'][] = "_";
  }
  $_SESSION['totalLife'] = 6;
  $_SESSION['letterUsedCount'] = 0;
  $_SESSION['letterTrueGuess'] = 0;
  $_SESSION['letterUsed'] = array();
  $_SESSION['letterUsed'][0] = "_";
  $_SESSION['letterUsed'][1] = "_";
  $_SESSION['letterUsed'][2] = "_";
  $_SESSION['letterUsed'][3] = "_";
  $_SESSION['letterUsed'][4] = "_";
  $_SESSION['letterUsed'][5] = "_";

  $_SESSION['gameOver'] = false;
  
  header("Location: http://localhost/wad-2019/final/game.php");

else:
  $message = 'Please enter your name';
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hangman</title>
      <link rel="stylesheet" href="assets/css/bootstrap.css"> 
      <link rel="stylesheet" href="assets/css/stylesheet.css">
  </head>
  <body class="bg-light">

<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/images/hangman.png" alt="" width="72" height="72">
    <h2>Hangman Game</h2>
    <p class="lead">Hangman is a paper and pencil guessing game for two or more players. One player thinks of a word, phrase or sentence and the other(s) tries to guess it by suggesting letters within a certain number of guesses.</p>
  </div>

  <div class="row">
   
    <div class="col-md-12">
   
        <div class="row">
        <form action="" method="post">
          <div class="col-md-12">
            <label>Enter Your Name</label>
            <input type="text" class="form-control" name="name" value="">
            <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Start Game</button>
            <?php
            echo $message;
            ?>
          </div>
        </form>
          
        </div>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019-2020 WAD UCP</p>
      </footer>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js" charset="utf-8"></script>
  </body>   
</html>
