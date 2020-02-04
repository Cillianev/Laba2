<?php
session_start();

$message = "";

// when user submit new letter
if(isset($_POST['letterInput']) && $_POST['letterInput'] !=""){

  // find the position of the letter in the word

  // check if the word is alphabet
  

    //check if the there is only one letter 
  

    //if the letter is not found then add that letter to used letter array and update the remaining life
    
    //"Letter not found";

    //check if the all the 6 life are used then game over
    //"You Loose";
    


    //if the letter found and any position in the word
    //add letter to the position where it is found
    //Letter matched";


    //check if the all letter are guessed
    //You Won";
  
}else{
  $message = "Error: Empty input";  
}

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
 
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Game Progress/Output</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div id="hangmanPhoto">
            <span><?php  ?></span>

            <?php

            //hangman photo logic
            
            ?>

            <img class="d-block mx-auto mb-4" src="assets/images/hangman0.png" alt="" width="200">
          </div>
        </li>
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Remaining Gueses</span>
          <strong><?php  ?></strong>
        </li>
      </ul>

     
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Game Board</h4>
   
        <div class="row">
          <div class="col-md-6 mb-3">
            
          <form id="gameData" action="" method="post">

            <label>Word to guess (Total Letters: <?php   ?>)</label>
            <ul class="list-group mb-3">
              <li class="list-group-item" id="wordToGuess"><?php  ?></li>
            </ul>
          </div>
          <div class="col-md-6 mb-3">
            <label>Letters used in guesses (Total: 6)</label>
            <ul class="list-group mb-3">
              <li class="list-group-item" id="letterUsed"><?php ?></li>
            </ul>
          </div>

          <div class="col-md-6 mb-3">
            <label>Your next guess</label>
            <input type="text" class="form-control" id="letterInput" name="letterInput" value="">
          </div>

          <div class="col-md-6 mb-3">
            <label>Click the button below</label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guess</button>
          </div>

        </div>
        <hr class="mb-4">

        <div class="row">
          <div class="col-md-6 mb-3"> 
            <a class="btn btn-primary btn-lg btn-block" href="http://localhost/wad-2019/final/reset.php">Reset</a>
          </div>

          <div class="col-md-6 mb-3">
            <a class="btn btn-primary btn-lg btn-block" id="saveData">Save</a>
          </div>
          </div>
        <h4 class="mb-3">Result</h4>

        <div class="row">
          <div class="col-md-12" id="result"><?php  ?></div>
        </div>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019-2020 WAD UCP</p>
      </footer>

      
      </form>   

      <form id="gameData">
        <input type="hidden" name="pname" id="pname" value="">
        <input type="hidden" name="wordToGuess" id="wordToGuess" value="">
        <input type="hidden" name="letterUsedCount" id="letterUsedCount" value="">
        <input type="hidden" name="letterTrueGuess" id="letterTrueGuess" value="">
      </form>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js" charset="utf-8"></script>
  </body>   
</html>
